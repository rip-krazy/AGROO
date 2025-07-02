<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArsipController extends Controller
{
    public function index()
    {
        return view('admin.arsip.index');
    }

    public function create()
    {
        return view('arsip.create');
    }
    
    // Tambahkan method lain sesuai kebutuhan
}