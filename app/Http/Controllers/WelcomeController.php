<?php

namespace App\Http\Controllers;
use App\Models\Danhmuc;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
{
    $danhmuc = Danhmuc::all(); // Lấy tất cả danh mục
    return view('welcome', compact('danhmuc')); // Truyền biến sang view
}
}
