<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\User as UserModel;
use App\Utils\Auth;
use App\Utils\Database\Constants\Role;

class Home extends BaseController {
    public function index() {
        $data = [
            'title' => 'Dashboard'
        ];

        return view('dashboard/home', $data);
    }
}
