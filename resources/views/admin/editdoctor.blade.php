

<!DOCTYPE html>
<html lang="en">
  <head>
  <base href ="/public">

  @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">


      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')

        <!-- partial -->
<div class="container-fluid page-body-wrapper">
<div class="container fs-4 ">

<br>

<div class="row ">
<br>
<br>

<div class="col-8  text-light">
<br>

<form action="{{route('updatedoctor',encrypt($doctor->id))}}" method="post" enctype="multipart/form-data">

@csrf
  <div class="form-group">
    <label for="name">Doctor name:</label>
    <input type="text" class="form-control text-dark" id="name" name="name" value="{{$doctor->name}}" >
  </div>
  @error('name')
            <p class="text-danger">{{$message}}</p>
   @enderror
  <div class="form-group">
    <label for="phone">Phone:</label>
    <input type="number" class="form-control  text-dark" id="phone"  name="phone"  value="{{$doctor->phone}}">
  </div>
  @error('phone')
  <p class="text-danger">{{$message}}</p>
        @enderror
  <div class="form-group">
    <label for="speciality">Speciality:</label>
    <select class="form-select" name="speciality" >
      <option value="{{$doctor->speciality}}" > {{$doctor->speciality}}</option>
      <option value="skin">skin</option>
      <option value="lungs">lungs</option>
      <option value="heart">heart</option>
      <option value="eye">eye</option>

</select>
  </div>
  @error('speciality')
  <p class="text-danger">{{$message}}</p>
        @enderror
  <div class="form-group">
    <label for="roomno">Room no:</label>
    <input type="number" class="form-control  text-dark" id="roomno"  name="room" value="{{$doctor->room}}" >
  </div>
  @error('room')
  <p class="text-danger">{{$message}}</p>
        @enderror
  <div class="form-group">
    <label for="drimage">Dr image:</label>

    <img  height='80' src="{{asset('storage/image/'.$doctor->image)}}"  alt="Doctor image">
  </div>

    <div class="form-group">
    <label for="drimage">Change dr image:</label>
    <input type="file" class="form-control" id="drimage"  name="image" value="{{$doctor->image}}">
  </div>
  @error('image')
  <p class="text-danger">{{$message}}</p>
        @enderror

  <div class="form-group">
           <button type="submit" class="btn btn-primary"> Update Doctor</button>

        </div>
</form>
</div></div></div>
</div> <!-- plugins:js -->
    @include('admin.script')

    <!-- End custom js for this page -->
  </body>
</html>
