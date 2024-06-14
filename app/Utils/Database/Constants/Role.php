<?php

namespace App\Utils\Database\Constants;

use ReflectionClass;

class Role {
    const ADMIN = 'admin';
    const MANAJER = 'manajer';

    static function getConstants() {
        $oClass = new ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }
}
