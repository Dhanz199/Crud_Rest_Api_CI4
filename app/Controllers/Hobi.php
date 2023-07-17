<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\HobiModels;


class Hobi extends ResourceController
{
    // Routes Api/Produk
    protected $modelName = '\App\Models\HobiModels';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {

        // Menampilkan Data Produk
        return $this->respond([
            'status' => true,
            'data' => $this->model->findAll()
        ], 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        // Menampilkan Data Produk berdasarkan Id produk
        return $this->respond([
            'status' => true,
            'data' => $this->model->find($id),
            'message' => 'Data Hobi Tidak Ditemukan'
        ], 200);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        // Membuat Data Produk
        $data = [
            'nama' => $this->request->getVar('nama'),
            'hobi' => $this->request->getVar('hobi')
        ];

        if ($this->model->save($data)) {
            return $this->respond([
                'status' => true,
                'message' => 'Data Hobi Berhasil ditambahkan'
            ], 200);
        } else {
            return $this->respond([
                'status' => false,
                'errors' => $this->model->errors()
            ], 422);
        };
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        // Mengubah Data Produk Berdasarkan Id

        if (!$this->model->find($id)) {
            return $this->respond(['status' => false, 'messages' => 'Data Hobi Tidak Ditemukan']);
        }

        $data = [
            'nama' => $this->request->getVar('nama'),
            'hobi' => $this->request->getVar('hobi')
        ];

        if ($this->model->update($id, $data)) {
            return $this->respond([
                'status' => true,
                'message' => 'Data Hobi Berhasil diubah'
            ], 200);
        } else {
            return $this->respond([
                'status' => false,
                'errors' => $this->model->errors()
            ], 422);
        };
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        // Menghapus Data Produk Berdasarkan Id
        $this->model->delete($id);

        return $this->respond([
            'status' => true,
            'message' => 'Data Hobi Berhasil dihapus'
        ], 200);
    }
}
