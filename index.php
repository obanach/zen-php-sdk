<?php
require_once('vendor/autoload.php');

use Zen\Model\ZenCredentials;


$zenCredentials = new ZenCredentials('$SECRET_KEY', '$IPN_SECRET', '$TERMINAL_UUID');