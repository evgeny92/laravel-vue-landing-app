<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        $categories = Category::all();

        return view('subcategory.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required'
        ]);

        $new_subcategory = new Subcategory();
        $new_subcategory->category_id = (int)$request->input('category_id');
        $new_subcategory->subcategory_name = $request->input('subcategory_name');
        $new_subcategory->slug = Str::slug($request->input('subcategory_name'));
        $latestSlug = Subcategory::whereRaw("slug RLIKE '^{$new_subcategory->slug}(-[0-9]*)?$'")
            ->latest('id')
            ->value('slug');

        if($latestSlug){
            $pieces = explode('-', $latestSlug);
            $number = intval(end($pieces));
            $new_subcategory->slug .= '-'.($number + 1);
        }

        $new_subcategory->save();

        return redirect('home');
    }

    public function show(Subcategory $subcategory)
    {
        //
    }

    public function edit(Subcategory $subcategory)
    {
        //
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        //
    }

    public function destroy(Subcategory $subcategory)
    {
        //
    }
}
