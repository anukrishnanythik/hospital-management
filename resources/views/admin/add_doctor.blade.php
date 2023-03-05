
<!DOCTYPE html>
<html lang="en">
  <head>
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
@if (session()->has('message'))
<p>{{session()->get('message')}}</p>
@endif
<br>

<div class="row ">
<br>
<br>

<div class="col-8  text-light">
<br>


<form action="{{route('createdoctor')}}" method="post" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="name">Doctor name:</label>
    <input type="text" class="form-control" id="name" name="name" >
  </div>
  @error('name')
            <p class="text-danger">{{$message}}</p>
   @enderror
  <div class="form-group">
    <label for="phone">Phone:</label>
    <input type="number" class="form-control" id="phone"  name="phone" >
  </div>
  @error('phone')
  <p class="text-danger">{{$message}}</p>
        @enderror
  <div class="form-group">
    <label for="speciality">Speciality:</label>
    <select class="form-select" name="speciality" >
      <option>--select--</option>
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
    <input type="number" class="form-control" id="roomno"  name="room" >
  </div>
  @error('room')
  <p class="text-danger">{{$message}}</p>
        @enderror
  <div class="form-group">
    <label for="drimage">Dr image:</label>
    <input type="file" class="form-control" id="drimage"  name="image">
  </div>
  @error('image')
  <p class="text-danger">{{$message}}</p>
        @enderror
  <br>
  <div class="form-group">
           <button type="submit" class="btn btn-primary"> Add Doctor</button>

        </div>
</form>
</div></div></div>
</div> <!-- plugins:js -->
    @include('admin.script')

    <!-- End custom js for this page -->
  </body>
</html>
