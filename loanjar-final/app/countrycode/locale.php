<?php


/**
 * Function to get the real IP address of the user from the server headers
 *
 * @return mixed
 */
function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


/**
 * Script to detect user's country code from user's IP address and save it in the session
 * Start the session if it's not already started
 *
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION) && isset($_SESSION['COUNTRY_CODE']) && trim($_SESSION['COUNTRY_CODE']) !== '') {
    // This is an existing user
} else {
    // This is a new user
    // Call the geolocation API
    $xml = @simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=" . getRealIpAddr());

//    print_r($xml);

    if ($xml !== false) {
        // Add the country code to the session
        $_SESSION['COUNTRY_CODE'] = (string)$xml->geoplugin_countryCode;
    } else {
        $_SESSION['COUNTRY_CODE'] = 'GB';
    }

    // Now check if the user wants to over-ride this setting
    if (isset($_GET['country']) && trim($_GET['country']) !== '') {
        $_SESSION['COUNTRY_CODE'] = strtoupper($_GET['country']);
    }

}

{
}
