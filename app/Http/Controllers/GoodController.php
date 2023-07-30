<?php

namespace App\Http\Controllers;

use App\Models\Good;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    //index page
    public function index(){
        return view('goods.index',['goods'=>Good::latest()->get()]);
    }
}
