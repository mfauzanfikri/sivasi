<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Utils\Auth as AuthUtil;

class Auth extends BaseController {
    public function index() {
        if (session()->get('is_loggedin')) {
            return redirect()->to('/dashboard/logout');
        }

        return view('dashboard/login');
    }

    public function auth() {
        if (!$this->request->is('post')) {
            return redirect()->to('/dashboard/login');
        }

        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        $messages = [
            'username' => [
                'required' => 'Kolom username harus diisi.'
            ],
            'password' => [
                'required' => 'Kolom password harus diisi.'
            ],
        ];

        $data = $this->request->getPost(array_keys($rules));

        if (!$this->validateData($data, $rules, $messages)) {
            session()->setFlashdata('errors', $this->validator->getErrors());

            return redirect()->to('/dashboard/login');
        }

        $validData = $this->validator->getValidated();

        $user = AuthUtil::authenticate($validData['username'], $validData['password']);

        if (!$user) {
            session()->setFlashdata('error', 'Username atau password salah.');

            return redirect()->to('/dashboard/login');
        }

        $userData = [
            'id_user' => $user->id_user,
            'username' => $user->username,
            'role' => $user->role
        ];

        session()->set('is_loggedin', true);
        session()->set('user', $userData);

        return redirect()->to('/dashboard');
    }

    public function logout() {
        session()->remove('user');
        session()->remove('pelanggan');
        session()->set('is_loggedin', false);

        return redirect()->to('/dashboard/login');
    }
}
