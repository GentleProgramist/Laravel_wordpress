<?php


namespace App\Models;


use Illuminate\Support\Facades\Log;

class CurlHelper
{

    function curl_post(
        $url,
        $fields_string,
        $headers = [
//            'Authorization: Bearer 2|8b17UjtfG840HOzQs3KUe8MAk46ifutkM3PZrASa',
            'Authorization: Bearer 6|VFOlcZd65nVTI1CHuVYtWzDLknqMndJSCpqdwld0',
            'Accept: application/json, text/javascript, *.*',
            'Content-type: application/json; charset=utf-8',
            'Expect:'
        ],
        $t1 = 210,
        $userpwd='',
        $postDataFormat = 'json'
    ) {


        $response = array();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);


        // POST or GET request
        if(!empty($fields_string)) {
            curl_setopt($ch,CURLOPT_POST,1);
        } else {
            sleep(1);
            curl_setopt($ch,CURLOPT_POST,0);
        }

        // Parameters
        if(is_object($fields_string)) {
            if($postDataFormat === 'json') {
                $fields_string = json_encode($fields_string);
            } else {
                $fields_string = http_build_query($fields_string);
            }
        } else {
            $fields_string = trim($fields_string);
        }
        if(!empty($fields_string)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);
        curl_setopt($ch, CURLOPT_TIMEOUT, $t1);
        if(!empty($headers))curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        if(!empty($userpwd))curl_setopt($ch, CURLOPT_USERPWD, $userpwd);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        $result = curl_exec($ch);


        $p_time = curl_getinfo($ch);
        Log::debug('DEBUG: CURL request details: ');
        Log::debug('DEBUG: CURL payload details: ');

        if (curl_errno($ch)) {
            $result =  "CURL ERROR: ".curl_error($ch);
        } else if(empty($result)) {
            $result =  "Time out - ($t1 secs)"; // Timeout in $t1 secs
        }
        curl_close($ch);

        Log::debug('DEBUG: CURL response details: ' .$result);
        $response['res'] = $result;
        $response['post_time'] = $p_time['total_time'];


        return $response;


    }



    function curl_postback(
        $url,
        $fields_string,
        $headers = [],
        $t1 = 210,
        $userpwd='',
        $postDataFormat = ''
    ) {


        $response = array();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);


        // POST or GET request
        if(!empty($fields_string)) {
            curl_setopt($ch, CURLOPT_POST, 1);
            Log::debug('CURL POST');
        } else {
            curl_setopt($ch,CURLOPT_POST,0);
            Log::debug('CURL GET');
        }

        // Parameters
        if(is_array($fields_string)) {
            if($postDataFormat === 'json') {
                $fields_string = json_encode($fields_string);
                Log::debug('CURL1::', (array) $fields_string );
            } else {
                $fields_string = http_build_query($fields_string);
                Log::debug('CURL1::', (array) $fields_string );
            }
        } else {
            Log::debug('CURL1::', (array) $fields_string );
            $fields_string = trim($fields_string);
        }
        if(!empty($fields_string)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            Log::debug('CURL1::', (array) $fields_string );
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);
        curl_setopt($ch, CURLOPT_TIMEOUT, $t1);
        if(!empty($headers))curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        if(!empty($userpwd))curl_setopt($ch, CURLOPT_USERPWD, $userpwd);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        $result = curl_exec($ch);


        $p_time = curl_getinfo($ch);
        Log::debug('DEBUG: CURL request details: ', (array) $ch);
        Log::debug('DEBUG: CURL payload details: ');

        if (curl_errno($ch)) {
            $result =  "CURL ERROR: ".curl_error($ch);
        } else if(empty($result)) {
            $result =  "Time out - ($t1 secs)"; // Timeout in $t1 secs
        }
        curl_close($ch);

        Log::debug('DEBUG: CURL response details: ' .$result);
        $response['res'] = $result;
        $response['post_time'] = $p_time['total_time'];


        return $response;


    }


}
