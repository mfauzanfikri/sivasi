<?php

namespace App\Utils;

class Auth {
    public static function hashPassword(string $password) {
        return hash('sha256', $password);
    }
}
