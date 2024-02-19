<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Custom\SuperHero;

class SuperHeroController extends Controller
{

    public $data;

    public function __construct()
    {
        $this->data = [
            new SuperHero(0,'ironman'),
            new SuperHero(1,'spiderman'),
            new SuperHero(2,'batman'),
        ];
    }

    public function index(){
        return $this->data;
    }

    
    
}
