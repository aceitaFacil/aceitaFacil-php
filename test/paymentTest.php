<?php
class paymentTest extends PHPUnit_Framework_TestCase {

  protected function setUp() {
    aceitaFacil::setEnv('sandbox');
    aceitaFacil::setApiKeys('438cf8f06e6fef8075592b25a8552f967d5aab76',
                            '9b8587b0b0e54312e00c5715ab78012d54b1549c');
  }

  public function testCreate(){
    $customer = array('id' => 'CUSTOMER_ID', 'name' => 'CUSTOMER NAME', 'email' => 'claudio.meinberg@gmail.com');
    $card = array('number' => '4111111111111111', 'name' => 'CARD HOLDER', 'exp_date' => '201508', 'cvv' => '123');

    $payment = aceitaFacil_payment::create(array('card' => $card,
                                                 'total_amount'=>1000,
                                                 'item' => array( 0 => array( 'amount'=>1000 ))));

    $this->assertSame(932, $payment['items'][0]['amount'], 'Item 0 amount');
    $this->assertSame(68, $payment['items'][1]['amount'], 'aF Fee');
  }


}
