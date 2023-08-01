<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $fillable=['title','price','image','description','seller_phone_number','seller_email','location'];
    use HasFactory;
}
