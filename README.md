# Zen.com PHP SDK
![](https://img.shields.io/packagist/dt/obanach/zen-php-sdk?style=for-the-badge)
![](https://img.shields.io/github/actions/workflow/status/obanach/zen-php-sdk/php.yml?style=for-the-badge)
![](https://img.shields.io/packagist/v/obanach/zen-php-sdk?style=for-the-badge)

PHP client library for creating and retrieving payments via ZEN.COM API

## Installation
```bash
composer require obanach/zen-php-sdk
```

## Usage
### Create checkout
```php
use Zen\ZenClient;

$client = new ZenClient('PAYWALL_SECRET', 'IPN_SECRET', 'TERMINAL_UUID');

$checkout = $client->createCheckout([
    'merchantTransactionId' => 'myCustomTransactionId',
    'amount' => 10.00,
    'currency' => 'PLN',
    'customer' => [
        'firstName' => 'John',
        'lastName' => 'Doe',
        'email' => 'john@example.com'
    ],
    'items' => [
        [
            'code' => 't-shirt',
            'name' => 'Blue t-shirt',
            'price' => 10.00,
            'quantity' => 1,
            'lineAmountTotal' => 10.00,
        ]
    ]
]);

if ($checkout->getStatus()) {
    $checkout->getCheckoutUrl();
} else {
    $checkout->getMessage();
}
```

### Validate IPN
```php
use Zen\ZenClient;

$client = new ZenClient('PAYWALL_SECRET', 'IPN_SECRET', 'TERMINAL_UUID');

// raw json data received from IPN
$json = '{"merchantTransactionId":"myCustomTransactionId","amount":"10.00","currency":"EUR","status":"PAID","hash":"5CD4255C8BEE2A45ADF57DA13CADCA406FF4C5D2A1046E5EF719890A8FB09807"}'

$validate = $client->validateIpn($json);

if ($validate->getStatus()) {
    // validate on your own if currency and amount are correct
    $validate->getMerchantTransactionId();
    $validate->getCurrency();
    $validate->getAmount();
    $validate->getPaymentStatus();
} else {
    // handle error
    $validate->getMessage();
}
```

## API Documentation
See the official zen.com [API documentation](https://www.zen.com/developer/)

## License
MIT license.