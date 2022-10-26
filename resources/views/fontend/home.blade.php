@extends('master_home')


@section('master_home')
    
@php
    $abouts=DB::table('abouts')->get();
@endphp
<section class="section2">
      <div class="section-title text-center" id="aboutus">
        <h2>About Us</h2>
      </div>
            <div class="container mt-4">
        
              <div class="card mb-3 p-3" style="max-width: 1200px; height: 320px;">
                <div class="row g-0">
                @foreach ($abouts as $key => $about)
                  <div class="col-md-4">
                    <img src="{{$about->image}}" class="img-fluid rounded-start mt-2" style="height: 265px;" alt="...">
                  </div>
                  
                  <div class="col-md-8" style=" height: 200px;">
                    <div class="card-body">
                      <h5 class="card-title">{{$about->title}}</h5>
                      <p class="card-text">{{$about->description}}</p>
                      
                    </div>
                    @endforeach
                  </div>
                  <a href="https://yomovies.fyi/most-favorites/" class="text-muted text-end" style="text-decoration:none ;">View more »</a>
                </div>
              </div>
              <div>
        
            </div>
          
    </section>








    <section class="section3">
      <div class="section-title text-center" id="service">
        <h2>Our Service</h2>
      </div>
        <div class="container mt-4">
    
        @php
        $services=DB::table('services')->get();
        @endphp
          <div class="card-group mb-3 p-3">
          @foreach ($services as $key => $service)
            <div class="card">
              <img src="{{$service->img}}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{$service->title}}</h5>
                <p class="card-text">{{$service->description}}</p>
              </div>
              
            
          </div>
          @endforeach
          <div>
    
        </div>
      
</section>


<section class="section4">
  <div class="section-title text-center" id="service">
    <h2>Donate</h2>
  </div>
  <div class="container p-4">

  @php
    $donates=DB::table('donates')->get();
@endphp
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
        @foreach ($donates as $key => $donate)
          <div class="card-body">
            <h5 class="card-title">{{$donate->title}}</h5>
            <p class="card-text">{{$donate->description}}</p>
           
          </div>
          @endforeach
        </div>
      </div>
      
    </div>
    <div>

  </div>

</section>

  
  
    @endsection