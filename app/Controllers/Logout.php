<?php

namespace App\Controllers;
class Logout extends BaseController
{
    

    public function index()
    {
        session();
        $_SESSION = [];
        session_unset();
        session_destroy();
        
        return redirect()->route('/');
        exit;
    }
}
