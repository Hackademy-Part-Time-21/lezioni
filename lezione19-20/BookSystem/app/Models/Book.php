<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title','cover','genre',
    'description','author_id'];

    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function users(){
        return $this->belongsToMany(User::class)->withPivot('start_date','end_date');
    }


}
