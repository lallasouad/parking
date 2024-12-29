<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class rvc extends Controller
{
    public function index()
    {
       return view('ticket');
    }
}
