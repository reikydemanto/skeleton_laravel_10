<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function index_login () {
        return 
        view('templates.header').
        view('login').
        view('templates.footer');
    }
}
