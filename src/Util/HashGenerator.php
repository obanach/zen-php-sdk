<?php

namespace Zen\Util;

/**
 * Class HashGenerator generating hash for Zen IPN.
 * @package Zen\Util
 */
class HashGenerator {

    /**
     * Function to generate hash for Zen IPN.
     * @param string $merchantTransactionId Merchant Transaction ID of the transaction
     * @param string $currency Currency of the transaction as 3 character string
     * @param float $amount Amount of the transaction as float
     * @param string $status Status of the transaction
     * @param string $ipnSecret IPN Secret of the merchant
     * @return string
     */
    public static function generate(string $merchantTransactionId, string $currency, string $amount, string $status, string $ipnSecret): string {
        return strtoupper(hash('sha256', $merchantTransactionId.$currency.$amount.$status.$ipnSecret));
    }
}