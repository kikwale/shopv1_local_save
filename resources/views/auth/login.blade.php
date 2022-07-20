@extends('layouts.app')
<?php
App::setLocale(Session::get('locale'));
?>
     <!-- Preloader -->
     <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="dist/img/shotram.png" alt="SHOTRAM" height="60" width="60">
      </div>

      <div id="banner-area" class="banner-area" style="background-image:url(dist/img/banner3.jpg)">
        <div class="banner-text">
          <div class="container">
              <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                      <img src="dist/img/shotram.png" alt="" srcset=""><br>
                      <nav aria-label="breadcrumb">
                          <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="tel:+255782776467">+255  782 776 467</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="mailto:info@shotram.com">info@shotram.com</a></li>
                           
                          </ol>
                      </nav>
                    </div>
                </div><!-- Col end -->
              </div><!-- Row end -->
          </div><!-- Container end -->
        </div><!-- Banner text end -->
      </div><!-- Banner area end --> 
      
@section('content')
<div class="container" >
     
  <div class="row">

    <div class="col-md-2"></div>
    <div class="col-md-8">
      <h4>ACCOUNT FOR DEMOSTRATION (Demo)</h4>
      <ol>
        <li>Business Owner (Trader)</li>
        <p><b>Email:</b> owner@gmail.com</p>
        <p><b>Password:</b> 123456789</p>
        <li>Seller/Employee</li>
        <p><b>Email:</b> shotramtest@gmail.com</p>
        <p><b>Password:</b>SHOTRAM</p>
      </ol>
    </div>
    <div class="col-md-2"></div>
   
  </div>
   
    <div class="row justify-content-center">
        <div class="col-md-8">
          
           <br>
            <div class="card">
                <div class="card-header" style="background-color:#006699">{{ __('message.login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                     <?php /* $date = '15-12-2016';
                    $nameOfDay = date('l', strtotime($date));
                    echo $nameOfDay; */ ?>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{  __('message.email')  }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('message.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('message.login') }}
                                </button>

                                <a class="btn btn-primary" href="{{ route('register') }}">
                                    {{ __('message.register') }}
                                </a>
                           
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('message.forgot_psw') }}?
                                    </a>
                                @endif

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<br>

<div class="row text-center">
    <div class="col-12">
      
      <h3 class="section-sub-title">Namna ya Kuanza kutumia Mfumo  wa shotram</h3>
    </div>
</div>

<div class="row">
  <div class="col-md-2">

  </div>

  <div class="col-md-8">
    <ol>
      <h1><li>Kufanya  usajili</li></h1>
      <p>Kabla ya Kuingia/login Ndani Mfumo lazima ujisajili.</p>
      <p>Mfumo unaruhusu Mmiliki Duka kujisajili kisha yeye kumsajili Mfanya kazi wake.</p>
      <img src="dist/img/user_guid/shotram2.png" alt="" srcset=""><br>

      <br><h1><li>Thibitisha Email yako</li></h1>
      <p>Baada ya kufanya usajili utaona button ya bluu kama inavyooneka chini, Utabonyeza kisha utafungua email yako.</p>
      <img src="dist/img/user_guid/shotram3.png" alt="" srcset=""><br>

      <br><h1><li>Tengeneza Duka au Pharmacy</li></h1>
      <p>Baada ya Kuingia kwenye email yako Utabonyeza button iliyoandikwa <em class="text-info">verify</em>, kisha utaingia mojakwa maoja ndani ya mfumo. </p>
      <p>Ukishaingia ndani ya mfumo ,Mfumo utakutambua wewe kama Mmiliki wa duka.</p>
      <p>Utatengeneza duka lako kwa kubonyeza kitufe kilichoandikwa <em>Create Shop/Pharmacy</em></p>
      <img src="dist/img/user_guid/shotram4.png" alt="" srcset=""><br>

      <br><h1><li>Ingia Ndani ya  Duka</li></h1>
      <p>Ukisha  tengeneza Duka  au Pharmacy Unaweza ukaendelea kutengeneza Maduka mengine Kuliingana na Idadi Ya Maduka au  Pharmacy ulizonazo</p>
      <p>Baada ya Ketengeneza Duka lako, Utaingia ndani ya Duka au Pharmacy yako Kwa kubonyeza kitufe kilichoandikwa <em class="text-info">Open Door</em></p>
      <img src="dist/img/user_guid/shotram5.png" alt="" srcset=""><br>

      <br><h1><li>Msajili Muuzaji/Mfanyakazi Wa Duka au Pharmacy</li></h1>
      <p>Unapoingia ndani kwanza kabisa msajili "Mtengenezee Accout" Mfanyakazi wa Duka  husika.</p>
      <img src="dist/img/user_guid/shotram6.png" alt="" srcset=""><br>

      <br><h1><li>Jaza  Taarifa za Mfanyakazi wa Duka lako.</li></h1>
      <p>Utabonyeza kitufe kilichoandikwa <em class="text-info">Add Employee</em></p>
      <p><b>Kuzingatia:</b> Mfanyakazi wa Duka husika ataingia ndani ya Mfumo kwa kutumia</p>
      <p><b><em>Email: </em></b> = email ambayo bosi wake amemsajilia.</p>
      <p><b><em>Password: </em></b> = Jina lake la mwisho kwa <em class="text-info">herufi kubwa</em>  ambalo Bosi wake amemsajilia.</p>
      <img src="dist/img/user_guid/shotram8.png" alt="" srcset=""><br>

    
    </ol>
    
</div>

<div class="col-md-2">
      
</div>
</div>

<br>
<div class="row">
    <div class="col-lg-6">
      <div class="ts-intro">
          {{-- <h2 class="into-title">About Us</h2> --}}
          <h3 class="into-sub-title">{{ __('message.choose_us.title') }}</h3>
          <p> {{ __('message.choose_us.description') }}</p>
      </div><!-- Intro box end -->

      <div class="gap-20"></div>

      <div class="row">
          <div class="col-md-12">
            <div class="ts-service-box">
                <span class="ts-service-icon">
                  <i class="fas fa-trophy"></i>
                </span>
                <div class="ts-service-box-content">
                  <h3 class="service-box-title">{{ __('message.choose_us.importance.one') }}</h3>
                </div>
            </div><!-- Service 1 end -->
          </div><!-- col end -->

          
      </div><!-- Content row 1 end -->

      <div class="row">
        <div class="col-md-12">
          <div class="ts-service-box">
              <span class="ts-service-icon">
                <i class="fas fa-sliders-h"></i>
              </span>
              <div class="ts-service-box-content">
                <h3 class="service-box-title">{{ __('message.choose_us.importance.two') }}</h3>
              </div>
          </div><!-- Service 2 end -->
        </div><!-- col end -->
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="ts-service-box">
              <span class="ts-service-icon">
                <i class="fas fa-thumbs-up"></i>
              </span>
              <div class="ts-service-box-content">
                <h3 class="service-box-title">{{ __('message.choose_us.importance.three') }}</h3>
              </div>
          </div><!-- Service 1 end -->
        </div><!-- col end -->

      </div>

      <div class="row">
          
          <div class="col-md-12">
            <div class="ts-service-box">
                <span class="ts-service-icon">
                  <i class="fas fa-users"></i>
                </span>
                <div class="ts-service-box-content">
                  <h3 class="service-box-title">{{ __('message.choose_us.importance.four') }}</h3>
                </div>
            </div><!-- Service 2 end -->
          </div><!-- col end -->
      </div><!-- Content row 1 end -->

      <div class="row">
          
        <div class="col-md-12">
          <div class="ts-service-box">
              <span class="ts-service-icon">
                <i class="fas fa-trophy"></i>
              </span>
              <div class="ts-service-box-content">
                <h3 class="service-box-title">{{ __('message.choose_us.importance.five') }}</h3>
              </div>
          </div><!-- Service 2 end -->
        </div><!-- col end -->
    </div><!-- Content row 1 end -->

    <div class="row">
          
      <div class="col-md-12">
        <div class="ts-service-box">
            <span class="ts-service-icon">
              <i class="fas fa-users"></i>
            </span>
            <div class="ts-service-box-content">
              <h3 class="service-box-title">{{ __('message.choose_us.importance.six') }}</h3>
            </div>
        </div><!-- Service 2 end -->
      </div><!-- col end -->
  </div><!-- Content row 1 end -->

  <div class="row">
          
    <div class="col-md-12">
      <div class="ts-service-box">
          <span class="ts-service-icon">
            <i class="fas fa-sliders-h"></i>
          </span>
          <div class="ts-service-box-content">
            <h3 class="service-box-title">{{ __('message.choose_us.importance.seven') }}</h3>
          </div>
      </div><!-- Service 2 end -->
    </div><!-- col end -->
</div><!-- Content row 1 end -->


<div class="row">
          
  <div class="col-md-12">
    <div class="ts-service-box">
        <span class="ts-service-icon">
          <i class="fas fa-trophy"></i>
        </span>
        <div class="ts-service-box-content">
          <h3 class="service-box-title">{{ __('message.choose_us.importance.eight') }}</h3>
        </div>
    </div><!-- Service 2 end -->
  </div><!-- col end -->
</div><!-- Content row 1 end -->

    </div><!-- Col end -->

    <div class="col-lg-6 mt-4 mt-lg-0">
      <h3 class="into-sub-title">{{ __('message.features.title') }} </h3>
      {{-- <p>We have number of department doing for.</p> --}}

      <div class="accordion accordion-group" id="our-values-accordion">
          <div class="card">
            <div class="card-header p-0 bg-transparent" id="">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left" style="color: rgb(116, 194, 230)" type="button" >
                    1. &nbsp;{{ __('message.features.one') }} 
                  </button>
                </h2>
            </div>
          </div>
          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button"  style="color: rgb(116, 194, 230)" >
                    2. &nbsp;{{ __('message.features.two') }} 
                  </button>
                </h2>
            </div>
            
          </div>
          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" style="color: rgb(116, 194, 230)">
                    3. &nbsp;{{ __('message.features.three') }} 
                  </button>
                </h2>
            </div>
           
          </div>
          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" style="color: rgb(116, 194, 230)">
                    4. &nbsp;{{ __('message.features.four') }} 
                  </button>
                </h2>
            </div>
           
          </div>
          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" style="color: rgb(116, 194, 230)">
                    5. &nbsp;{{ __('message.features.five') }} 
                  </button>
                </h2>
            </div>
           
          </div>

          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" style="color: rgb(116, 194, 230)">
                    6. &nbsp;{{ __('message.features.six') }} 
                  </button>
                </h2>
            </div>
           
          </div>

          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" style="color: rgb(116, 194, 230)">
                    7. &nbsp;{{ __('message.features.seven') }} 
                  </button>
                </h2>
            </div>
           
          </div>

          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" style="color: rgb(116, 194, 230)" aria-expanded="false" aria-controls="collapseThree">
                    8. &nbsp;{{ __('message.features.eight') }} 
                  </button>
                </h2>
            </div>
           
          </div>

          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" style="color: rgb(116, 194, 230)" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    9. &nbsp;{{ __('message.features.nine') }} 
                  </button>
                </h2>
            </div>
           
          </div>


          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" style="color: rgb(116, 194, 230)" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    10. &nbsp;{{ __('message.features.ten') }} 
                  </button>
                </h2>
            </div>
           
          </div>

          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" style="color: rgb(116, 194, 230)" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    11. &nbsp;{{ __('message.features.eleven') }} 
                  </button>
                </h2>
            </div>
           
          </div>

          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" style="color: rgb(116, 194, 230)" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    12. &nbsp;{{ __('message.features.twelve') }} 
                  </button>
                </h2>
            </div>
           
          </div>
          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" style="color: rgb(116, 194, 230)" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    13. &nbsp;{{ __('message.features.thirteen') }} 
                  </button>
                </h2>
            </div>
           
          </div>

          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" style="color: rgb(116, 194, 230)" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    14. &nbsp;{{ __('message.features.fourteen') }} 
                  </button>
                </h2>
            </div>
           
          </div>

      </div>
      <!--/ Accordion end -->

    </div><!-- Col end -->
</div><!-- Row end -->

</div>
@endsection
