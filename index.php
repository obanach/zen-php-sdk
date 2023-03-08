<?php

use Zen\Model\Checkout;
use Zen\Model\Checkout\Customer;
use Zen\Model\Checkout\Item;
use Zen\ZenClient;

require_once('vendor/autoload.php');

$client = new ZenClient('$SECRET_KEY', '$IPN_SECRET', '$TERMINAL_UUID');

$checkout = new Checkout(10.00, 'EUR', 'test');
$checkout->addItem(new Item('test', 10.00, 1));
$checkout->setCustomer(new Customer('John', 'Doe', 'john@example.com'));

$client->createCheckout($checkout);


