@extends('layouts.app')
@section('content')
<div class="container">
 <div class="row justify-content-center">
 <div class="col-md-8">
 <div class="card">
 <div class="card-header">Adopt An Animal</div>
 <div class="card-body">
    @if (session('status'))
    <div class="alert alert-success">
    {{ session('status') }}
    </div>
    @endif
    
     
    <table class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
    <th> Request Status</th><th> Name</th><th> Date Of Birth</th><th> description</th>
    <th> picture </th><th> Availability</th>
    </tr>
    </thead>
 <tbody>
 @foreach($animals as $animal)
 <tr>
 <td> 
 <?php 
   $requeststatus=false;
   ?> 
 @foreach($requests as $request)
 
 @if($request->animalid === $animal->id)
 <?php 
   $requeststatus=true;
   ?>    
         @if($request->pending === 1)
         <strong>Pending</strong>
         @break
         
         @elseif($request->denied === 1)
         <strong>denied</strong>
         @break

         @elseif($request->adopted === 1)
         
         <strong>Adopted</strong>
         
<?php 
if(Auth::user()->role === 1){
   
   foreach($users as $user){
      if($request->userid === $user->id){

         echo "by <br>". $user->name;
         }
   }
  
}


?>

         @break

         @endif
 @else
 
    

 @endif

 @endforeach
 
 @if($animal->Availability === 0 && $requeststatus === false)
         
         <form action="{{route('sendrequest')}}" method="POST">
         @csrf
         <input type="hidden" name="userid" value="{{Auth::user()->id}}">
         <input type="hidden" name="animalid" value="{{$animal->id}}">
         <button class="btn btn-block btn primary" name="status" type="submit" value="approve">send request</button>
   @elseif($animal->Availability === 1 && $requeststatus=== false)
   <strong>Adopted by another user</strong>   

   

   @endif
 
  </td>
 <td> {{$animal->name}} </td>
 <td> {{$animal->DOB }} </td>
 <td> {{$animal->Description }} </td>
 <td> <img style="max-width: 10rem"src ="{{ asset('/storage/images/'. $animal->image)}}"/></td>
 <td> <?php 
 
 if($animal->Availability === 1){

echo 'unavailable';

 }else{

   echo 'available';
   
    }
 
 
 
 ?></td>
 


 </tr>
 @endforeach
 </tbody>
    </table>
    
    </div>
    </div>
    </div>
    </div>
   </div>



   @endsection
