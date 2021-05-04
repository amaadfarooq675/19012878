@extends('layouts.app')
@section('content')
<div class="container">
 <div class="row justify-content-center">
 <div class="col-md-8">
 <div class="card">
 <div class="card-header">My Animals/Requests</div>
 <div class="card-body">
    @if (session('status'))
    <div class="alert alert-success">
    {{ session('status') }}
    </div>
    @endif
    
   
   
    <table class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
    <th> Name</th><th> Date Of Birth</th><th> description</th>
    <th> picture </th>
    </tr>
    </thead>
 <tbody>
 @foreach($animals as $animal)
 <tr>
 <td> {{$animal->name}} </td>
 <td> {{$animal->DOB }} </td>
 <td> {{$animal->Description }} </td>
 <td> {{$animal->image }} </td>
 

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
