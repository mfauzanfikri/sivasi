<?php

namespace App\Models;

use App\Entities\User as UserEntity;
use CodeIgniter\Model;

class User extends Model {
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\User::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username', 'password', 'role'];

    protected array $casts      = ['id_user' => 'int',];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Validation
    protected $validationRules      = [
        'username' => 'required|max_length[15]',
        'password' => 'required|max_length[64]',
        'role' => 'required|max_length[10]'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function findUserByUsername(string $username): UserEntity|null {
        return $this->where('username', $username)->first();
    }
}
