<?php

namespace App\Controllers;
use App\Models\M_tagihan_mahasiswa;

class Tagihan_mahasiswa extends BaseController
{

    // use CodeIgniter/HTTP/RedirectResponse;
    public function __construct(){
        if((!isset(session()->login_myproject))){
            echo '<script>window.location.href = "'.site_url("/").'";</script>';
		}else{
			if(strcmp(session()->status_login, 'Bendahara')==0 ){
				// dibolehkan
			}else{
				// tidak dibolehkan
				echo '<script>window.location.href = "'.site_url("/home").'";</script>';
			}
		}
        
    }
    
    public function index()
    {
        $tagihanMhs = new M_tagihan_mahasiswa();
        $data['tagihanMhs'] = $tagihanMhs;
        if (isset($_POST['id_semester'])) {
            $id_semester = $_POST['id_semester'];
            $tahun_ajaran = $_POST['tahun_ajaran'];
            $semester = $_POST['semester'];
            session()->id_semester = $id_semester;
            session()->tahun_ajaran = $tahun_ajaran;
            session()->semester = $semester;
            $tombolTambah = 1;
        }if(isset(session()->id_semester)){
            $id_semester = session()->id_semester;
            $tombolTambah = 1;
        }else{
            $id_semester = 0;
            $tombolTambah = 0;
        }
        $data['tombolTambah'] = $tombolTambah;
        $data['getDataTagihan'] = $tagihanMhs->getDataTagihan($id_semester);
        echo view('part/header');
        echo view('part/menu');
        echo view('bendahara/v_tagihan_mahasiswa', $data);
        echo view('part/footer');
    }

    public function tambah_tagihan(){
        
        if(isset($_POST['tombol_tambah_tagihan'])){
            $username = $_POST['username'];
            $jenis_tagihan = $_POST['jenis_tagihan'];
            $jumlah_tagihan = $_POST['jumlah_tagihan'];

            $tagihanMhs = new M_tagihan_mahasiswa();
            if($tagihanMhs->tambahTagihan($username, $jenis_tagihan, $jumlah_tagihan)){
                session()->setFlashdata('messege','<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Tagihan berhasil ditambahkan!
                </div>');
                return redirect()->to('/tagihan_mahasiswa'); 
            }else{
                session()->setFlashdata('messege','<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Maaf, Tagihan gagal ditambahkan!
                </div>');
                return redirect()->to('/tagihan_mahasiswa'); 
            }
        }else{
            return redirect()->to('/tagihan_mahasiswa'); 
        }
    }

    public function hapus_tagihan(){
        
        if(isset($_POST['tombol_hapus_tagihan'])){
            $id_tagihan = $_POST['id_tagihan'];
            $tagihanMhs = new M_tagihan_mahasiswa();
            if($tagihanMhs->hapusTagihan($id_tagihan)){
                session()->setFlashdata('messege','<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Tagihan berhasil dihapus!
                </div>');
                return redirect()->to('/tagihan_mahasiswa'); 
            }else{
                session()->setFlashdata('messege','<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Maaf, Tagihan gagal dihapus!
                </div>');
                return redirect()->to('/tagihan_mahasiswa'); 
            }
        }else{
            return redirect()->to('/tagihan_mahasiswa'); 
        }
    }

    public function edit_tagihan(){
        
        if(isset($_POST['tombol_edit_tagihan'])){
            $id_tagihan = $_POST['id_tagihan'];
            $jenis_tagihan = $_POST['jenis_tagihan'];
            $jumlah_tagihan = $_POST['jumlah_tagihan'];
            $tagihanMhs = new M_tagihan_mahasiswa();
            if($tagihanMhs->editTagihan($id_tagihan, $jenis_tagihan, $jumlah_tagihan)){
                session()->setFlashdata('messege','<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Tagihan berhasil diedit!
                </div>');
                return redirect()->to('/tagihan_mahasiswa'); 
            }else{
                session()->setFlashdata('messege','<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Maaf, Tagihan gagal diedit!
                </div>');
                return redirect()->to('/tagihan_mahasiswa'); 
            }
        }else{
            return redirect()->to('/tagihan_mahasiswa'); 
        }
    }
}
