<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>{{config('app.name')}}</title>
  <!-- Site favicon -->

<link
  rel="icon"
  type="image/png"
  sizes="16x16"
  href="dist/img/shotram.png"
/>

<!-- Mobile Specific Metas -->
<meta
  name="viewport"
  content="width=device-width, initial-scale=1, maximum-scale=1"
/>

<!-- Google Font -->
<link
  href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
  rel="stylesheet"
/>


<!-- CSS -->
<link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
<link
  rel="stylesheet"
  type="text/css"
  href="vendors/styles/icon-font.min.css"
/>
<link
  rel="stylesheet"
  type="text/css"
  href="src/plugins/datatables/css/dataTables.bootstrap4.min.css"
/>
<link
			rel="stylesheet"
			type="text/css"
			href="src/plugins/fullcalendar/fullcalendar.css"
		/>
<link
  rel="stylesheet"
  type="text/css"
  href="src/plugins/datatables/css/responsive.bootstrap4.min.css"
/>
<link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />

<!-- Global site tag (gtag.js) - Google Analytics -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
  <script
  async
  src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag() {
    dataLayer.push(arguments);
  }
  gtag("js", new Date());

  gtag("config", "G-GBZ3SGGX85");
</script>
<!-- Google Tag Manager -->
<script>
  (function (w, d, s, l, i) {
    w[l] = w[l] || [];
    w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
    var f = d.getElementsByTagName(s)[0],
      j = d.createElement(s),
      dl = l != "dataLayer" ? "&l=" + l : "";
    j.async = true;
    j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
    f.parentNode.insertBefore(j, f);
  })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
</script>
<!-- End Google Tag Manager -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="pdf/pdf.css" />
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="main-container">

  <?php
App::setLocale(Session::get('locale'));
?>

  <!-- /.content-wrapper -->
  @include('nav.seller')
  
 @yield('content')

  

 

</div>
<!-- ./wrapper -->

<script src="vendors/scripts/core.js"></script>
<script src="vendors/scripts/script.min.js"></script>
<script src="vendors/scripts/process.js"></script>
<script src="vendors/scripts/layout-settings.js"></script>
<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script src="vendors/scripts/dashboard3.js"></script>
<!-- Google Tag Manager (noscript) -->

{{-- Calendar --}}
<script src="src/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="vendors/scripts/calendar-setting.js"></script>
		<!-- buttons for Export datatable -->
		<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
		<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
		<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
		<!-- Datatable Setting js -->
		<script src="vendors/scripts/datatable-setting.js"></script>
<noscript
  ><iframe
    src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
    height="0"
    width="0"
    style="display: none; visibility: hidden"
  ></iframe
></noscript>
<!-- End Google Tag Manager (noscript) -->
</body>
</html>
