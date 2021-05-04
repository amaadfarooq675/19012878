<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\animals;
use App\Models\Myrequest;
use App\Models\User; 
use Gate;


class adoptController extends Controller
{
    public function adoptanimal(){
    
        $animalquery = animals::all();
        $queryrequest = Myrequest::all();
       
       //abort action if you are not an admin
       if (Gate::denies('displayall')) {
        $queryrequest = $queryrequest->where('userid',auth()->user()->id);
        }
       
        
        $userrequest = User::all(); 
        return view('adopt', array('animals'=>$animalquery,'requests'=>$queryrequest, 'users'=>$userrequest));
    }

}
