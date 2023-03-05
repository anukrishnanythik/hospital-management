
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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


<form action="{{route('sendemail',encrypt($appointment->id))}}" method="post">
@csrf
  <div class="form-group">
    <label for="greeting">Greeting:</label>
    <input type="greeting" class="form-control" id="greeting" name="greeting" >
  </div>
  @error('greeting')
            <p class="text-danger">{{$message}}</p>
   @enderror
  <div class="form-group">
    <label for="body">Body:</label>
    <input type="text" class="form-control" id="body"  name="body" >
  </div>
  @error('body')
  <p class="text-danger">{{$message}}</p>
        @enderror


  <div class="form-group">
    <label for="actiontext">Action text:</label>
    <input type="text" class="form-control" id="actiontext"  name="actiontext" >
  </div>
  @error('room')
  <p class="text-danger">{{$message}}</p>
        @enderror

        <div class="form-group">
       <label for="actionurl">Action url:</label>
        <input type="text" class="form-control" id="actionurl"  name="actionurl" >
        </div>
          @error('actionurl')
          <p class="text-danger">{{$message}}</p>
                @enderror

        <div class="form-group">
       <label for="endpart">End part:</label>
        <input type="text" class="form-control" id="endpart"  name="endpart" >
        </div>
          @error('actionurl')
          <p class="text-danger">{{$message}}</p>
                @enderror
  <br>
  <div class="form-group">
           <button type="submit" class="btn btn-primary">Submit</button>

        </div>
</form>
</div></div></div>
</div> <!-- plugins:js -->
    @include('admin.script')

    <!-- End custom js for this page -->
  </body>
</html>
