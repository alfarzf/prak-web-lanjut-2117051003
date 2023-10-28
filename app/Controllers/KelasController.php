<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\KelasModel;
use App\Controllers\BaseController;

class KelasController extends BaseController
{
    protected $helpers=['form'];
    public $kelasModel;

    public function __construct(){
        $this->kelasModel = new KelasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'List Kelas',
            'kelas' => $this->kelasModel->getKelas()
        ];
        // dd($data['kelass']);
        return view('list_kelas', $data);
    }

    public function create(){
        $data = [
            'title' => 'Create Kelas'
        ];
        return view('create_kelas', $data);
    }

    public function store(){
        $data=[
            'nama_kelas' => $this->request->getVar('nama_kelas')
        ];

        if(!$this->validate([
            'nama_kelas' => 'required|is_unique[kelas.nama_kelas]'
        ])){
            // $validation=\Config\Services::validation();
            // session()->setFlashdata('errors', $this->validator->listErrors());  
            return redirect()->back()->withInput();
        }
        // $userModel = new UserModel();
        $this->kelasModel->saveKelas($data);
        return redirect()->to('/kelas');
    }

    public function edit($id){
        $kelas = $this->kelasModel->getKelas($id);
        $data = [
            'title' => 'Edit Kelas',
            'kelas' => $kelas 
        ];
        return view('edit_kelas', $data);
    }

    public function update($id){
        if(!$this->validate([
            'nama_kelas' => 'required'
        ])){
            // $validation=\Config\Services::validation();
            // session()->setFlashdata('errors', $this->validator->listErrors());  
            return redirect()->back()->withInput();
        }
    
        $data = [
            'nama_kelas' => $this->request->getVar('nama_kelas')
        ];
        
        $result = $this->kelasModel->updateKelas($data, $id);
        if(!$result){
            return redirect()->back()->withInput()->with('error', 'Gagal Menyimpan Data');
        }
        return redirect()->to('/kelas');
    }

    public function destroy($id){
        $result = $this->kelasModel->deleteKelas($id);
        if(!$result){
            return redirect()->back()->withInput()->with('error', 'Gagal Menghapus Data');
        }
        return redirect()->to(base_url('/kelas'))->with('success', 'Berhasil Menghapus Data');
    }
}
