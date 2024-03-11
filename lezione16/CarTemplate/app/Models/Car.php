<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'model', 'description', 'kw', 'price','color','brand_id'];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function extras(){
        return $this->belongsToMany(Extra::class);
    }

}
