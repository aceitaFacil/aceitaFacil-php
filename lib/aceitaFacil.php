<?php

if (!function_exists('curl_init')) {
  throw new Exception('aceitaFacil needs the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
  throw new Exception('aceitaFacil needs the JSON PHP extension.');
}

// aceitaFacil singleton
require(dirname(__FILE__) . '/aceitaFacil/aceitaFacil.php');

// Resources
require(dirname(__FILE__) . '/aceitaFacil/apiRequestor.php');

// aF API Resources
require(dirname(__FILE__) . '/aceitaFacil/card.php');
require(dirname(__FILE__) . '/aceitaFacil/vendor.php');
require(dirname(__FILE__) . '/aceitaFacil/payment.php');

