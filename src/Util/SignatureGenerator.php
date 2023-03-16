<?php

namespace Zen\Util;


/**
 * Class SignatureGenerator
 * @package Zen\Util
 */
class SignatureGenerator {


    /**
     * Function to generate signature for Zen.
     * @param array $data Data to sign
     * @param string|null $paywallSecret Zen Paywall Secret
     * @return string
     */
    public static function generate(array $data, ?string $paywallSecret): string {
        $query = self::arrayToQuery($data);
        return hash('sha256', $query.$paywallSecret).';sha256';
    }

    /**
     * Function to convert array to query string.
     * @param array $data
     * @param string|null $prefix
     * @return string
     */
    private static function arrayToQuery(array $data, ?string $prefix = ''): string {
        $query = [];
        $data = array_change_key_case($data);
        ksort($data, SORT_STRING);
        foreach ($data as $key => $value) {
            if($value === null) {
                continue;
            }

            if ($prefix) {
                $key = $prefix . (is_numeric($key) ? ('[' . $key . ']') : ('.' . $key));
            }

            if (is_array($value)) {
                ksort($value);
                $query[] = self::arrayToQuery($value, $key);
            } else {
                $query[] = strtolower($key) . '=' . strtolower($value);
            }
        }
        return implode('&', $query);
    }

}