<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Voiture;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $cats = Category::all();

        //admin home page
        if (Auth()->user()->is_admin == 1) {
            $numberOfVoiture = Voiture::count();
            $numberOfCategory = Category::count();
            return view('adminePage', compact("numberOfVoiture","numberOfCategory"));
        } else {
            return redirect()->route('home');
        }}

}
