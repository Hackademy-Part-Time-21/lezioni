<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','description'];


    public function articles(){
        //return $this->hasMany(Article::class); // solo per relazione 1 a N
        return $this->belongsToMany(Article::class); // solo per relazione N a N
    }
}
