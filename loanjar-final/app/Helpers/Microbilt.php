<?php

namespace App\Helpers;

use DateInterval;
use DateTime;
use Illuminate\Support\Facades\Log;

class Microbilt {

	var $table_name;
	var $access_token;
	var $access_token_id;
	var $bank_account_number;
	var $bank_routing_number;
	var $_CI;

	function __construct() {
		$this->table_name = 'microbilt_oauth_token';
		$this->_CI =& get_instance();
		$this->_CI->load->database();

//        config('');
	}

	function verify($bank_account_number, $bank_routing_number) {
		$this->bank_account_number = $bank_account_number;
		$this->bank_routing_number = $bank_routing_number;
		if($this->get_latest_unexpired_access_token() === false) {
			$this->generate_new_access_token();
		}
		if($this->access_token !== false) {
			return $this->verify_bank_account_and_routing_number();
		}
		return false;
	}

	/*
	@Description: Returns the last unexpired microbilt access token from the database.
	@Return: False if no access token is present or if the last access has expired. (String) Access token otherwise.
	*/
	private function get_latest_unexpired_access_token() {
		$this->_CI->db->order_by('id', 'desc');
		$this->_CI->db->limit(1);
		$row = $this->_CI->db->get($this->table_name);
		if($row->num_rows() > 0) {
			$row = $row->row();
			$row->generated_at = new DateTime($row->generated_at);
			$row->generated_at->add(new DateInterval('PT'.$row->expires_in.'S'));
			$five_seconds_after_now = new DateTime();
			$five_seconds_after_now->add(new DateInterval('PT5S'));
			Log::debug('DEBUG:: Microbilt API: Token expiry time: ' . $row->generated_at->format('Y-m-d H:i:s'));
			Log::debug('DEBUG:: Microbilt API: Five seconds after now: ' . $five_seconds_after_now->format('Y-m-d H:i:s'));
			if($row->generated_at >= $five_seconds_after_now) {
				$this->access_token = $row->access_token;
				$this->access_token_id = $row->id;
				Log::debug('DEBUG:: Microbilt API: Reusing access token: ' . print_r($this->access_token, true));
				return true;
			}
			else {
				$this->_CI->db->where('id', $row->id);
				$this->_CI->db->set('expired', 'true', false);
				$this->_CI->db->update($this->table_name);
			}
		}
		Log::debug('DEBUG:: Microbilt API: Access token expired');
		return false;
	}

	/*
	@Description: Generates new oAuth 2.0 access token for microbilt API. Saves the token to the database.
	@Return: (String) Access token. False on failure.
	@Dependencies: Depends on curl_post helper function.
	*/
	private function generate_new_access_token() {
		$headers = [
			'Content-Type: application/json',
			'Accept: application/json'
		];
		$oauth = curl_post(MICROBILT_API_OAUTH_URL, [
			'grant_type' => 'client_credentials',
			'client_id' => MICROBILT_API_CLIENT_ID,
			'client_secret' => MICROBILT_API_CLIENT_SECRET
		], $headers, 30, '', 'json');
		Log::debug('DEBUG:: Microbilt API: oAuth response: ' . print_r($oauth, true));
		$oauth['res'] = json_decode($oauth['res']);
		if(isset($oauth['res']->access_token)) {
			$this->_CI->db->set('generated_at', 'NOW()', false);
			$this->_CI->db->set('expired', 'false', false);
			$this->_CI->db->insert($this->table_name, [
				'access_token' => $oauth['res']->access_token,
				'expires_in' => $oauth['res']->expires_in,
				'token_type' => $oauth['res']->token_type,
				'status' => $oauth['res']->status
			]);
			$this->access_token = $oauth['res']->access_token;
			$this->access_token_id = $this->_CI->db->insert_id();
			return true;
		} else {
			Log::debug('ERROR:: Microbilt API: oAuth error response');
		}
		return false;
	}

	private function verify_bank_account_and_routing_number() {
		$headers = [
			'Content-Type: application/json',
			'Accept: application/json',
			'Authorization: Bearer ' . $this->access_token
		];
		$result = curl_post(MICROBILT_API_VERIFICATION_URL, [
			'BankRoutingNumber' => $this->bank_routing_number,
			'BankAccountNumber' => $this->bank_account_number
		], $headers, 30, '', 'json');
		$this->_CI->db->set('count_used', 'count_used+1', false);
		$this->_CI->db->where('id', $this->access_token_id);
		$this->_CI->db->update($this->table_name);
		Log::debug('DEBUG:: Microbilt API: ABAAcctVerification response: ' . print_r($result, true));
		$result['res'] = json_decode($result['res']);
		if($result['res']->MsgRsHdr->Status->StatusCode == 0) {
			if($result['res']->DecisionInfo->Decision[0]->DecisionCode == 'A') {

				// Valid bank account and routing number
				return true;
			}
		} else {
			Log::error('ERROR:: Microbilt API: Verification API response status code not 0');
		}
		return false;
	}
}
