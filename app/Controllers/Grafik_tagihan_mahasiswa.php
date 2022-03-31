<?php

namespace App\Controllers;
use App\Models\M_grafik_tagihan_mahasiswa;

class Grafik_tagihan_mahasiswa extends BaseController
{

    // use CodeIgniter/HTTP/RedirectResponse;
    public function __construct(){
        if((!isset(session()->login_myproject))){
            echo '<script>window.location.href = "'.site_url("/").'";</script>';
		}else{
			if(strcmp(session()->status_login, 'Pimpinan')==0 ){
				// dibolehkan
			}else{
				// tidak dibolehkan
				echo '<script>window.location.href = "'.site_url("/home").'";</script>';
			}
		}
        
    }
    
    public function index()
    {
        $tagihanMhs = new M_grafik_tagihan_mahasiswa();
        if (isset($_POST['id_semester'])) {
            $id_semester = $_POST['id_semester'];
            $tahun_ajaran = $_POST['tahun_ajaran'];
            $semester = $_POST['semester'];
            session()->id_semester = $id_semester;
            session()->tahun_ajaran = $tahun_ajaran;
            session()->semester = $semester;
        }if(isset(session()->id_semester)){
            $id_semester = session()->id_semester;
        }else{
            $id_semester = 0;
        }
        $data['getTotalTagihan'] = $tagihanMhs->getTotalTagihan($id_semester);
        $data['getTotalTransaksi'] = $tagihanMhs->getTotalTransaksi($id_semester);
        $data['getComboboxSemester'] = $tagihanMhs->getComboboxSemester();
        echo view('part/header');
        echo view('part/menu');
        echo view('pimpinan/v_grafik_tagihan_mahasiswa', $data);
        echo view('part/footer');
    }

}

?>