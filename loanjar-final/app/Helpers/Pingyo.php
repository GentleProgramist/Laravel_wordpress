<?php

class Pingyo_core {

	var $api_url;
	var $tables;
	var $cache_id;
	var $cache_last_updated;
	var $override_cache;
	var $search_term;
	var $return;
	var $new_term;
	var $table_prefix;
	var $cache_format;
	private $CI;

	/* SOF: Default constructor */
	function __construct() {

//		$this->CI =& get_instance();
		$this->CI->load->database();
		$this->override_cache = FALSE;
		$this->table_prefix = '';
		$this->table = [
			'search' => NULL,
			'results' => NULL,
			'hits' => NULL
		];
		$this->return = [
			'status' => FALSE,
			'error' => [
				'code' => 'UNKNOWN_ERROR',
				'message' => 'An unknown error occurred',
				'details' => ''
			],
			'data' => []
		];
		$this->new_term = false;
		$this->cache_format = 'string';

	}
	/* EOF: Default constructor */

	function get($search_term) {

		// Generate table names
		$this->table['search'] = $this->table_prefix . '_search';
		$this->table['results'] = $this->table_prefix . '_result';
		$this->table['hits'] = $this->table_prefix . '_hits';

		$this->search_term = rawurldecode($search_term);
		$this->check_cache();

		if(!$this->override_cache && !$this->new_term && $this->cache_last_updated >= time() - (24 * 60 * 60)) {

			// Fetch results from cache
			$this->fetch_results_from_cache();
			$this->cache_hits_counter();

		} else {

			// Fetch results from API
			$this->fetch_results_from_api();
			$this->add_cache();
		}
	}

	function check_cache() {

		// Check if search term is already there in the database cache
		$this->CI->db->where('search_term', $this->search_term);
		$dbresult = $this->CI->db->get($this->table['search']);
		$dbresult = $dbresult->result_array();
		if(count($dbresult) > 0) {

			$this->cache_id = $dbresult[0]['id'];
			$this->cache_last_updated = strtotime($dbresult[0]['updated']);

		} else {

			// Add search term to database
			$this->CI->db->set('created', 'NOW()', FALSE);
			$this->CI->db->set('updated', 'NOW()', FALSE);
			$this->CI->db->set('search_term', $this->search_term);
			$this->CI->db->insert($this->table['search']);
			$this->cache_id = $this->CI->db->insert_id();
			$this->cache_last_updated = time();
			$this->new_term = true;

		}

	}

	function fetch_results_from_cache() {


		// Reuse results from cache
		// Get results for this search term
		$this->CI->db->where('search_term_id', $this->cache_id);
		$dbresult = $this->CI->db->get($this->table['results']);
		$dbresult = $dbresult->result_array();
		$this->return['status'] = TRUE;
		$this->return['data'] = [];
		unset($this->return['error']);
		if(count($dbresult) > 0) {

			$this->return['data'] = array_column($dbresult, 'search_result');

			if($this->cache_format === 'json') {
				for($i = 0; $i < count($this->return['data']); $i++) {
					$this->return['data'][$i] = json_decode($this->return['data'][$i]);
				}
			}

		}

	}

	function cache_hits_counter() {

		// Increment the daily cache hits counter
		$this->CI->db->where('search_term_id', $this->cache_id);
		$this->CI->db->where('date', date('Y-m-d'));
		$dbresult = $this->CI->db->get($this->table['hits']);
		$dbresult = $dbresult->result_array();
		if(count($dbresult) > 0) {

			// Update
			$this->CI->db->where('id', $dbresult[0]['id']);
			$this->CI->db->set('counter', 'counter + 1', FALSE);
			$this->CI->db->update($this->table['hits']);

		} else {

			// Insert
			$this->CI->db->set('counter', 1);
			$this->CI->db->set('search_term_id', $this->cache_id);
			$this->CI->db->set('date', 'NOW()', FALSE);
			$this->CI->db->insert($this->table['hits']);

		}

	}

