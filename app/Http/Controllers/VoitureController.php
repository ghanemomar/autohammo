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
    {
        if (Auth()->user()->is_admin == 1) {
            $voitures = Voiture::all();
            $numberOfVoiture = Voiture::count();
            $numberOfCategory = Category::count();
            return view('voiture.index', compact('voitures','numberOfVoiture','numberOfCategory'));
        }else{
            return redirect()->route('home');
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
            'image1' => 'required|mimes:png,jpeg,png',
            'image2' => 'required|mimes:png,jpeg,png',
            'image3' => 'required|mimes:png,jpeg,png',
            'image4' => 'required|mimes:png,jpeg,png'
        ]);

        // make the name of the picture as a number an resize it
        if ($request->file('image1')) {
            $manager1 = new ImageManager(new Driver());
            $image1 = $request->file('image1');
            $name_gen1= hexdec(uniqid()) . '.' . $image1->getClientOriginalExtension();
            $img1 = $manager1->read($image1);
            $img1 = $img1->resize(500, 500);
            $img1->save("upload/voiture/" . $name_gen1);
            $save_url1 = "upload/voiture/" . $name_gen1;
        }

        if ($request->file('image2')) {
            $manager2 = new ImageManager(new Driver());
            $image2 = $request->file('image2');
            $name_gen2 = hexdec(uniqid()) . '.' . $image2->getClientOriginalExtension();
            $img2 = $manager2->read($image2);
            $img2 = $img2->resize(500, 500);
            $img2->save("upload/voiture/" . $name_gen2);
            $save_url2 = "upload/voiture/" . $name_gen2;
        }
        if ($request->file('image3')) {
            $manager3 = new ImageManager(new Driver());
            $image3 = $request->file('image1');
            $name_gen3= hexdec(uniqid()) . '.' . $image3->getClientOriginalExtension();
            $img3 = $manager3->read($image3);
            $img3 = $img3->resize(500, 500);
            $img3->save("upload/voiture/" . $name_gen3);
            $save_url3 = "upload/voiture/" . $name_gen3;
        }

        if ($request->file('image4')) {
            $manager4 = new ImageManager(new Driver());
            $image4 = $request->file('image4');
            $name_gen4 = hexdec(uniqid()) . '.' . $image4->getClientOriginalExtension();
            $img4 = $manager4->read($image4);
            $img4 = $img4->resize(500, 500);
            $img4->save("upload/voiture/" . $name_gen4);
            $save_url4 = "upload/voiture/" . $name_gen4;
        }

        //    insert the data in Voiture table
        Voiture::insert([
            'category' => $request->category,
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "image1" => $save_url1,
            "image2" => $save_url2,
            "image3" => $save_url3,
            "image4" => $save_url4,
        ]);

        $notification = array(
            'message_id' => 'Ajouter avec succès',
            'alert-type' => 'success'
        );

        return redirect()->back();
    }

    public function edit( $id){
        $voiture = Voiture::find($id);
        $cats = Category::latest()->get();
        return view('voiture.edit',compact('voiture',"cats"));
    }

    public function update(Request $request,$id){
        $old_img1 = $request->old_image1;
        if($request->file('image1')){
            unlink($old_img1);
            $manager1 = new ImageManager(new Driver());
            $image1 = $request->file('image1');
            $name_gen1= hexdec(uniqid()) . '.' . $image1->getClientOriginalExtension();
            $img1 = $manager1->read($image1);
            $img1 = $img1->resize(500, 500);
            $img1->save("upload/voiture/" . $name_gen1);
            $save_url1 = "upload/voiture/" . $name_gen1;

            Voiture::findOrFail($id)->update([
                'category' => $request->category,
                "name" => $request->name,
                "description" => $request->description,
                "price" => $request->price,
                "image1" => $save_url1,
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

            if (Auth()->user()) {
                return redirect()->route('home');
            }
            else{ $voiture = Voiture::findOrFail($id);
        return view('voiture.voiture_details',compact('voiture'));

    }

    }

    public function delete($id){
        Voiture::findOrFail($id)->delete();
        return redirect()->route('voiture.index')->with('message',"voiture supprimer avec succès");
    }

}


