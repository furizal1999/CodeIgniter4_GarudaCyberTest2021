<?php

namespace App\Models;
 
use CodeIgniter\Model;
 
class M_tagihan_saya extends Model
{
    function getDataTagihanSaya($username){
        return $this->db->query("
        SELECT *, a.id_tagihan AS id_tagihan FROM 
        tb_tahun_ajaran,
        tb_semester,
        tb_akun, 
        tb_tagihan a LEFT JOIN tb_transaksi b
        ON a.id_tagihan = b.id_tagihan
        
        WHERE 
        tb_akun.username = a.username AND
        tb_tahun_ajaran.id_tahun_ajaran = tb_semester.id_tahun_ajaran AND
        tb_semester.id_semester = a.id_semester AND
        tb_akun.status_login = 'Mahasiswa' AND
        tb_akun.username = '$username' AND
        b.id_transaksi IS NULL

        ORDER BY tb_tahun_ajaran.tahun_ajaran ASC, tb_semester.semester ASC
        ")->getResultObject();
    }

    function getHistoriTransaksi($username){
        return $this->db->query("
        SELECT * FROM 
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
        tb_akun.username = '$username' AND
        tb_tagihan.id_tagihan = tb_transaksi.id_tagihan AND
        tb_metode_bayar.id_metode_bayar = tb_transaksi.id_metode_bayar

        ORDER BY tb_tahun_ajaran.tahun_ajaran ASC, tb_semester.semester ASC, tb_transaksi.id_transaksi ASC
        ")->getResultObject();
    }

    function transaksi($id_tagihan_str, $id_metode_bayar){
        $id_tagihan_array = explode(", ", $id_tagihan_str);
        $nama_pembayar = session()->nama_lengkap;
        foreach($id_tagihan_array AS $a){
            $getJumlahTagihan = $this->getJumlahTagihan($a);
            $this->db->query("INSERT INTO tb_transaksi
                (
                    id_tagihan,
                    id_metode_bayar,
                    nama_pembayar,
                    jumlah_transaksi
                )
                VALUES
                (
                    $a,
                    $id_metode_bayar,
                    '$nama_pembayar',
                    $getJumlahTagihan
                )
            ");
        }

        return 1;
    }

    function getComboboxBank(){
        return $this->db->query("
        SELECT * FROM 
        tb_metode_bayar

        ")->getResultObject();
    }

   

    function getJumlahTagihan($id_tagihan){
        $row = $this->db->query("SELECT jumlah_tagihan AS jt FROM tb_tagihan WHERE id_tagihan = '$id_tagihan'")->getRow();
        if($row){
            return $row->jt;
        }else{
            return 0;
        }
    }
}

?>