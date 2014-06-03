# aceitaFacil PHP Plugin [![Build Status](https://travis-ci.org/aceitaFacil/aceitaFacil-php.svg?branch=master)](https://travis-ci.org/aceitaFacil/aceitaFacil-php) [![Coverage Status](https://coveralls.io/repos/aceitaFacil/aceitaFacil-php/badge.png)](https://coveralls.io/r/aceitaFacil/aceitaFacil-php)

Use this library to easily access aceitaFacil APIs and functions in PHP.

## Installation

Obtain the latest version of the aceitaFacil PHP bindings with:

```sh
git clone https://github.com/aceitaFacil/aceitaFacil-php
```

To get started, add the following to your PHP script:

```sh
require_once("/path/to/aceitaFacil-php/lib/aceitaFacil.php");
```

Simple usage looks like:

```sh
aceitaFacil::setApiKeys('438cf8f06e6fef8075592b25a8552f967d5aab76', 
                        '9b8587b0b0e54312e00c5715ab78012d54b1549c');

$customer = array('id' => 'CUSTOMER_ID', 'name' => 'Customer Name', 'email' => 'customer@example.com');
$card = array('token' => 'CARD TOKEN', 'cvv' => 'CVV');
$payment = aceitaFacil_payment::create(array('card' => $card, 'total_amount' => 1000, 'item' => array(0 => array('amount' => 1000))));
print_r($payment);
```

## Documentation

* Please see https://aceitaFacil.com/docs for up-to-date documentation.
