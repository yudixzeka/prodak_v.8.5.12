<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        $session = service('session');

        if ($session->get('ses_nama') === null) {
            return view('login/vlogin');
        }
        return redirect()->to('/');
    }

    public function login()
    {
        $session = service('session');

        // 1. Validasi input dulu, jangan langsung query
        $rules = [
            'username' => 'required|min_length[3]|max_length[100]',
            'password' => 'required|min_length[3]',
        ];
        if (! $this->validate($rules)) {
            $session->setFlashdata('status', 'Username atau Password tidak sesuai');
            return redirect()->to('/login');
        }

        // 2. Ambil input HANYA dari POST, bukan getVar()
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // 3. Rate limiting sederhana pakai Throttler bawaan CI4
        $throttler = service('throttler');
        // batasi 5 percobaan per menit per kombinasi IP+username
        $key = 'login_' . md5($this->request->getIPAddress()); // di-hash supaya aman dari karakter reserved
        if ($throttler->check($key, 5, MINUTE) === false) {
            $session->setFlashdata('status', 'Terlalu banyak percobaan. Coba lagi beberapa saat lagi.');
            return redirect()->to('/login');
        }

        // 4. Ambil user berdasarkan username SAJA, jangan sertakan password di query
        $userModel = new \App\Models\UserModels();
        $user = $userModel->where('username', $username)->get()->getRowArray();

        // 5. Verifikasi password pakai password_verify (setelah migrasi hashing, lihat catatan di bawah)
        if (empty($user) || ! password_verify($password, $user['password'])) {
            $session->setFlashdata('status', 'Username atau Password tidak sesuai');
            return redirect()->to('/login');
        }

        // 6. Regenerate session ID untuk cegah session fixation
        $session->regenerate();

        $data = [
            'ses_id'            => $user['id_pengguna'],
            'ses_nama'          => $user['nama_pengguna'],
            'ses_username'      => $user['username'],
            'ses_level'         => $user['level'],
            'ses_kode_wilayah'  => $user['kode_wilayah'],
        ];
        $session->set($data);

        return redirect()->to('/');
    }

    public function logout()
    {
        $session = service('session');
        $session->destroy();
        return redirect()->to('/');
    }
}
