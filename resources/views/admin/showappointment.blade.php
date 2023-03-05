
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
        <div class="page-body-wrapper">

            @if (session()->has('message'))
            <p>{{session()->get('message')}}</p>
            @endif

        <div class="me-5 mt-5">

        <table class="table text-light">
    <thead>
      <tr>
        <th>Customer name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Doctor name</th>
        <th>Date</th>
        <th>Message</th>
        <th>Status</th>
        <th>Approved</th>
        <th>Cancelled</th>
        <th>Send mail</th>

      </tr>
    </thead>

    <tbody>


    @foreach($appointment as $row)
      <tr>
      <td>{{$row->name}}</td>
      <td>{{$row->email}}</td>
      <td>{{$row->phone}}</td>
       <td>{{$row->doctor}}</td>
        <td>{{$row->date}}</td>
        <td>{{$row->message}}</td>
        <td>{{$row->status}}</td>
        <td><button type="button" class="btn btn-success"><a href="{{route('approvedappointment',encrypt($row->id))}}"
         class="text-decoration-none  text-light" >Approved</a></button></td>
         <td><button type="button" class="btn btn-danger"><a href="{{route('cancelappointment',encrypt($row->id))}}"
         class="text-decoration-none  text-light" >Canceled</a></button></td>
         <td><button type="button" class="btn btn-primary"><a href="{{route('emailview',encrypt($row->id))}}"
            class="text-decoration-none  text-light" >Send mail</a></button></td>

     </tr>
      @endforeach
        </tbody>

</table>
</div>
</div>
</div>

</div>

    <!-- plugins:js -->
    @include('admin.script')

    <!-- End custom js for this page -->
  </body>
</html>
