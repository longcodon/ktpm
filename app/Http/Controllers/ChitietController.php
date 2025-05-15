<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChitietController extends Controller
{
    public function index($slug)
    {
        return view('layout.chitiet');
    }
}
