<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('subCategories')->get();
        return view('category.index', get_defined_vars());
    }


    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:255'
        ]);

        $new_category = new Category();
        $new_category->category_name = $request->input('category_name');
        $new_category->slug = Str::slug($request->input('category_name'));
        $latestSlug = Category::whereRaw("slug RLIKE '^{$new_category->slug}(-[0-9]*)?$'")
            ->latest('id')
            ->value('slug');

        if($latestSlug){
            $pieces = explode('-', $latestSlug);
            $number = intval(end($pieces));
            $new_category->slug .= '-'.($number + 1);
        }

        $new_category->save();

        return redirect('home');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
