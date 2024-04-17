<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Voiture;
use Illuminate\Http\Request;

class visitorController extends Controller
{

    public function index(Request $request)
    {
        if (Auth()->user()) {
            return redirect()->route('home');
        }else{
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

