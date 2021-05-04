<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\animals;

class MyAnimalController extends Controller
{
   public function myanimals(){
    
    $animalquery = animals::all();
    
    
    
    
    return view ('myanimal', array('animals'=>$animalquery));


   }



}
