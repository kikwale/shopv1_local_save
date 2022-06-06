<?php
App::setLocale(Session::get('locale'));
?>
</head>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <title>{{ config('app.name', 'Laravel') }}</title>
<link rel="icon" href="dist/img/shotram.png" type="image/gif" sizes="16x16">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- CSS only -->

    
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/style.css">
  <!-- Google Font: Source Sans Pro -->
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

 
<body style="background-color: #e9eff7">
       

    <div id="app">


          
         
      </div>

        <nav class="navbar navbar-expand-md navbar-light shadow-sm"  style="background-color:#27AAE1">
            <div class="container">
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="dist/img/shopuplogo-01.png" alt="User Avatar" class="img-size-50 mr- img-circl">
                </a> --}}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                      
                        @guest
                            {{-- @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif --}}
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">{{ __('message.demo') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="user-guid">{{ __('User Guid') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">{{ __('message.about') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="contact">{{ __('message.contact') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('message.register') }}</a>
                                </li>
                            @endif

                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('login') }}</a>
                            </li>
                        @endif
                          
                            <li class="nav-item dropdown">
                                <a class="nav-link" data-toggle="dropdown" href="#">
                          
                                    <p>{{__('message.language')}}</p>

                                  
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                  {{-- <span class="dropdown-item dropdown-header">15 Notifications</span> --}}
                                  <div class="dropdown-divider"></div>
                                  <a href="en" class="dropdown-item">
                                   English
                                    {{-- <span class="float-right text-muted text-sm">3 mins</span> --}}
                                  </a>
                                  <div class="dropdown-divider"></div>
                                  <a href="sw" class="dropdown-item">
                                  Swahili
                                    {{-- <span class="float-right text-muted text-sm">12 hours</span> --}}
                                  </a>
                                  <div class="dropdown-divider"></div>
                                 
                        
                                  {{-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> --}}
                                </div>
                              </li>
                        @else
                            <li class="nav-item dropdown">
                                {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a> --}}

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div style="width: 100%; height:10px; background-color:#e45909">

          
         
        </div>
        <main class="py-4">
            @yield('content')
            
        </main>

        <footer id="footer" class="footer bg-overlay">
            <div class="footer-main">
              <div class="container">
                <div class="row justify-content-between">
                  <div class="col-lg-4 col-md-6 footer-widget footer-about">
                    <h3 class="widget-title">About Us</h3>
                    <img loading="lazy" width="100px" class="footer-logo" src="dist/img/shotram.png" alt="Constra">
                    <p>We are here to make you great. Great your Business with us.</p>
                    <div class="footer-social">
                      <ul>
                        <li><a href="#" aria-label="Facebook"><i
                              class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li><a href="#" aria-label="Instagram"><i
                              class="fab fa-instagram"></i></a></li>
                        <li><a href="#" aria-label="Github"><i class="fab fa-github"></i></a></li>
                      </ul>
                    </div><!-- Footer social end -->
                  </div><!-- Col end -->
        
                  <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
                    <h3 class="widget-title">Working Hours</h3>
                    <div class="working-hours">
                      We work 7 days a week, every day excluding major holidays. Contact us if you have an emergency, with our
                      Hotline and Contact form.
                      <br><br> Monday - Friday: <span class="text-right">10:00 - 16:00 </span>
                      <br> Saturday: <span class="text-right">12:00 - 15:00</span>
                      <br> Sunday and holidays: <span class="text-right">09:00 - 12:00</span>
                    </div>
                  </div><!-- Col end -->
        
                  <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
                    <h3 class="widget-title">CONTACTS</h3>
                    <ul class="list-arrow">
                      <li><a href="tel:+255782776467">+255 782  776 467</a></li>
                      <li><a href="mailto:info@shotram.com">info@shotram.com</a></li>
                    </ul>
                  </div><!-- Col end -->
                </div><!-- Row end -->
              </div><!-- Container end -->
            </div><!-- Footer main end -->
        
            <div class="copyright">
              <div class="container">
                <div class="row align-items-center">
                  <div class="col-md-6">
                    <div class="copyright-info text-center text-md-left">
                      <span>Copyright &copy; <script>
                          document.write(new Date().getFullYear())
                        </script>, All Right &amp; Reserved by <a href="https://shotram.com">Shotram</a></span>
                    </div>
                  </div>
        
                  <div class="col-md-6">
                    <div class="footer-menu text-center text-md-right">
                      <ul class="list-unstyled">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Our people</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Pricing</a></li>
                      </ul>
                    </div>
                  </div>
                </div><!-- Row end -->
        
                <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
                  <button class="btn btn-primary" title="Back to Top">
                    <i class="fa fa-angle-double-up"></i>
                  </button>
                </div>
        
              </div><!-- Container end -->
            </div><!-- Copyright end -->
          </footer><!-- Footer end -->
        
        
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
<script src="dist/script.js"></script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>
</html>
