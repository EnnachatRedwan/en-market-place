<?php

namespace App\Http\Controllers;

use App\Models\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GoodController extends Controller
{
    //index page
    public function index(){
        return view('goods.index',['goods'=>Good::latest()->simplePaginate(12)]);
    }

    public function show(Good $good){
        return view('goods.show',['good'=>$good]);
    }

    public function create(){
        return view('goods.create');
    }

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
            $formFields['image'] = $request->file('image')->store('Goods_images','public');
        }

        Good::create($formFields);

        return redirect()->route('home');
    }

    public function edit(Good $good){
        return view('goods.edit',['good'=>$good]);
    }

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
            $formFields['image'] = $request->file('image')->store('Goods_images','public');
        }

        $good->update($formFields);

        return redirect()->back();
    }
}
