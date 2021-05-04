@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Manage Requests') }}</div>

                <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
    <th> AnimalID</th><th> username</th><th> status</th>
    </tr>
    </thead>
 <tbody>
 
 @foreach($myrequests as $request)
 <tr>
 <td> @foreach($animals as $animal)
<?php 

if($request->animalid === $animal->id){

echo $animal->name;
}
?>

@endforeach </td>
 <td> @foreach($users as $user)
<?php 

if($request->userid === $user->id){

echo $user->name;
}

?>

@endforeach


 </td>
 <td>  
 
  @if($request->pending === 1)
 <strong>Pending</strong>
 <form action="{{route('ModifierRequest')}}" method="POST">
 @csrf
  <input type="hidden" name="userid" value="{{$request->userid}}">
  <input type="hidden" name="animalid" value="{{$request->animalid}}">
  <button name="status" type="submit" value="approve">approve</button>
  <button name="status" type="submit" value="deny">deny</button>

</form>

 @elseif($request->denied === 1)
 <strong>denied</strong>
 
 
 @elseif($request->adopted === 1)
 <strong>Adopted</strong>
 
 
 
 @endif
 </td>
 




                   </tbody>
                   @endforeach
                   </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
