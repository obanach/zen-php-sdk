<?php

namespace Zen\Util;

class ModelToArray {

    public static function convert($data): array {

        return json_decode(json_encode($data->getAmount()), true);
    }
}