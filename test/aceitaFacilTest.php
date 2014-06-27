<?php
class aceitaFacilTest extends PHPUnit_Framework_TestCase {
  static public $apiKey = 'API_KEY_STRING';
  static public $apiSecret = 'API_SECRET_STRING';

  public function testsetApiKey() {
    aceitaFacil::setApiKey(self::$apiKey);

    $setedAPI = aceitaFacil::getApiKey();

    $this->assertSame(self::$apiKey, $setedAPI);
  }

  public function testsetApiSecret() {
    aceitaFacil::setApiSecret(self::$apiSecret);

    $setedAPI = aceitaFacil::getApiSecret();

    $this->assertSame(self::$apiSecret, $setedAPI);
  }

  public function testsetsetApiKeys() {
    aceitaFacil::setApiKeys(self::$apiKey, self::$apiSecret);

    $setedAPI = aceitaFacil::getApiKey();
    $this->assertSame(self::$apiKey, $setedAPI);

    $setedAPI = aceitaFacil::getApiSecret();
    $this->assertSame(self::$apiSecret, $setedAPI);
  }

  public function testSetEnv(){
    aceitaFacil::setEnv('sandbox');
    $this->assertSame('https://sandbox.api.aceitafacil.com/', aceitaFacil::$apiBase);

    aceitaFacil::setEnv('production');
    $this->assertSame('https://api.aceitafacil.com/', aceitaFacil::$apiBase);

    aceitaFacil::setEnv('sandbox');
    $this->assertSame('https://sandbox.api.aceitafacil.com/', aceitaFacil::$apiBase);

    aceitaFacil::setEnv('Production');
    $this->assertSame('https://api.aceitafacil.com/', aceitaFacil::$apiBase);

    aceitaFacil::setEnv('PRODUCTION');
    $this->assertSame('https://api.aceitafacil.com/', aceitaFacil::$apiBase);
  }
}
