<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\KelasModel;
use App\Controllers\BaseController;

class UserController extends BaseController
{
    protected $helpers=['form'];
    public $userModel;
    public $kelasModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new KelasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser()
        ];
        // dd($data['users']);
        return view('list_user', $data);
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
        // dd($this->kelasModel);
        // session();
        // $kelasModel = new KelasModel();
        $kelas = $this->kelasModel->getKelas();
        // $kelas = [
        //     [
        //         'id' => 1,
        //         'nama_kelas' => 'A'
        //     ],
        //     [
        //         'id' => 2,
        //         'nama_kelas' => 'B'
        //     ],
        //     [
        //         'id' => 3,
        //         'nama_kelas' => 'C'
        //     ],
        //     [
        //         'id' => 4,
        //         'nama_kelas' => 'D'
        //     ]
        // ];
        $data = [
            'title' => 'Create User',
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
        // $kelasModel = new KelasModel();
        $data=[
            'nama' => $this->request->getVar('nama'),
            'npm' => $this->request->getVar('npm'),
            'id_kelas' => $this->request->getVar('kelas')
        ];
        $path='assets/uploads/img/';
        $foto=$this->request->getFile('foto');
        // $name = $foto->getRandomName();
        // if($foto->move($path, $name)){
        //     $foto = base_url($path . $name);
        // }

        if($foto->isValid()){
            $name = $foto->getRandomName();
            if($foto->move($path, $name)){
                $foto = base_url($path . $name);
                $data['foto']=$foto;
            }
        }
        // else{
        //     return redirect()->back()->withInput();
        // }

        if($this->request->getVar('kelas') != ''){
            $kelas_select = $this->kelasModel->where('id', $this->request->getVar('kelas'))->first();
            $nama_kelas = $kelas_select['nama_kelas'];
        }else{
            $nama_kelas = '';
        }

        if(!$this->validate([
            'npm' => 'required|is_unique[user.npm]',
            'nama' => 'required|alpha_space',
            'kelas' => 'required'
        ])){
            // $validation=\Config\Services::validation();
            // session()->setFlashdata('errors', $this->validator->listErrors());  
            return redirect()->back()->withInput();
        }
        // $userModel = new UserModel();
        $this->userModel->saveUser($data);
        return redirect()->to('/user');
        // $data = [
        //     'nama' => $this->request->getVar('nama'),
        //     'npm' => $this->request->getVar('npm'),
        //     'kelas' => $nama_kelas,
        //     'title' => 'Profile'
        // ];
        // return view('profile', $data);
    }
    public function show($id){
        $user = $this->userModel->getUser($id);
        $data = [
            'title' => "Profile",
            'user' => $user
        ];
        return view('profile', $data);
    }

    public function edit($id){
        $user = $this->userModel->getUser($id);
        $kelas = $this->kelasModel->getKelas();
        $data = [
            'title' => 'Edit User',
            'user' => $user,
            'kelas' => $kelas 
        ];
        return view('edit_user', $data);
    }
    
    public function update($id){
        $path='assets/uploads/img/';
        $foto=$this->request->getFile('foto');

        if(!$this->validate([
            'npm' => 'required',
            'nama' => 'required|alpha_space',
            'kelas' => 'required'
        ])){
            // $validation=\Config\Services::validation();
            // session()->setFlashdata('errors', $this->validator->listErrors());  
            return redirect()->back()->withInput();
        }
    
        $data = [
            'nama' => $this->request->getVar('nama'),
            'id_kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm')
        ];
        
        if($foto->isValid()){
            $name = $foto->getRandomName();
            if($foto->move($path, $name)){
                $foto_path = base_url($path . $name);
                $data['foto'] = $foto_path;
            }
        }
        $result = $this->userModel->updateUser($data, $id);
        if(!$result){
            return redirect()->back()->withInput()->with('error', 'Gagal Menyimpan Data');
        }
        return redirect()->to('/user');
    }

    public function destroy($id){
        $result = $this->userModel->deleteUser($id);
        if(!$result){
            return redirect()->back()->withInput()->with('error', 'Gagal Menghapus Data');
        }
        return redirect()->to(base_url('/user'))->with('success', 'Berhasil Menghapus Data');
    }
}