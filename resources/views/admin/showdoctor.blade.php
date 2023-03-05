
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
        <div class="container mt-5 ">

        <div class="col-10">
 <table class="table  text-light ">
    <thead>
      <tr >
        <th>Doctor name</th>
        <th>Phone</th>
        <th>Speciality</th>
        <th>Room No</th>
        <th>Image</th>
        <th>Delete</th>
        <th>Update</th>

      </tr>
    </thead>


    <tbody>
    @foreach($doctor as $row)
      <tr>
        <td>{{$row->name}}</td>
        <td>{{$row->phone}}</td>
        <td>{{$row->speciality}}</td>
        <td>{{$row->room}}</td>

       <td><img  height='100' src="{{asset('storage/image/'.$row->image)}}"  alt="Doctor image"></td>

       <td><button type="button" class="btn btn-warning "><a href="{{route('edit_doctor',encrypt($row->id))}}"
        class="text-decoration-none text-light" >Edit</a></button></td>
        <td><button type="button" class="btn btn-danger"  onclick="return confirm('Are you sure to delete this record?')">
        <a href="{{route ('delete_doctor',encrypt($row->id))}}"class="text-decoration-none  text-light" >Delete</a></button></td>

     </tr>
      @endforeach
      </tbody>

</table>
</div>
</div>
</div>

    <!-- plugins:js -->
    @include('admin.script')

    <!-- End custom js for this page -->
  </body>
</html>
