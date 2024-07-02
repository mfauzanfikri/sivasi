<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Pelanggan as PelangganEntity;
use App\Models\Pelanggan;
use App\Utils\Auth as AuthUtil;

class Auth extends BaseController {
    public function index() {
        if (session()->get('is_loggedin') || session()->get('pelanggan')) {
            return redirect()->to('/logout');
        }

        $data = [
            'title' => 'Login'
        ];

        return view('login', $data);
    }

    public function auth() {
        $postData = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password')
        ];

        if (!$postData['username'] || !$postData['password']) {
            session()->setFlashdata('error', 'Semua field harus diisi.');

            return redirect()->to('/login');
        }

        $pelanggan = AuthUtil::authenticatePelanggan((string)$postData['username'], (string)$postData['password']);

        if (!$pelanggan) {
            session()->setFlashdata('error', 'Username atau password salah.');

            return redirect()->to('/login');
        }

        $pelangganData = [
            'id_pelanggan' => $pelanggan->id_pelanggan,
            'username' => $pelanggan->username,
            'nama' => $pelanggan->nama,
            'alamat' => $pelanggan->alamat,
            'no_telepon' => $pelanggan->no_telepon,
        ];

        session()->set('is_loggedin', true);
        session()->set('pelanggan', $pelangganData);

        return redirect()->to('/');
    }

    public function register() {
        if (session()->get('is_loggedin') || session()->get('pelanggan')) {
            return redirect()->to('/logout');
        }

        $data = [
            'title' => 'Register'
        ];

        return view('register', $data);
    }

    public function registerPelanggan() {
        $pelangganModel = new Pelanggan();
        $pelangganEntity = new PelangganEntity();

        $postData = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'konfirmasi_password' => $this->request->getPost('konfirmasi_password'),
            'nama' => $this->request->getPost('nama'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        if ($postData['password'] !== $postData['konfirmasi_password']) {
            session()->setFlashdata('error', 'Konfirmasi password salah.');

            return redirect()->to('/register');
        }

        $isExist = $pelangganModel->where('username', $postData['username'])->first();

        if ($isExist) {
            session()->setFlashdata('error', 'Username sudah digunakan.');

            return redirect()->to('/register');
        }

        $postData['password'] = AuthUtil::hashPassword((string)$postData['password']);

        $pelangganEntity->fill($postData);
        $pelangganModel->save($pelangganEntity);

        return redirect()->to('/login');
    }

    public function logout() {
        session()->remove('pelanggan');
        session()->remove('user');
        session()->set('is_loggedin', false);

        return redirect()->to('/');
    }
}
