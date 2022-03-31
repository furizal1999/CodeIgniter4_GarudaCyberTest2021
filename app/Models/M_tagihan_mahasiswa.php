<?php

namespace App\Models;
 
use CodeIgniter\Model;
 
class M_tagihan_mahasiswa extends Model
{
    function getDataTagihan($id_semester){
        return $this->db->query("
        SELECT * FROM 
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
        ")->getResultObject();
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

    function getComboboxMhs(){
        return $this->db->query("
        SELECT * FROM 
        tb_akun
        WHERE 
        status_login = 'Mahasiswa'

        ")->getResultObject();
    }

    function tambahTagihan($username, $jenis_tagihan, $jumlah_tagihan){
        $id_semester= session()->id_semester;
        $nama_penginput = session()->nama_lengkap;
        return $this->db->query("
            INSERT INTO tb_tagihan
            (
                id_semester,
                username,
                nama_penginput,
                jenis_tagihan,
                jumlah_tagihan
            )
            VALUES
            (
                $id_semester,
                '$username',
                '$nama_penginput',
                '$jenis_tagihan',
                $jumlah_tagihan
            )
        
        
        ");
    }

    function hapusTagihan($id_tagihan){
        return $this->db->query("DELETE FROM tb_tagihan WHERE id_tagihan = '$id_tagihan'");
    }

    function editTagihan($id_tagihan, $jenis_tagihan, $jumlah_tagihan){
        return $this->db->query("UPDATE tb_tagihan SET jenis_tagihan='$jenis_tagihan', jumlah_tagihan='$jumlah_tagihan' WHERE id_tagihan = '$id_tagihan'");
    }

}

?>