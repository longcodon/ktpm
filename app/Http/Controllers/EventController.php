<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index($slug)
    {
        return view('layout.event');
    }
}