	function fetch_results_from_api() {

		// Get fresh results from API
		$url_to_call = $this->api_url . rawurlencode($this->search_term);

		// Initialise CURL
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url_to_call);
		curl_setopt($ch, CURLOPT_POST, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);

		// Call the API URL
		$curl_result = curl_exec($ch);
		$curl_info = curl_getinfo($ch);

		// Check for errors
		if(curl_errno($ch)) {

			$this->return['error'] = [
				'code' => 'CURL_ERROR',
				'message' => 'An error occurred while calling the API',
				'details' => curl_error($ch)
			];

		} else if(empty($curl_result)) {

			$this->return['error'] = [
				'code' => 'TIMED_OUT',
				'message' => 'Request timed out',
				'details' => ''
			];

		} else {

			// Parse the response
			switch($curl_info['http_code']) {
				case 404:
				// No matches found
				unset($this->return['error']);
				$this->return['status'] = TRUE;
				$this->return['data'] = [];
				break;

				case 200:
				$json_result = json_decode($curl_result);
				if($json_result === NULL) {

					// Invalid response
					$this->return['error'] = [
						'code' => 'INVALID_RESPONSE',
						'message' => 'An invalid response was returned from the API',
						'details' => 'API Response: ' . print_r($curl_result, TRUE)
					];

				} else {

					// A valid response was returned
					unset($this->return['error']);
					$this->return['status'] = TRUE;
					$this->return['data'] = $json_result;

				}
				break;

				default:
				// Invalid response
				$this->return['error'] = [
					'code' => 'API_ERROR',
					'message' => 'An error occurred while calling the API',
					'details' => 'HTTP Code: ' . $curl_info['http_code']
				];
				break;
			}

		}

	}

	function add_cache() {

		// Add/update results in the database
		if($this->return['status'] == TRUE) {

			// Remove bank names, if any, connected with this search term
			$this->CI->db->where('search_term_id', $this->cache_id);
			$this->CI->db->delete($this->table['results']);

			if(count($this->return['data']) > 0) {

				// Add, update bank names in the database
				for($i = 0; $i < count($this->return['data']); $i++) {
					$this->CI->db->set('created', 'NOW()', FALSE);
					$this->CI->db->set('updated', 'NOW()', FALSE);
					$this->CI->db->set('search_term_id', $this->cache_id);

					if($this->cache_format === 'json') {
						$this->CI->db->set('search_result', json_encode($this->return['data'][$i]));
					} else {
						$this->CI->db->set('search_result', $this->return['data'][$i]);
					}
					$this->CI->db->insert($this->table['results']);
				}

			}

			// Update the last updated timestamp of this search term ID
			$this->CI->db->where('id', $this->cache_id);
			$this->CI->db->set('updated', 'NOW()', FALSE);
			$this->CI->db->update($this->table['search']);

		}

	}

}
/* EOF: Class Pingyo_core */

/* SOF: Class Pingyo_bank_search */
class Pingyo extends Pingyo_core {

	/* SOF: Default constructor */
	function __construct() {
		parent::__construct();
	}
	/* EOF: Default constructor */

	function search_banks($search_term) {
		$this->api_url = 'http://www.pingyo.com/find/bank/names/';
		$this->table_prefix = 'pingyo_cache_bank_name';
		$this->get($search_term);
		return $this->return;
	}

	function search_branches($search_term) {
		$this->api_url = 'http://www.pingyo.com/find/banks/name/';
		$this->table_prefix = 'pingyo_cache_bank_branch';
		$this->cache_format = 'json';
		$this->get($search_term);
		return $this->return;
	}

	function search_addresses($zipcode) {
		$this->api_url = 'http://www.pingyo.com/find/locales/zipcode/';
		$this->table_prefix = 'pingyo_cache_address';
		$this->cache_format = 'json';
		$this->get($zipcode);
		return $this->return;
	}

}
/* EOF: Class Pingyo_bank_search */
