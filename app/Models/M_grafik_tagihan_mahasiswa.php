<?php

namespace App\Models;
 
use CodeIgniter\Model;
 
class M_grafik_tagihan_mahasiswa extends Model
{
    function getTotalTransaksi($id_semester){
        $row = $this->db->query("
        SELECT sum(tb_transaksi.jumlah_transaksi) AS tot FROM 
        tb_tahun_ajaran,
        tb_semester,
        tb_akun,
        tb_tagihan,
        tb_transaksi,
        tb_metode_bayar
        
        WHERE 
        tb_akun.username = tb_tagihan.username AND
        tb_tahun_ajaran.id_tahun_ajaran = tb_semester.id_tahun_ajaran AND
        tb_semester.id_semester = tb_tagihan.id_semester AND
        tb_akun.status_login = 'Mahasiswa' AND
        tb_tagihan.id_tagihan = tb_transaksi.id_tagihan AND
        tb_metode_bayar.id_metode_bayar = tb_transaksi.id_metode_bayar AND
        tb_semester.id_semester='$id_semester'
        ")->getRow();
        if($row){
            return $row->tot;
        }else{
            return 0;
        }
    }

    function getTotalTagihan($id_semester){
        $row = $this->db->query("
        SELECT sum(tb_tagihan.jumlah_tagihan) AS tot FROM 
        tb_tahun_ajaran,
        tb_semester,
        tb_akun,
        tb_tagihan
        
        WHERE 
        tb_akun.username = tb_tagihan.username AND
        tb_tahun_ajaran.id_tahun_ajaran = tb_semester.id_tahun_ajaran AND
        tb_semester.id_semester = tb_tagihan.id_semester AND
        tb_akun.status_login = 'Mahasiswa' AND
        tb_semester.id_semester='$id_semester'
        ")->getRow();
        if($row){
            return $row->tot;
        }else{
            return 0;
        }
    }

    function getComboboxSemester(){
        return $this->db->query("
        SELECT * FROM 
        tb_tahun_ajaran,
        tb_semester
        
        WHERE 
        tb_tahun_ajaran.id_tahun_ajaran = tb_semester.id_tahun_ajaran
        ORDER BY tb_semester.id_semester DESC

        ")->getResultObject();
    }


}

?>