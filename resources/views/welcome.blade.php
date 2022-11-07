
<?php
App::setLocale(Session::get('locale'));
?>

<!DOCTYPE html>
<html >
  
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Shotram</title>
    <link rel="icon" href="dist/img/shotram.png" sizes="16x16">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 569 Edu Meeting

https://templatemo.com/tm-569-edu-meeting

-->
  </head>

<body>

  <!-- Sub Header -->
  <div class="sub-header" style="background-color: rgb(8, 3, 0)">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8">
          <div class="left-content">
            <p>Shop Tracking and Management System <em>(SHOTRAM)</em>.</p>
          </div>
        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="right-icons">
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="#" class="logo">
                         SHOTRAM
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                          <li><a href="user-guid">{{ __('User Guide') }}</a></li>
                          <li ><a href="#">{{ __('message.about') }}</a></li>
                          <li ><a href="contact">{{ __('message.contact') }}</a></li>
                          <li ><a href="registration">{{ __('message.register') }}</a></li>
                          <li ><a href="/">Login</a></li>
                          <li class="has-sub">
                              <a href="javascript:void(0)">{{ __('message.language') }}</a>
                              <ul class="sub-menu">
                                  <li><a href="sw">Swahili</a></li>
                                  <li><a href="en">English</a></li>
                              </ul>
                          </li>
                      </ul>        
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
      <video autoplay muted loop id="bg-video">
          <source src="assets/images/course-video.mp4" type="video/mp4" />
      </video>

      <div class="video-overlay header-text">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <div class="caption">
              <h6>Use SHOTRAM System Offline without Internet</h6>
              <h2>Good Info to all Traders</h2>
              <p>With Us You may able to manage,track and monitor your Business arround the world, Mailing Us with &nbsp;<a rel="nofollow" href="mailto:info@shotram.com" target="_blank">info@shotram.com</a>.</p>
              <div class="main-button-red">
                  <div><a href="registration">Register Now</a></div>
              </div>
          </div>
              </div>
              <div class="col-lg-6">
                <br><br><br><br><br>
                <div class="card">
                  <div class="card-header" style="background-color:#006699; float:center">{{ __('message.login') }}</div>
  
                  <div class="card-body">
                      <form method="POST" action="{{ route('auth') }}">
                          @csrf
                       <?php /* $date = '15-12-2016';
                      $nameOfDay = date('l', strtotime($date));
                      echo $nameOfDay; */ ?>
                          <div class="form-group row">
                            <div class="col-md-4">
                              <label for="email" style="float: right" class=" col-form-label text-md-right">{{  __('message.email')  }}</label>
                            </div>

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
                            <div class="col-md-4">
                              <label for="password" style="float: right;" class=" col-form-label text-md-right">{{ __('message.password') }}</label>
                              
                            </div>
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
  
                                  <a class="btn btn-primary" href="registration">
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
          </div>
      </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->

  <section class="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-service-item owl-carousel">
          
            <div class="item">
              <div class="icon">
                <img src="assets/images/product-icon.png" alt="">
              </div>
              <div class="down-content">
                <h4>Selling</h4>
                <p>In this system you will be able to sell your Registered Products.</p>
              </div>
            </div>
            
            <div class="item">
              <div class="icon">
                <img src="assets/images/payroll.png" alt="">
              </div>
              <div class="down-content">
                <h4>Payroll</h4>
                <p>System provide a capability to generate payroll in a seconds.</p>
              </div>
            </div>
            
            <div class="item">
              <div class="icon">
                <img src="assets/images/allowance.png" alt="">
              </div>
              <div class="down-content">
                <h4>Allowance</h4>
                <p>You may record allowances for your Employees.</p>
              </div>
            </div>
            
            <div class="item">
              <div class="icon">
                <img src="assets/images/loan.png" alt="">
              </div>
              <div class="down-content">
                <h4>Loans</h4>
                <p>Record Loan from Finencial Institutions like Banks or provided to the Employees.</p>
              </div>
            </div>
            
            <div class="item">
              <div class="icon">
                <img src="assets/images/profits & loss.png" alt="">
              </div>
              <div class="down-content">
                <h4>Profit/Loss</h4>
                <p>Know the Business Net Profit or Loss.</p>
              </div>
            </div>
            <div class="item">
              <div class="icon">
                <img src="assets/images/payments.png" alt="">
              </div>
              <div class="down-content">
                <h4>Payments</h4>
                <p>Record Payments for your Employees.</p>
              </div>
            </div>
            <div class="item">
              <div class="icon">
                <img src="assets/images/expenditures.png" alt="">
              </div>
              <div class="down-content">
                <h4>Expenditures</h4>
                <p>Record Expenditures in Your Business.</p>
              </div>
            </div>
            <div class="item">
              <div class="icon">
                <img src="assets/images/invoice.png" alt="">
              </div>
              <div class="down-content">
                <h4>Invoice</h4>
                <p>Craete and Print Invoice.</p>
              </div>
            </div>
            <div class="item">
              <div class="icon">
                <img src="assets/images/quotations.png" alt="">
              </div>
              <div class="down-content">
                <h4>Quotation</h4>
                <p>Create and Print Quotation.</p>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="upcoming-meetings" id="meetings">
    <div class="container">
      <div class="row">
      
        <div class="col-lg-12">
          <h3 class="section-sub-title" style="color: rgb(255, 123, 0)">{{ __('message.features.title') }} </h3><br>
          <div class="row">
            
            <div class="col-lg-6">
              <div class="meeting-item">
                <div class="thumb">
                  
                </div>
                <div class="down-">
                 
                  <h3 style="color: rgb(24, 117, 240)">A. &nbsp; {{ __('message.features.trader') }}</h3>
                  <li><a href="#" style="color: rgb(31, 34, 37)">1. &nbsp;{{ __('message.features.one') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">2. &nbsp;{{ __('message.features.two') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">3. &nbsp;{{ __('message.features.three') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">4. &nbsp;{{ __('message.features.nine') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">5. &nbsp;{{ __('message.features.eighteen') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">6. &nbsp;{{ __('message.features.nineteen') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">7. &nbsp;{{ __('message.features.twenty') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">8. &nbsp;{{ __('message.features.twenty_one') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">9. &nbsp;{{ __('message.features.twenty_two') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">10. &nbsp;{{ __('message.features.twenty_three') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">11. &nbsp;{{ __('message.features.twenty_four') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">12. &nbsp;{{ __('message.features.twenty_six') }} </a></li>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="meeting-item">
                {{-- <div class="thumb">
                 
                  <a href="meeting-details.html"><img src="assets/images/meeting-02.jpg" alt="Online Teaching"></a>
                </div> --}}
                <div class="down-">
                  <div class="date">
                  </div><br>
                  <h3 style="color: rgb(24, 117, 240)">B. &nbsp; {{ __('message.features.seller') }}</h3>
                  <li><a href="#" style="color: rgb(31, 34, 37)">1. &nbsp;{{ __('message.features.four') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">2. &nbsp;{{ __('message.features.five') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">3. &nbsp;{{ __('message.features.six') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">4. &nbsp;{{ __('message.features.seven') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">5. &nbsp;{{ __('message.features.eight') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">6. &nbsp;{{ __('message.features.nine') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">7. &nbsp;{{ __('message.features.ten') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">8. &nbsp;{{ __('message.features.eleven') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">9. &nbsp;{{ __('message.features.twelve') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">10 &nbsp;{{ __('message.features.thirteen') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">11. &nbsp;{{ __('message.features.fourteen') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">12. &nbsp;{{ __('message.features.sixteen') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">13. &nbsp;{{ __('message.features.twenty_five') }} </a></li><br>
                  <li><a href="#" style="color: rgb(31, 34, 37)">14. &nbsp;{{ __('message.features.seventeen') }} </a></li>
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="upcoming-meetings" id="meetings">
    <div class="container">
      <div class="row">
        
        <div class="col-lg-12">
          <h3 class="section-sub-title" style="color: rgb(255, 123, 0)">Namna ya Kuanza kutumia Mfumo  wa shotram</h3><br>
          <div class="row">
            
            <div class="col-lg-6">
              <div class="meeting-item">
                <div class="thumb">
                  
                </div>
                <div class="down-">
                 
                  <h4>1. Kufanya usajili</h4>
                  <p>Kabla ya Kuingia/login Ndani Mfumo lazima ujisajili.</p>
                  <p>Mfumo unaruhusu Mmiliki Duka kujisajili kisha yeye kumsajili Mfanya kazi wake.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="meeting-item">
                {{-- <div class="thumb">
                 
                  <a href="meeting-details.html"><img src="assets/images/meeting-02.jpg" alt="Online Teaching"></a>
                </div> --}}
                <div class="down-">
                  <div class="date">
                  </div><br>
                <h4>2 .Thibitisha Email yako</h4>
                  <p>Baada ya kufanya usajili utaona button ya bluu kama inavyooneka chini, Utabonyeza kisha utafungua email yako.

                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="meeting-item">
                {{-- <div class="thumb">
                
                  <a href="meeting-details.html"><img src="assets/images/meeting-03.jpg" alt="Higher Education"></a>
                </div> --}}
                <div class="down-">
                 
                  <h4>3. Tengeneza Duka au Pharmacy</h4>
                  <p>Baada ya Kuingia kwenye email yako Utabonyeza button iliyoandikwa <em>verify</em>, kisha utaingia mojakwa maoja ndani ya mfumo.</p>
                <p>Ukishaingia ndani ya mfumo ,Mfumo utakutambua wewe kama Mmiliki wa duka.</p>
                <p>Utatengeneza duka lako kwa kubonyeza kitufe kilichoandikwa Create Shop/Pharmacy

                </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="meeting-item">
                {{-- <div class="thumb">
               
                  <a href="meeting-details.html"><img src="assets/images/meeting-04.jpg" alt="Student Training"></a>
                </div> --}}
                <div class="down-">
                  
                  <h4>4. Ingia Ndani ya Duka</h4>
                  <p>Ukisha  tengeneza Duka  au Pharmacy Unaweza ukaendelea kutengeneza Maduka mengine Kuliingana na Idadi Ya Maduka au  Pharmacy ulizonazo</p>
                  <p>Baada ya Ketengeneza Duka lako, Utaingia ndani ya Duka au Pharmacy yako Kwa kubonyeza kitufe kilichoandikwa <em class="text-info">Open Door</em></p>
                 
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="meeting-item">
                {{-- <div class="thumb">
               
                  <a href="meeting-details.html"><img src="assets/images/meeting-04.jpg" alt="Student Training"></a>
                </div> --}}
                <div class="down-">
                  
                  <h4>5. Msajili Muuzaji/Mfanyakazi Wa Duka au Pharmacy</h4>
                  <p>Unapoingia ndani kwanza kabisa msajili "Mtengenezee Accout" Mfanyakazi wa Duka  husika.</p>
     
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="meeting-item">
                {{-- <div class="thumb">
               
                  <a href="meeting-details.html"><img src="assets/images/meeting-04.jpg" alt="Student Training"></a>
                </div> --}}
                <div class="down-">
                  
                  <h4>6. Jaza  Taarifa za Mfanyakazi wa Duka lako.</h4>
                  <p>Utabonyeza kitufe kilichoandikwa <em class="text-info">Add Employee</em></p>
                  <p><b>Kuzingatia:</b> Mfanyakazi wa Duka husika ataingia ndani ya Mfumo kwa kutumia</p>
                  <p><b><em>Email: </em></b> = email ambayo bosi wake amemsajilia.</p>
                  <p><b><em>Password: </em></b> = Jina lake la mwisho kwa <em class="text-info">herufi kubwa</em>  ambalo Bosi wake amemsajilia.</p>
                  
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="apply-now" id="apply">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="row">
            <div class="col-lg-6">
              <div class="item">
                <h3>TRACK YOUR BUSINESS ANYWAY</h3>
                <p>With shotram you may able to track your Shops or Pharmacies or related activities in business </p>
                <div class="main-button-red">
                  <div><a href="registration">Join Us Now!</a></div>
              </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="item">
                <h3>EASY TO MANAGE YOU BUSINESS</h3>
                <p>Manage your Employees, Record Allowances,Loans,Payments and so.</p>
                <div class="main-button-red">
                  <div><a href="registration">Join Us Now!</a></div>
              </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-lg-6">
              <div class="item">
                <h3>USE OUR SYSTEM OFFLINE WITHOUT INTERNET</h3>
                <p>Shotram system is used offline by a seller but a Trader/Shop owner will track nit over the online</p>
                <div class="main-button-red">
                  <div><a href="registration">Join Us Now!</a></div>
              </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="item">
                <h3>USE SHOTRAM TO</h3>
                <p>Manege PHARMACIES and SHOPS</p>
                <div class="main-button-red">
                  <div><a href="registration">Join Us Now!</a></div>
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="accordions is-first-expanded">
            <div class="categories"  style="color: rgb(90, 89, 89)">
              <h4 style="color: rgb(255, 123, 0)">{{ __('message.choose_us.title') }} </h4>
              <ul>
                <li>1. &nbsp;{{ __('message.choose_us.importance.one') }} </li><br>
                <li>2. &nbsp;{{ __('message.choose_us.importance.two') }} </li><br>
                <li>3. &nbsp;{{ __('message.choose_us.importance.three') }} </li><br>
                <li>4. &nbsp;{{ __('message.choose_us.importance.four') }} </li><br>
                <li>5. &nbsp;{{ __('message.choose_us.importance.five') }} </li><br>
                <li>6. &nbsp;{{ __('message.choose_us.importance.six') }} </li><br>
                <li>7. &nbsp;{{ __('message.choose_us.importance.seven') }} </li><br>
                <li>8. &nbsp;{{ __('message.choose_us.importance.eight') }} </li><br>
              </ul>
              <div class="main-button-red">
                <a href="registration">Register</a>
              </div>
            </div>
        </div>
        </div>
      </div>
    </div>
  </section>

  {{-- <section class="our-courses" id="courses">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Our Popular Courses</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-courses-item owl-carousel">
            <div class="item">
              <img src="assets/images/shotram7-01.png" alt="Course One">
              <div class="down-content">
                <h4>Morbi tincidunt elit vitae justo rhoncus</h4>
                
              </div>
            </div>
            <div class="item">
              <img src="assets/images/course-02.jpg" alt="Course Two">
              <div class="down-content">
                <h4>Curabitur molestie dignissim purus vel</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                    </div>
                    <div class="col-4">
                       <span>$180</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/course-03.jpg" alt="">
              <div class="down-content">
                <h4>Nulla at ipsum a mauris egestas tempor</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                    </div>
                    <div class="col-4">
                       <span>$140</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/course-04.jpg" alt="">
              <div class="down-content">
                <h4>Aenean molestie quis libero gravida</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                    </div>
                    <div class="col-4">
                       <span>$120</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/course-01.jpg" alt="">
              <div class="down-content">
                <h4>Lorem ipsum dolor sit amet adipiscing elit</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                    </div>
                    <div class="col-4">
                       <span>$250</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/course-02.jpg" alt="">
              <div class="down-content">
                <h4>TemplateMo is the best website for Free CSS</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                    </div>
                    <div class="col-4">
                       <span>$270</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/course-03.jpg" alt="">
              <div class="down-content">
                <h4>Web Design Templates at your finger tips</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                    </div>
                    <div class="col-4">
                       <span>$340</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/course-04.jpg" alt="">
              <div class="down-content">
                <h4>Please visit our website again</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                    </div>
                    <div class="col-4">
                       <span>$360</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/course-01.jpg" alt="">
              <div class="down-content">
                <h4>Responsive HTML Templates for you</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                    </div>
                    <div class="col-4">
                       <span>$400</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/course-02.jpg" alt="">
              <div class="down-content">
                <h4>Download Free CSS Layouts for your business</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                    </div>
                    <div class="col-4">
                       <span>$430</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/course-03.jpg" alt="">
              <div class="down-content">
                <h4>Morbi in libero blandit lectus cursus</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                    </div>
                    <div class="col-4">
                       <span>$480</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/course-04.jpg" alt="">
              <div class="down-content">
                <h4>Curabitur molestie dignissim purus</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                    </div>
                    <div class="col-4">
                       <span>$560</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

  <section class="our-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-12">
              <h2>What We Have?</h2>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-12">
                  <div class="count-area-content ">
                    <div class="count-digit">250</div>
                    <div class="count-title">Traders</div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="count-area-content">
                    <div class="count-digit">896</div>
                    <div class="count-title">Current Stocks</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-12">
                  <div class="count-area-content new-students">
                    <div class="count-digit">11900</div>
                    <div class="count-title">Products</div>
                  </div>
                </div> 
                <div class="col-12">
                  <div class="count-area-content">
                    <div class="count-digit">32</div>
                    <div class="count-title">Awards</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <div class="col-lg-6 align-self-center">
          <div class="video">
            <a href="#" target="_blank"><img src="assets/images/play-icon.png" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('nav.footer')

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
</body>

</body>
</html>