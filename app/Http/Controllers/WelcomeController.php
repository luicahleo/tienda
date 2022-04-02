<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    function __invoke()
    {

        $categories = Category::all();
        return view('welcome', compact('categories'));
    }
    
}
