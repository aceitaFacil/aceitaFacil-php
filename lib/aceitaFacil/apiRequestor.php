<?php

/**
* Handles API requests
*/
class aceitaFacil_apiRequestor {
  // Method: POST, PUT, GET etc
  // Data: array("param" => "value") ==> index.php?param=value

  static public function callAPI($method, $endpoint, $data = false) {
    $curl = curl_init();

    $endpoint = $endpoint . '.json';

    if ($method === 'GET') {
        if ($data)
          $endpoint = sprintf("%s?%s", $endpoint, http_build_query($data));
    } else {
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

        $jsondata = json_encode($data);
        if ($jsondata)
          curl_setopt($curl, CURLOPT_POSTFIELDS, $jsondata);
    }

    $credentials = aceitaFacil::getApiKey() . ":" . aceitaFacil::getApiSecret();

    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, $credentials);

    curl_setopt($curl, CURLOPT_URL, aceitaFacil::$apiBase . $endpoint);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $jsondata = curl_exec($curl);

    if ($jsondata === false) {
      throw new Exception('Curl error: ' . curl_error($curl));
    }

    return json_decode($jsondata, true);
  }
}
