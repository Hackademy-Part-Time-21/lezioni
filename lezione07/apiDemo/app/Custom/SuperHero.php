<?php

namespace App\Custom;

class SuperHero{
    public $id;
    public $name;

    public function __construct($id,$name)
    {
        $this->id=$id;
        $this->name=$name;
    }

}