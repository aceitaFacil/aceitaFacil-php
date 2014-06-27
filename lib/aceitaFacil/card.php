<?php
/**
* Handles card information for /card endpoint
*/
class aceitaFacil_card {
  static public function createToken($customer, $card) {
    $arrData = array('customer' => $customer, 'card' => $card);

    $return = aceitaFacil_apiRequestor::callAPI('POST', 'card', $arrData);

    return $return;
  }

  static public function listCards($customer) {
    $arrData = array('customer' => $customer);

    $return = aceitaFacil_apiRequestor::callAPI('GET', 'card', $arrData);

    return $return;
  }

}
