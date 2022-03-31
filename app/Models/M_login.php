<?php

namespace App\Models;
 
use CodeIgniter\Model;
 
class M_login extends Model
{
    function cek_login($username){
        return $this->db->query("SELECT * FROM tb_akun WHERE username='$username'")->getRow();
    }
}

?>