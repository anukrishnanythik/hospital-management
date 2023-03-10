<div class="page-section">
    <div class="container" id="doctor">
      <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">


        @foreach($doctor as $row)
        <div class="item">

          <div class="card-doctor">
            <div class="header">
            <img src="{{asset('storage/image/'.$row->image)}}" alt="">

              <div class="meta">
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">{{$row->name}}</p>
              <span class="text-sm text-grey">{{$row->speciality}}</span>
            </div>
          </div>
          </div>

          @endforeach



      </div>
    </div>
  </div>
