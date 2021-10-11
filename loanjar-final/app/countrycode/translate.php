<?php


// locale.php must be called before this is called
//@include($_SERVER['DOCUMENT_ROOT'] . '/my-loans/countrycode/locale.php');
//@include($_SERVER['DOCUMENT_ROOT'] . '/my-loans/countrycode/languages');
@include('countrycode/locale.php');
@include('countrycode/languages');

// Load the language array
$language_file_name = $_SESSION['COUNTRY_CODE'] . '.php';
$language_file_path = $_SERVER['DOCUMENT_ROOT'] . '/my-loans/countrycode/languages/';

// Check if language file exists
if (!file_exists($language_file_path . $language_file_name)) {

    // By default display UK language file
    $language_file_name = 'GB.php';
    $_SESSION['COUNTRY_CODE'] = 'GB';
}

// Include the language file
require_once($language_file_path . $language_file_name);

// Echos the translated text or the same text if translated text is not present
function __($text_in_base_language)
{
    echo array_key_exists($text_in_base_language, $GLOBALS['phrases']) ? $GLOBALS['phrases'][$text_in_base_language] : $text_in_base_language;
}

