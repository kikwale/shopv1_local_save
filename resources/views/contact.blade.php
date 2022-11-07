@extends('layouts.app')

@section('content')
    
<div id="banner-area" class="banner-area" style="background-image:url(dist/img/banner3.jpg)">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">Contact</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="/"></a></li>
                        <li class="breadcrumb-item active" aria-current="page"></li>
                      </ol>
                  </nav>
                </div>
            </div><!-- Col end -->
          </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Banner text end -->
  </div><!-- Banner area end --> 
  <br><br>
  <section id="main-container" class="main-container">
    <div class="container">
  
      <div class="row text-center">
        <div class="col-12">
          <h2 class="section-title">Reaching our Office</h2>
          <h3 class="section-sub-title">Find Our Location</h3>
        </div>
      </div>
      <!--/ Title row end -->
  
      <div class="row">
        <div class="col-md-4">
          <div class="ts-service-box-bg text-center h-100" style="background-color: #006837">
            <span class="ts-service-icon icon-round"><br>
              <i class="fas fa-map-marker-alt mr-0"></i>
            </span>
            <div class="ts-service-box-content">
              <h4>Visit Our Office</h4>
              <p>Mikwambe Kigamboni</p>
            </div>
          </div>
        </div><!-- Col 1 end -->
  
        <div class="col-md-4">
         <a href="mailto:info@shotram.com" class="text-white">
          <div class="ts-service-box-bg text-center h-100" style="background-color: #006837">
            <span class="ts-service-icon icon-round"><br>
              <i class="fa fa-envelope mr-0"></i>
            </span>
            <div class="ts-service-box-content">
              <h4>Email Us</h4>
              <p>info@shotram.com</p>
            </div>
          </div>
        </a>
        </div><!-- Col 2 end -->
  
        <div class="col-md-4">
         <a href="tel:+255782776467"  class="text-white">
          <div class="ts-service-box-bg text-center h-100" style="background-color: #006837">
            <span class="ts-service-icon icon-round"><br>
              <i class="fa fa-phone-square mr-0"></i>
            </span>
            <div class="ts-service-box-content">
              <h4>Call Us</h4>
              <p>+255782776467</p>
            </div>
          </div>
        </a>
        </div><!-- Col 3 end -->
  
      </div><!-- 1st row end -->
  
      {{-- <div class="gap-60"></div>
  
      <div class="google-map">
        <div id="map" class="map" data-latitude="40.712776" data-longitude="-74.005974" data-marker="images/marker.png" data-marker-name="Constra"></div>
      </div>---}}
  
      <div class="gap-40"></div>
   <br>
    
    </div><!-- Conatiner end -->
  </section><!-- Main container end -->

@endsection