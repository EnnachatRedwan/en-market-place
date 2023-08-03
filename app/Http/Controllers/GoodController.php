<?php

namespace App\Http\Controllers;

use App\Models\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class GoodController extends Controller
{
    //index page
    public function index(){
        return view('goods.index',['goods'=>Good::latest()->simplePaginate(12)]);
    }

    //show good details page
    public function show(Good $good){
        return view('goods.show',['good'=>$good]);
    }

    //create good form
    public function create(){
        return view('goods.create');
    }

    //create and store good item
    public function store(Request $request){
        $formFields = $request->validate([
            'title'=>'required',
            'price'=>['required','numeric','min:1','max:1000000'],
            'seller_email'=>['nullable','email'],
            'seller_phone_number'=>'nullable|regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/',
            'location'=>'required',
            'description'=>'required'
        ]);


        if($request->hasFile('image')){
            // $formFields['image'] = $request->file('image')->store('Goods_images','public');


            // Get the uploaded image
            $uploadedImage = $request->file('image');

            // Generate a unique filename for the image
            $filename = uniqid() . '.jpg'; // Use the .jpg extension for JPEG format

            // Save the uploaded image temporarily
            $uploadedImage->storeAs('temporary_images', $filename, 'public');

            // Open the uploaded image with Intervention Image
            $image = Image::make(public_path('storage/temporary_images/' . $filename));

            // Convert the image to JPEG and set a higher quality (optional)
            $image->encode('jpg');

            // Store the converted image
            $image->save(public_path('storage/Goods_images/' . $filename));

            // Delete the temporary image
            unlink(public_path('storage/temporary_images/' . $filename));

            // Set the image path in the formFields array
            $formFields['image'] = 'Goods_images/' . $filename;

        }

        Good::create($formFields);

        return redirect()->route('home');
    }

    //edit good item form page
    public function edit(Good $good){
        return view('goods.edit',['good'=>$good]);
    }

    //edit existing good item
    public function update(Request $request,Good $good){

        $formFields = $request->validate([
            'title'=>'required',
            'price'=>['required','numeric','min:1','max:1000000'],
            'seller_email'=>['nullable','email'],
            'seller_phone_number'=>'nullable|regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/',
            'location'=>'required',
            'description'=>'required'
        ]);


        if($request->hasFile('image')){
            // $formFields['image'] = $request->file('image')->store('Goods_images','public');

            // Get the uploaded image
            $uploadedImage = $request->file('image');

            // Generate a unique filename for the image
            $filename = uniqid() . '.jpg'; // Use the .jpg extension for JPEG format

            // Save the uploaded image temporarily
            $uploadedImage->storeAs('temporary_images', $filename, 'public');

            // Open the uploaded image with Intervention Image
            $image = Image::make(public_path('storage/temporary_images/' . $filename));

            // Convert the image to JPEG and set a higher quality (optional)
            $image->encode('jpg');

            // Store the converted image
            $image->save(public_path('storage/Goods_images/' . $filename));

            // Delete the temporary image
            unlink(public_path('storage/temporary_images/' . $filename));

            // Set the image path in the formFields array
            $formFields['image'] = 'Goods_images/' . $filename;
        }

        $good->update($formFields);

        return redirect()->back();
    }

    //delete a good item
    public function delete(Good $good){
        $good->delete();
        return redirect()->route('home')->with('message','Good deteleted successfully');
    }
}
