<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Domain;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){

        $domains = Domain::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('welcome', get_defined_vars());
    }
}
