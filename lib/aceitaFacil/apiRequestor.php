<?php

/**
* Handles API requests
*/
class aceitaFacil_apiRequestor {
  // Method: POST, PUT, GET etc
  // Data: array("param" => "value") ==> index.php?param=value

  static public function callAPI($method, $endpoint, $data = false) {
    $curl = curl_init();

    switch ($method) {
      case "POST":
        curl_setopt($curl, CURLOPT_POST, 1);

        $jsondata = json_encode($data);

        if ($jsondata)
          curl_setopt($curl, CURLOPT_POSTFIELDS, $jsondata);
        break;
      // case "PUT":
      //   curl_setopt($curl, CURLOPT_PUT, 1);
      //   break;
      default:
        if ($data)
          $endpoint = sprintf("%s?%s", $endpoint, http_build_query($data));
    }

    $credentials = aceitaFacil::getApiKey() . ":" . aceitaFacil::getApiSecret();

    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, $credentials);

    curl_setopt($curl, CURLOPT_URL, aceitaFacil::$apiBase . $endpoint . '.json');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $jsondata = curl_exec($curl);

    return json_decode($jsondata, true);
  }
}