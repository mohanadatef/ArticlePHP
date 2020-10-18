<?php

namespace App\Http\Controllers;

use App\Articale;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function showarticaleguest()
    {
            $articale = Articale::all();
            return view('guest_view.show_guest', compact('articale'));
    }
}
