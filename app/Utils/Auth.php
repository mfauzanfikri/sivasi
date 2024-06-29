<?php

namespace App\Utils;

use App\Models\Pelanggan;
use App\Models\User;

class Auth {
    public static function hashPassword(string $password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function verify(string $username, string $password) {
        $userModel = new User();

        $user = $userModel->findUserByUsername($username);

        if ($user === null) {
            return false;
        }

        if ($user->username !== $username) {
            return false;
        }

        if (!password_verify($password, $user->password)) {
            return false;
        }

        return true;
    }

    public static function authenticate(string $username, string $password) {
        $userModel = new User();

        $isVerified = self::verify($username, $password);

        if (!$isVerified) {
            return false;
        }

        $user = $userModel->findUserByUsername($username);

        return $user;
    }

    public static function verifyPelanggan(string $username, string $password) {
        $pelangganModel = new Pelanggan();

        $pelanggan = $pelangganModel->where('username', $username)->first();

        if ($pelanggan === null) {
            return false;
        }

        if ($pelanggan->username !== $username) {
            return false;
        }

        if (!password_verify($password, $pelanggan->password)) {
            return false;
        }

        return $pelanggan;
    }

    public static function authenticatePelanggan(string $username, string $password) {
        $isVerified = self::verifyPelanggan($username, $password);

        if (!$isVerified) {
            return false;
        }

        return $isVerified;
    }
}
