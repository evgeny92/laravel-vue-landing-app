<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Domain;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class DomainController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('domain.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'title' => 'required|max:60',
            'url' => 'required|max:255',
            'short_description' => 'required|max:255',
        ]);

        $new_domain = new Domain();
        $new_domain->title = $request->input('title');
        $new_domain->email = $request->input('email');
        $new_domain->url = $request->input('url');
        $new_domain->short_description = $request->input('short_description');
        $new_domain->description = $request->input('description');
        $new_domain->category_id = $request->input('category_id');
        $new_domain->subcategory_id = $request->input('subcategory_id');
        //$new_domain->payment_id = uniqid();
        if($request->hasFile('img')){
            $image = $request->file('img');
            $name = time() . '_' . $image->getClientOriginalName();
            $img_path = 'img';
            $image->move(public_path($img_path), $name);
            $new_domain->img = $name;
        } else
            $new_domain->img = 'default.jpg';

        $new_domain->save();

    }

    public function show(Domain $domain)
    {
        //
    }

    public function edit(Domain $domain)
    {
        //
    }

    public function update(Request $request, Domain $domain)
    {
        //
    }

    public function destroy(Domain $domain)
    {
        //
    }
}
