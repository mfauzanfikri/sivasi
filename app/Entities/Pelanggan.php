<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Pelanggan extends Entity {
    public function getData(): array {
        return $this->attributes;
    }
}
