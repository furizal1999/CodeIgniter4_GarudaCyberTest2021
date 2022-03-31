<?php

namespace App\Controllers;
use App\Models\M_login;
class Login extends BaseController
{
    

    public function index()
    {
        echo view('part/header');
        echo view('v_login');
        echo view('part/footer');
    }

    public function proses_login(){
        $session = session();
        if(isset($_POST['tombol_login'])){
            $username = addslashes ($_POST["username"]);
            $password=addslashes ($_POST["password"]);


            $model_login = new M_login();
            // var_dump($model_login->cek_login($username));
            // die();
            $row = $model_login->cek_login($username);

            if($row){
                // var_dump($row->username); die();
                $username = $row->username;
                $nama_lengkap = $row->nama_lengkap;
                $status_login = $row->status_login;
                $jabatan = $row->jabatan;
                $tempat_lahir = $row->tempat_lahir;
                $tanggal_lahir = $row->tanggal_lahir;
                $jenis_kelamin = $row->jenis_kelamin;
                $foto = $row->foto;
                $password_encripsi = $row->password;
                $status_akun = $row->status_akun;
                // echo $status_akun; die();
                if($status_akun=="Aktif"){
                    if(password_verify($password, $password_encripsi)){
                        session()->login_myproject = true;
                        session()->username = $username;
                        session()->nama_lengkap = $nama_lengkap;
                        session()->status_login= $status_login;
                        session()->jabatan = $jabatan;
                        session()->tempat_lahir = $tempat_lahir;
                        session()->tanggal_lahir = $tanggal_lahir;
                        session()->jenis_kelamin = $jenis_kelamin;
                        session()->foto = $foto;
                        session()->status_akun = $status_akun;
                        return redirect()->to('/home'); 
                        // exit;
                    }
                    else{
                        $session->setFlashdata('messege','<div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            Maaf, Password tidak sesuai!
                        </div>');
                        return redirect()->route('/');  
                    }
                }
                else{
                    $session->setFlashdata('messege','<div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            Maaf, Akun anda sedang tidak aktif!
                        </div>');
                        return redirect()->route('/');
                }
                
            }else{
                $session->setFlashdata('messege','<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Maaf, username yang anda masukkan salah!
                </div>');
                return redirect()->route('/');
                
            }
        
        }else{
            return redirect()->route('/');
        }
        
    }


}
