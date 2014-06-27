<?php
/**
* Handles payment information for /payment endpoint
*/
class aceitaFacil_payment {
  static public function create($arrData) {
    // print_r($arrData);

    $return = aceitaFacil_apiRequestor::callAPI('POST', 'payment', $arrData);

    return $return;
  }
}
