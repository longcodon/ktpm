<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Danhmuc;

class FullController extends Controller
{
    public function index($slug)
    {
        $danhmuc = Danhmuc::all();
        return view('layout.full',compact('danhmuc'));
    }
}
