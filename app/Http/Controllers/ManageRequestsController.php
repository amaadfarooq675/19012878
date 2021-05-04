<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Myrequest;
use App\Models\animals;
use App\Models\User; 
class ManageRequestsController extends Controller
{
  public function ManageRequest(){
    $requestquery = Myrequest::all();
    $userquery = User::all();
    $animalquery = animals::all();
    return view('managerequests', array('myrequests'=>$requestquery, 'users'=>$userquery, 'animals'=>$animalquery));
      
  }
  
 
  public function ModifierRequest(Request $request){
    $animalquery = animals::all();
    $animlquery = $animalquery->where('id',$request->animalid);
    if ($request->status === "approve") {
     
      Myrequest::where('animalid',$request->animalid)->update(array(
        'pending'=>0,
        'denied'=>1,
    ));

      Myrequest::where('userid', $request->userid)->where('animalid', $request->animalid)->update(array(
        'pending'=>0,
        'adopted'=>1,
        'denied' =>0,
      ));  

      animals::where('id', $request->animalid)->update(array(
        'Availability'=>1,
       
      ));  
     
      
    }
    elseif($request->status==="deny") {
      Myrequest::where('userid', $request->userid)->where('animalid', $request->animalid)->update(array(
        'pending'=>0,
        'denied'=>1,
      )); 
 
    }
    return back()
    ->with('success', 'You have sucessfuly approvced a new animal');
    



  }
  public function sendrequests(Request $request){

   
   /* Store animal into DATABASE */
    $requestModel = new Myrequest;


    $requestModel->userid = strip_tags($request->userid);
   
    $requestModel->animalid = strip_tags($request->animalid);
    $requestModel->pending = 1;
    $requestModel->adopted = 0;
    $requestModel->denied = 0;
    $requestModel->save();

    return back()
        ->with('success', 'You have sucessfuly uploaded a new animal');
       
}
}
