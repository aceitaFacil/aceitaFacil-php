<?php
class aceitaFacil_cardTest extends PHPUnit_Framework_TestCase {

  protected function setUp() {
    aceitaFacil::setEnv('sandbox');
    aceitaFacil::setApiKeys('438cf8f06e6fef8075592b25a8552f967d5aab76',
                            '9b8587b0b0e54312e00c5715ab78012d54b1549c');
  }

  public function testCreateToken() {
    $customer = array('id' => 'CUSTOMER_ID', 'name' => 'CUSTOMER NAME', 'email' => 'claudio.meinberg@gmail.com');
    $card = array('number' => '4111111111111111', 'name' => 'CARD HOLDER', 'exp_date' => '201508', 'cvv' => '123');

    $cardToken = aceitaFacil_card::createToken($customer, $card);

    $this->assertSame('1111', $cardToken['card']['0']['last_digits']);
    $this->assertSame('visa', $cardToken['card']['0']['card_brand']);
  }

  public function testGetCards() {
    $customer = array('id' => 'CUSTOMER_ID', 'name' => 'CUSTOMER NAME', 'email' => 'claudio.meinberg@gmail.com');
    $card = array('number' => '4111111111111111', 'name' => 'CARD HOLDER', 'exp_date' => '201508', 'cvv' => '123');

    $cardToken = aceitaFacil_card::listCards($customer);

    $this->assertSame('1111', $cardToken['card']['0']['last_digits']);
    $this->assertSame('visa', $cardToken['card']['0']['card_brand']);
  }

}
