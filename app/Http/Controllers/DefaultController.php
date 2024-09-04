<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function home()
    {
        return view('welcome');
    }
}
