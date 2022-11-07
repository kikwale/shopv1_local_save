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

    
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
    {{-- <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

 
<body>
       

  
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                       SHOTRAM
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li ><a href="/" class="active">Home</a></li>
                        <li><a href="user-guid">{{ __('User Guide') }}</a></li>
                        <li ><a href="#">{{ __('message.about') }}</a></li>
                        <li ><a href="contact">{{ __('message.contact') }}</a></li>
                        <li ><a href="registration">{{ __('message.register') }}</a></li>
                        <li ><a href="/">login</a></li>
                        <li class="has-sub">
                            <a href="javascript:void(0)">{{__('message.language')}}</a>
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

        <main class="py-4">
            @yield('content')
            
        </main>
      

     @include('nav.footer')        
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
