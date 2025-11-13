<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index(){
         $user = auth()->user();
        return view('pages.perfil',compact('user'));
    }
}
