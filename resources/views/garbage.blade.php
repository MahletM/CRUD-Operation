<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!--"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"-->
    <title>Smart Garbage</title>
  </head>
  <body>
    @include('navbar')
    @if($layout == 'index')
    <div class="container-fluid">
        <h2 class="text-center alert alert-danger">Garbage Registration Form</h2>
        <div class="row">
            <section class="col">
            @include("garbagelist")
            </section>
            <section class="col"></section>
        </div>
    </div>


    @elseif($layout == 'createg')
  <div class="container-fluid">
      <h2 class="text-center alert alert-danger">Garbage Registration Form</h2>
      <div class="row">
          <section class="col">
              @include("garbagelist")
          </section>
          <section class="col">
<form action="{{ url('/storeg') }}" method="POST">
@csrf
  <div class="form-group">
    <label >ID Number</label>
    <input name="reg" type="text" class="form-control"  placeholder="Enter ID Number">
  </div>

  <div class="form-group">
    <label >Latitude</label>
    <input name="latitude"  type="text" class="form-control"  placeholder="Enter  Latitude">
  </div>

  <div class="form-group">
    <label >Longtiude</label>
    <input name="longtiude"  type="text" class="form-control"  placeholder="Enter Longtiude">
  </div>
  <!--level-->
  <div class="form-group">
    <label >Level</label>
    <input name="level"  type="text" class="form-control"  placeholder="Enter Level">
  </div>

  

  
  <button type="submit" class="btn btn-info mb-2">Register</button>

</form>
          </section>
      </div>
  </div>


  @elseif($layout == 'showg')
  <div class="container-fluid">
      <h2 class="text-center alert alert-danger">Garbage Registration Form</h2>
      <div class="row">
          <section class="col">
          @include("garbagelist")
          </section>
          <section class="col">
          <h6 class="text-center alert alert-info">Garbage Information</h6>
          <form action="" method="POST">
@csrf
  <div class="form-group">
    <label >ID Number</label>
    <input value="{{ $garbage->reg }}" name="reg" type="text" class="form-control"  placeholder="Enter ID Number" readonly="">
  </div>

  <div class="form-group">
    <label >Latitude</label>
    <input value="{{ $garbage->latitude }}" name="latitude"  type="text" class="form-control"  placeholder="Enter  Latitude" readonly="">
  </div>

  <div class="form-group">
    <label >Longtiude</label>
    <input value="{{ $garbage->longtiude }}" name="longtiude"  type="text" class="form-control"  placeholder="Enter  Longtiude" readonly="">
  </div>
  <!--level-->
  <div class="form-group">
    <label >Level</label>
    <input value="{{ $garbage->level }}" name="level"  type="text" class="form-control"  placeholder="Enter  Level" readonly="">
  </div>

 
</form>
          </section>
      </div>
  </div>
  @elseif($layout == 'editg')
  <div class="container-fluid">
      <h2 class="text-center alert alert-danger">Garbage Registration Form</h2>
      <div class="row">
          <section class="col">
          @include("garbagelist")
          </section>
          <section class="col">
<form action="{{ url('/updateg/'.$garbage->id)}}" method="POST">
@csrf
  <div class="form-group">
    <label >ID Number</label>
    <input value="{{ $garbage->reg }}" name="reg" type="text" class="form-control"  placeholder="Enter ID Number" >
  </div>

  <div class="form-group">
    <label >Latitude</label>
    <input value="{{ $garbage->latitude }}" name="latitude"  type="text" class="form-control"  placeholder="Enter  Latitude" >
  </div>

  <div class="form-group">
    <label >Longtiude</label>
    <input value="{{ $garbage->longtiude }}" name="longtiude"  type="text" class="form-control"  placeholder="Enter Longtiude" >
  </div>

  <!--level-->
  <div class="form-group">
    <label >Level</label>
    <input value="{{ $garbage->level }}" name="level"  type="text" class="form-control"  placeholder="Enter Level" >
  </div>

  
  <button type="submit" class="btn btn-success mb-2">Update</button>

</form>
          </section>
      </div>
  </div>
  @endif


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

