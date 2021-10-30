<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Catalogue;

class HomeController extends Controller
{
    public function index()
    {
        $catalogues = Catalogue::all();
        return view('ui.landing', compact('catalogues'));
    }
}
