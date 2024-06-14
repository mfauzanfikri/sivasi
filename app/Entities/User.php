<?php

namespace App\Entities;

use App\Utils\Database\Constants\Role;
use CodeIgniter\Entity\Entity;
use Error;

class User extends Entity {
    public function getData(): array {
        return $this->attributes;
    }

    /**
     * @param string $role App\Database\Constants\Role
     */
    public function setRole(string $role): self {
        $roles = Role::getConstants();

        if (!array_search($role, $roles)) {
            throw new Error('$role parameter must be one of Role class constants');
        }

        $this->attributes['role'] = $role;

        return $this;
    }
}
