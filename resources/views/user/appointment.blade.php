

<div class="page-section">
    @if (session()->has('message'))
        <div class='alert alert-success'>
    {{session()->get('message')}}
      <div>
    @endif
        <div class="container">

    <br>

          <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

          <form action="{{route('createappointment')}}" method="post" >
    @csrf
            <div class="row mt-5 ">
              <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                <input type="text" class="form-control" placeholder="Full name" id="name" name="name">
              </div>
              @error('name')
                <p class="text-danger">{{$message}}</p>
               @enderror

              <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                <input type="text" class="form-control" placeholder="Email address.." id="email" name="email">
               </div>

              @error('email')
                <p class="text-danger">{{$message}}</p>
               @enderror

               <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                <input type="text" class="form-control" placeholder="Number.." id="phone" name="phone">
              </div>
              @error('phone')
                <p class="text-danger">{{$message}}</p>
              @enderror

              <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                <select name="doctor" id="doctor" class="custom-select">
                <option>--select doctor--</option>
                @foreach($doctor as $row)
               <option value='{{$row->name}}'>{{$row->name}}-{{$row->speciality}}</option>
               @endforeach
                </select>
              </div>
              @error('doctor')
                <p class="text-danger">{{$message}}</p>
              @enderror

              <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                <input type="date" class="form-control" id="date" name="date">
              @error('date')
                <p class="text-danger">{{$message}}</p>
              @enderror
              </div>

              <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                <textarea name="message" id="message" class="form-control" rows="4" placeholder="Enter message.."></textarea>
              </div>
              @error('message')
                <p class="text-danger">{{$message}}</p>
               @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3  zoomIn">Submit Request</button>
          </form>
        </div>
      </div>
<br>
      {{-- <select name="departement" id="departement" class="custom-select">
        <option value="general">General Health</option>
        <option value="cardiology">Cardiology</option>
        <option value="dental">Dental</option>
        <option value="neurology">Neurology</option>
        <option value="orthopaedics">Orthopaedics</option>
      </select> --}}
