<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function constract()
    {
        // echo "a"; die();
		//CEK SESSION
        // sreturn redirect()->route('/');
        // echo session()->has("login_myproject"); die();
		// if((session()->has("login_myproject"))==null){
		// 	return redirect()->route('/');
        //     echo "bb"; die();
		// }else{
		// 	if(strcmp($_SESSION["status_login"], 'Pimpinan')!==0 ){
		// 		//tidak dibolehkan
        //         return redirect()->to('/home');
		// 	}
        //     echo "c"; die();
		// }
        // echo "a"; die();
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
