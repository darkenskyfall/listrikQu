<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $catalogues = Catalogue::all();
        return view('adm.dashboard');
    }
}
