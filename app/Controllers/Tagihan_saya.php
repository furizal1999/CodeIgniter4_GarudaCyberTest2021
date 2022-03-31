<?php

namespace App\Controllers;
use App\Models\M_tagihan_saya;

class Tagihan_saya extends BaseController
{

    // use CodeIgniter/HTTP/RedirectResponse;
    public function __construct(){
        if((!isset(session()->login_myproject))){
            echo '<script>window.location.href = "'.site_url("/").'";</script>';
		}else{
			if(strcmp(session()->status_login, 'Mahasiswa')==0 ){
				// dibolehkan
			}else{
				// tidak dibolehkan
				echo '<script>window.location.href = "'.site_url("/home").'";</script>';
			}
		}
        
    }
    
    public function index()
    {
        $tagihanMhs = new M_tagihan_saya();
        $data['tagihanMhs'] = $tagihanMhs;
        $data['getDataTagihanSaya'] = $tagihanMhs->getDataTagihanSaya(session()->username);
        $data['getComboboxBank'] = $tagihanMhs->getComboboxBank();
        echo view('part/header');
        echo view('part/menu');
        echo view('mahasiswa/v_tagihan_saya', $data);
        echo view('part/footer');
    }

    public function histori_transaksi()
    {
        $tagihanMhs = new M_tagihan_saya();
        $data['tagihanMhs'] = $tagihanMhs;
        $data['getHistoriTransaksi'] = $tagihanMhs->getHistoriTransaksi(session()->username);
        echo view('part/header');
        echo view('part/menu');
        echo view('mahasiswa/v_histori_transaksi', $data);
        echo view('part/footer');
    }

    public function transaksi(){
        
        if(isset($_POST['tombol_transaksi'])){
            
            $id_tagihan_str = $_POST['id_tagihan_str'];
            $id_metode_bayar = $_POST['id_metode_bayar'];

            $tagihanMhs = new M_tagihan_saya();
            if($tagihanMhs->transaksi($id_tagihan_str, $id_metode_bayar)){
                session()->setFlashdata('messege','<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Transaksi Berhasil!
                </div>');
                return redirect()->to('/tagihan_saya'); 
            }else{
                session()->setFlashdata('messege','<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Maaf, Transaksi Gagal!
                </div>');
                return redirect()->to('/tagihan_saya'); 
            }
        }else{
            return redirect()->to('/tagihan_saya'); 
        }
    }
    
}
