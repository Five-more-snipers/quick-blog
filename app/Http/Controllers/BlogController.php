<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View {
        return view('blogs', [
            
        ]);
    }
}
