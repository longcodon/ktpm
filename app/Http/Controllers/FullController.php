<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FullController extends Controller
{
    public function index($slug)
    {
        return view('layout.full');
    }
}
