<?php

namespace Zen\Util;

class SignatureGenerator {

    private string $ZEN_PAYWALL_SECRET;
    private array $data;
    private string $hash;

    public function __construct(array $data, string $ZEN_PAYWALL_SECRET) {
        $this->ZEN_PAYWALL_SECRET = $ZEN_PAYWALL_SECRET;
        $this->data = $data;

        $this->hash = $this->generate();
    }

    public function __toString(): string {
        return $this->getHash();
    }

    public function getHash(): string {
        return $this->hash;
    }

    private function generate(): string {
        $query_string = '';
        $params = array_change_key_case($this->data);
        ksort($params);
        foreach ($params as $key => $value) {
            if (is_array($value)) {
                ksort($value);
                foreach ($value as $i => $v) {
                    if (is_array($v)) {
                        ksort($v);
                        foreach ($v as $item_key => $item_value) {
                            $query_string .= '&' . ($key) . '[' . ($i) . '].' . ($item_key) . '=' . ($item_value);
                        }
                    } else {
                        if ($key == 'customer' || $key == 'billingAddress' || $key == 'shippingAddress') {
                            $query_string .= '&' . ($key)  . '.' . ($i) . '=' . ($v);
                        } else {
                            $query_string .= '&' . ($key)  . '[' . ($i) . ']=' . ($v);
                        }
                    }
                }
            } else {
                $query_string .= '&' . ($key)  . '=' . ($value);
            }
        }

        $query = strtolower(ltrim($query_string, '&'));
        return hash('sha256', $query.$this->ZEN_PAYWALL_SECRET).';sha256';
    }


}