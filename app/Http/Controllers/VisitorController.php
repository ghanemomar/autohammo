<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class visitorController extends Controller
{

    public function index(Request $request)
    {
        if (Auth::check()){
            if (Auth()->user()->is_admin == 1 ) {
                return redirect()->route('voiture.index');
            }
        }
        else{
            $cats = Category::all();
            if (!$request->category) {
                $cat1 = "la page d'accueil";
                $voitures = Voiture::all();

                return view('visitorPage', compact('cats', 'voitures', "cat1"));
            } else {
                $cat1 = $request->category;
                $voitures = Voiture::where('category', $request->category)->get();

                return view('visitorPage', compact('cats', 'voitures', 'cat1'));
            }
        }
    }

    }

