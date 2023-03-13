<?php

use Zen\Model\Checkout;
use Zen\Model\Checkout\Customer;
use Zen\Model\Checkout\Item;
use Zen\ZenClient;

require_once('vendor/autoload.php');



$client = new ZenClient('XXX', 'XXXX', 'XXX');

$item = new Item('Testowe zamowienie', 10.00, 1, 'test', 'test-kat');
$customer = new Customer('John', 'Doe', 'john@example.com');

$checkout = new Checkout('testowa transakcja1');
$checkout->setCurrency('EUR');
$checkout->setAmount(10.00);
$checkout->addItem($item);
$checkout->setCustomer($customer);


$response = $client->createCheckout($checkout);

echo json_encode($response, JSON_PRETTY_PRINT);


