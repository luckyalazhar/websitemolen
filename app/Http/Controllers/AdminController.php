<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
    $jumlah = Hero::count();
            return view('admin',compact('jumlah'),["title"=>"Admin"]);
    }
}
