<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\PendudukModel;
use DateTime;

class API extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    private function getNewest()
    {
        $db      = \Config\Database::connect();
        $builder = $db->query("SELECT * FROM tb_pdd INNER JOIN desa ON tb_pdd.kode_desa = desa.kode_desa WHERE tanggal_tambah = (SELECT MAX(tanggal_tambah) FROM tb_pdd)");
        $sql = $builder->getResultArray();
        return $sql;
    }
    private function getDataByDate($date)
    {
        $db      = \Config\Database::connect();
        $builder = $db->query("SELECT * FROM tb_pdd INNER JOIN desa ON tb_pdd.kode_desa = desa.kode_desa WHERE tanggal_tambah = (SELECT MAX(tanggal_tambah) FROM tb_pdd WHERE tanggal_tambah LIKE '$date%');");
        $sql = $builder->getResultArray();
        return $sql;
    }

    public function index()
    {
        $model = new PendudukModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function byDate()
    {
        $date = $this->request->getGet('date');
        if ($date == null) {
            $data = $this->getNewest();
            return $this->respond($data);
        } else {
            $dt = new DateTime($date);
            $date = $dt->format('Y-m-d');
            $data = $this->getDataByDate($date);
            return $this->respond($data);
        }
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function logImport()
    {
        $db      = \Config\Database::connect();
        $builder = $db->query("SELECT DISTINCT(tanggal_tambah) as 'date_import' FROM `tb_pdd` ORDER BY tanggal_tambah DESC;");
        $sql = $builder->getResultArray();
        return $this->respond($sql);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function desa()
    {
        $db      = \Config\Database::connect();
        $builder = $db->query("SELECT * FROM desa INNER JOIN kecamatan ON desa.kode_kecamatan = kecamatan.kode_kecamatan ORDER BY desa.kode_desa;");
        $sql = $builder->getResultArray();
        return $this->respond($sql);
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
