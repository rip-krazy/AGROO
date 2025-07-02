<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemoController extends Controller
{
    public function index()
    {
        return view('admin.memo.index');
    }

    public function create()
    {
        return view('memo.create');
    }
    
    // Tambahkan method lain sesuai kebutuhan
}