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

// Trong Controller
public function showProducts()
{
    $danhmuc = Danhmuc::whereNotNull('link')->get(); // Lấy sản phẩm có link YouTube
    return view('products', compact('products'));
}
}
