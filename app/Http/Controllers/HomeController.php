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
        $order = Order::orderBy('id', 'DESC')->get();
        //admin home page
        if (Auth()->user()->is_admin == 1) {
            $numberOfUser = User::where('is_admin', 0)->count();
            $numberOfVoiture = Voiture::count();
            $numberOfCategory = Category::count();
            return view('adminePage', compact("order","numberOfUser","numberOfVoiture","numberOfCategory"));
        } else {

            if (!$request->category) {
                $cat1 = "la page d'accueil";
                $voitures = Voiture::all();

                return view('userPage', compact('cats', 'voitures', "cat1"));
            } else {
                $cat1 = $request->category;
                $voitures = Voiture::where('category', $request->category)->get();

                return view('userPage', compact('cats', 'voitures', 'cat1'));
            }
        }
    }
    public function orderstore(Request $request)
    {
        Order::insert([
            'user_id' => Auth()->user()->id,
            'phone' => $request->phone,
            'date' => $request->date,
            'time' => $request->time,
            'voiture_id' => $request->voiture_id,
            'address' => $request->address,
            'status' => 'en attente!!',
        ]);

        $notification = array(
            'message_id' => "Votre commande a été ajoutée",
            'alert-type' => 'success'
        );
        return redirect()->route('home')->with($notification);
    }

    public function show_order()
    {
        $order = Order::where('user_id', Auth::user()->id)->get();
        return view('order.show_order', compact('order'));
    }

    public function changestatus(Request $request, $id)
    {
        $order = Order::find($id);
        Order::where('id', $id)->update(['status' => $request->status]);
        return back();
    }
}
