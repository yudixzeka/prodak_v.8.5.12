<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    /**
     * Cek apakah user sudah login sebelum mengakses rute.
     * Kalau belum, redirect ke halaman login.
     *
     * $arguments bisa diisi daftar level yang diizinkan, misal:
     * ['filter' => 'auth:Administrator,Operator']
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // 1. Cek sudah login atau belum
        if ($session->get('ses_nama') === null) {
            $session->setFlashdata('status', 'Silakan login terlebih dahulu.');
            return redirect()->to('/login');
        }

        // 2. Kalau filter diberi argumen level (opsional), cek levelnya juga
        if (! empty($arguments)) {
            $userLevel = $session->get('ses_level');

            if (! in_array($userLevel, $arguments, true)) {
                // User sudah login tapi levelnya tidak diizinkan untuk rute ini
                return service('response')
                    ->setStatusCode(403)
                    ->setBody('Anda tidak memiliki akses ke halaman ini.');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu logika apa pun setelah request diproses
    }
}