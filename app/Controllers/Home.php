<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function constract()
    {  
        if((!isset(session()->login_myproject))){
            echo '<script>window.location.href = "'.site_url("/").'";</script>';
		}
    
	}
    
    public function index()
    {
        $this->constract();
        echo view('part/header');
        echo view('part/menu');
        echo view('bendahara/v_welcome');
        echo view('part/footer');
    }
}
