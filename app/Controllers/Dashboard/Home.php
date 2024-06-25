<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Home extends BaseController {
    public function index() {
        $data = [
            'title' => 'Dashboard'
        ];

        return view('dashboard/home', $data);
    }
}
