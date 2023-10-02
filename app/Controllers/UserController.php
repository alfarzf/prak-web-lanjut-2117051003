<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\KelasModel;
use App\Controllers\BaseController;

class UserController extends BaseController
{
    protected $helpers=['form'];
    public function index()
    {
        //
    }

    public function profile($nama='', $kelas='', $npm=''){
        $data = [
            'nama' => $nama,
            'npm' => $npm,
            'kelas' => $kelas
            
        ];
        return view('profile',$data);
    }

    public function create(){
        // session();
        $kelas = [
            [
                'id' => 1,
                'nama_kelas' => 'A'
            ],
            [
                'id' => 2,
                'nama_kelas' => 'B'
            ],
            [
                'id' => 3,
                'nama_kelas' => 'C'
            ],
            [
                'id' => 4,
                'nama_kelas' => 'D'
            ]
        ];
        $data = [
            'kelas' => $kelas
        ];
        return view('create_user', $data);
    }

    public function store(){
        // if(!$this->validate([
        //     'npm' => 'required|is_unique[user.npm]'
        // ])){
        //     $validation=\Config\Services::validation();
        //     // dd($validation);
        //     $data['validation'] = $validation;
        //     // return view( '/user/create', $data );  
        //     return redirect()->back()->withInput(); 
        // }

        $userModel = new UserModel();
        if(!$this->validate([
            'npm' => 'required|is_unique[user.npm]',
            'nama' => 'required|alpha_space',
            'kelas' => 'required'
        ])){
            // $validation=\Config\Services::validation();
            // session()->setFlashdata('errors', $this->validator->listErrors());  
            return redirect()->back()->withInput();
        }
        
        $userModel->saveUser([
            'nama' => $this->request->getVar('nama'),
            'npm' => $this->request->getVar('npm'),
            'id_kelas' => $this->request->getVar('kelas')
        ]);
        
        $data = [
            'nama' => $this->request->getVar('nama'),
            'npm' => $this->request->getVar('npm'),
            'kelas' => $this->request->getVar('kelas')
        ];
        return view('profile', $data);
    }
}