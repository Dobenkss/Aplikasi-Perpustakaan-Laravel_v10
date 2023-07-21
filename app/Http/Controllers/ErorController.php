<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErorController extends Controller
{
    public function index()
    {
        return view('eror404');
    }
}
