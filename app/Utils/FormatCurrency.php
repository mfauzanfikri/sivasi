<?php

namespace App\Utils;

class FormatCurrency {
    public static function formatToIDR(float|int $number) {
        return "Rp" . number_format($number, 2, ",", ".");
    }
}
