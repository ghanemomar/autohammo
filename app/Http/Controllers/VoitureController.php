<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class VoitureController extends Controller
{

    public function index()
    { if(!Auth::check()){
        return redirect()->route('login');
    }else{
        if (Auth()->user()->is_admin == 1) {
            $voitures = Voiture::all();
            return view('voiture.index', compact('voitures'));
        }else{
            return redirect()->route('home');
        }
    }

    }

    public function create()
    {
        if (Auth()->user()->is_admin == 1) {
        $cats = Category::latest()->get();
        return view('voiture.create_voiture', compact('cats'));
        }else{
            return redirect()->route('home');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:40',
            'description' => 'required|min:3|max:500',
            'price' => 'required|numeric',
            'image' => 'required|mimes:png,jpeg,png'
        ]);

        // make the name of the picture as a number an resize it
        if ($request->file('image')) {
            $manager = new ImageManager(new Driver());
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(300, 300);
            $img->save("upload/voiture/" . $name_gen);
            $save_url = "upload/voiture/" . $name_gen;
        }

        //    insert the data in Voiture table
        Voiture::insert([
            'category' => $request->category,
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "image" => $save_url,
        ]);

        $notification = array(
            'message_id' => 'Ajouter avec succès',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function edit( $id){
        $voiture = Voiture::find($id);
        $cats = Category::latest()->get();
        return view('voiture.edit',compact('voiture',"cats"));
    }

    public function update(Request $request,$id){
        $old_img = $request->old_image;
        if($request->file('image')){
            unlink($old_img);
            $manager = new ImageManager(new Driver());
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(300, 300);
            $img->save("upload/voiture/" . $name_gen);
            $save_url = "upload/voiture/" . $name_gen;

            Voiture::findOrFail($id)->update([
                'category' => $request->category,
                "name" => $request->name,
                "description" => $request->description,
                "price" => $request->price,
                "image" => $save_url,
            ]);
            return redirect()->route('voiture.index')->with('message',"voiture modifier avec succeès");
        }else{
            Voiture::findOrFail($id)->update([
                'category' => $request->category,
                "name" => $request->name,
                "description" => $request->description,
                "price" => $request->price,
            ]);
            return redirect()->route('voiture.index')->with('message',"voiture modifier avec succeès");
        }
    }

    public function show_details($id){
        if(!Auth::check()){
            return redirect()->route('login');
        }else{
            if (Auth()->user()->is_admin == 1) {
                return redirect()->route('home');
            }
            else{ $voiture = Voiture::findOrFail($id);
        return view('voiture.voiture_details',compact('voiture'));
    }
    }

    }

    public function delete($id){
        Voiture::findOrFail($id)->delete();
        return redirect()->route('voiture.index')->with('message',"voiture supprimer avec succès");
    }

}


