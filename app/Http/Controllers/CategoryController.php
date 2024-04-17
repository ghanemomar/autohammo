<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Voiture;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show()
    {
        if (Auth()->user()->is_admin == 1) {
        $cats = Category::all();
        $numberOfUser = User::where('is_admin', 0)->count();
        $numberOfVoiture = Voiture::count();
        $numberOfCategory = Category::count();

        return view("category.CategoryPage", compact('cats','numberOfUser','numberOfVoiture','numberOfCategory'));
        } else {
            return redirect()->route('voiture.index');
        }
    }

    public function store(Request $request)
    {
        $request->validate(['cat_name' => 'required|string|unique:categories|min:3|max:40']);
        Category::insert([
            'cat_name' => $request->cat_name,
            'created_at' => Carbon::now()
        ]);
        return back()->with('message', 'vous avez ajouter une nouvell category avec succès!');
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        return redirect()->route("cat.show")->with('message','suppression avec succès!');
}

    public function update(Request $request)
    { if (Auth()->user()->is_admin == 1) {
        $id=$request->id;
        $request->validate([
            'cat_name' => 'required|string|unique:categories|min:3|max:40',
            ]);

        Category::findOrFail($id)->update([
        'cat_name' => $request->cat_name,
        ]);
        return redirect()->route('cat.show')->with('message', 'modification avec succès! ');

    }else{ return redirect()->route('voiture.index');}
}
}
