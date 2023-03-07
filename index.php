<?php


use Zen\Model\ZenCredentials;

require_once('vendor/autoload.php');


$zenCredentials = new ZenCredentials('$SECRET_KEY', '$IPN_SECRET', '$TERMINAL_UUID');