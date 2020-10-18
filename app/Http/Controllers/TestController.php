<?php

namespace App\Http\Controllers;

use App\Articale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class testController extends Controller
{
    public function showtest()
    {
        $url = "Believe in love - Believe in Christmas.mp4";
        return view('test', compact('url'));
    }
}