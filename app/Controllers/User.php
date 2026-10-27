<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{
    public function index()
    {
        $session = service('session');
        $data['cek'] = [
            'ses_level' => $session->get('ses_level'),
            'ses_nama'  => $session->get('ses_nama'),
        ];

        $userModel = new \App\Models\UserModels();
        $data['user'] = $userModel->get()->getResultArray();

        echo view('user/vuser', $data);
    }

    public function editmodal()
    {
        $id = $this->request->getPost('id');

        if (empty($id)) {
            return $this->response->setStatusCode(400)->setBody('ID tidak valid');
        }

        $userModel = new \App\Models\UserModels();

        $data['user'] = $userModel->find($id);

        if (empty($data['user'])) {
            return $this->response->setStatusCode(404)->setBody('User tidak ditemukan');
        }

        echo view('user/vuserModal', $data);
    }

    public function save()
    {
        $session = service('session');
        $id      = $this->request->getPost('id');

        // Validasi dasar
        $rules = [
            'nama_pengguna' => 'required|min_length[3]|max_length[100]',
            'username'      => 'required|min_length[3]|max_length[100]',
        ];
        if (! $this->validate($rules)) {
            $session->setFlashdata('pesan', 'Data tidak valid: ' . implode(', ', $this->validator->getErrors()));
            return redirect()->to('user');
        }

        $userModel = new \App\Models\UserModels();

        $data = [
            'nama_pengguna' => $this->request->getPost('nama_pengguna'),
            'username'      => $this->request->getPost('username'),
        ];

        $password = $this->request->getPost('password');
        if (! empty($password)) {
            if (strlen($password) < 8) {
                $session->setFlashdata('pesan', 'Password minimal 8 karakter');
                return redirect()->to('user');
            }
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $userModel->update($id, $data);
        $session->setFlashdata('pesan', 'diupdate');

        return redirect()->to('user');
    }
}