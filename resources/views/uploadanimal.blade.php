@extends('layouts.app')
@section('content')
<div class="container">
 <div class="row justify-content-center">
 <div class="col-md-8">
 <div class="card">
 <div class="card-header">upload An Animal</div>
 <div class="card-body">
    @if (session('status'))
    <div class="alert alert-success">
    {{ session('status') }}
    </div>
    @endif
    
    </thead>
    <body>
    <body>
<div class="container">
  <div class="row" style="margin-top:45px">
    
   <div class="col-nd-4 col-nd-offset-4">
<form action="{{route('uploadanimal')}}" method="POST" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label for="">Date Of Birth</label>
    <input type="date" class="form-control" name="date" placeholder="date">
  </div>
  <div class="form-action">
    <label for="description">Description</label>
    <br>
   
    <textarea name="comment" maxlength="250" placeholder="Enter description 250 char max..."></textarea>
    </div>
    <br>

    <div class="col-md-8">
<label>Image</label>
<input type="file" name="image"
placeholder="Image file" />
</div>

<br>
  <div class="form-group">
  <button type="submit" class="btn btn-block btn primary">Submit</button>
  </div>
  <br>
  <a href="uploadanimal">Upload a new animal</a>


</form>
</div>
</div>
</div>
</body>
    
    
    <!-- </body>
    
    </div>
    </div>
    </div>
    </div>
   </div> -->



   @endsection