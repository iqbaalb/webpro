<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    protected $mhs;

    public function __construct()
    {
        $this->mhs = new MahasiswaModel();
    }

    public function index()
    {
        return view('mahasiswa/index');
    }

    public function getData()
    {
        return $this->response->setJSON([
            'data' => $this->mhs->findAll()
        ]);
    }

    public function form()
    {
        return view('mahasiswa/form');
    }

    public function save()
    {
        $this->mhs->save($this->request->getPost());

        return redirect()->to('/mahasiswa')
            ->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        return view('mahasiswa/edit', [
            'mhs' => $this->mhs->find($id)
        ]);
    }

    public function update($id)
    {
        $this->mhs->update($id, $this->request->getPost());

        return redirect()->to('/mahasiswa')
            ->with('success', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $this->mhs->delete($id);

        return redirect()->to('/mahasiswa')
            ->with('success', 'Data berhasil dihapus');
    }
}
