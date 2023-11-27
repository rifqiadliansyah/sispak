<?php

namespace App\Controllers;

use App\Models\AkunModel;
use CodeIgniter\HTTP\Request;
use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function register()
    {
        //   dd($this->request->getVar());
        $akunModel = new AkunModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'user'
        ];

        $akunModel->insert($data);

        $this->session->set('user_id', $akunModel->getInsertID());
        $this->session->setFlashdata('success', 'Akun berhasil dibuat. Silakan login.');

        return redirect()->to('/');
    }

    public function login()
    {
        $userModel = new AkunModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user) {
            if ($user['role'] == 'admin') {
                // Admin login with password check
                if ($password === $user['password']) {
                    $this->session->set('idAkun', $user['idAkun']);
                    $this->session->set('role', $user['role']);
                    return redirect()->to('/homeAdmin');
                }
            } else if (password_verify($password, $user['password'])) {
                // Regular user login
                $this->session->set('idAkun', $user['idAkun']);
                $this->session->set('role', $user['role']);
                return redirect()->to('/home');
            }
        }

    // Login failed
    return redirect()->to('/')->with('error', 'Login failed. Check your username and password.');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/'); // Ganti '/login' dengan rute halaman login
    }
}
