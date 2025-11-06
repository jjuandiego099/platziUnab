<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlatziController extends Controller
{
    function cursos(){
         return view('pages.dashboard');
    }
}
