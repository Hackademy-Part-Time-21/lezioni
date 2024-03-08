<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title','content','user_id'];

    // Solo per relazione 1 a N
    // public function category(){
    //     return $this->belongsTo(Category::class);
    // }

    // Solo per relazione N a N
    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
