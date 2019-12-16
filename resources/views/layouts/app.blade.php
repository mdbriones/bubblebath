<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets') }}/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
 
  <title>
    BubbleBath
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  {{-- <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" /> --}}
  {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"> --}}
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.bootstrap4.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
  <link href="{{ asset('assets') }}/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets') }}/demo/demo.css" rel="stylesheet" />
</head>
<style>
  input[type=date]::-webkit-inner-spin-button {
      -webkit-appearance: none;
      display: none;
  }
  input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
  }
  .notification {
    color: white;
    text-decoration: none;
    padding: 15px 26px;
    position: relative;
    display: inline-block;
    border-radius: 2px;
  }
  .notification .badge {
    position: absolute;
    top: 0px;
    right: 38px;
    padding: 5px 10px;
    border-radius: 60%;
    background: red;
    color: white;
  }

  .carousel-control-prev, .carousel-control-next-icon {
    filter: invert(50%);
  }  
</style>

<style>
.notification-bell {
  animation: bell 1s 1s both infinite;
}
.notification-bell * {
  display: block;
  margin: 0 auto;
  background-color: #9adfff;
  box-shadow: 0px 0px 15px #9adfff;
}
.bell-top {
  width: 6px;
  height: 6px;
  border-radius: 3px 3px 0 0;
}
.bell-middle {
  width: 18px;
  height: 18px;
  margin-top: -1px;
  border-radius: 12.5px 12.5px 0 0;
}
.bell-bottom {
  position: relative;
  z-index: 0;
  width: 22px;
  height: 2px;
}
.bell-bottom::before,
.bell-bottom::after {
  content: '';
  position: absolute;
  top: -4px;
}
.bell-bottom::before {
  left: 1px;
  border-bottom: 4px solid #fff;
  border-right: 0 solid transparent;
  border-left: 4px solid transparent;
}
.bell-bottom::after {
  right: 1px;
  border-bottom: 4px solid #fff;
  border-right: 4px solid transparent;
  border-left: 0 solid transparent;
}
.bell-rad {
  width: 5px;
  height: 4px;
  margin-top: 2px;
  border-radius: 0 0 4px 4px;
  animation: rad 1s 2s both infinite;
}
.notification-count {
  padding-left: 7px;
  position: absolute;
  z-index: 1;
  top: 0px;
  right: 20px;
  width: 23px;
  height: 23px;
  line-height: 23px;
  font-size: 15px;
  border-radius: 50%;
  background-color: #ff4927;
  color: #fff;
  animation: zoom 1s 1s both infinite;
}
@keyframes bell {
  0% { transform: rotate(0); }
  10% { transform: rotate(30deg); }
  20% { transform: rotate(0); }
  80% { transform: rotate(0); }
  90% { transform: rotate(-30deg); }
  100% { transform: rotate(0); }
}
@keyframes rad {
  0% { transform: translateX(0); }
  10% { transform: translateX(6px); }
  20% { transform: translateX(0); }
  80% { transform: translateX(0); }
  90% { transform: translateX(-6px); }
  100% { transform: translateX(0); }
}
@keyframes zoom {
  0% { opacity: 0; transform: scale(0); }
  10% { opacity: 1; transform: scale(1); }
  50% { opacity: 1; }
  51% { opacity: 0; }
  100% { opacity: 0; }
}
@keyframes moon-moving {
  0% {
    transform: translate(-200%, 600%);
  }
  100% {
    transform: translate(800%, -200%);
  }
}

@media screen and (min-width: 0px) and (max-width: 990px) {
  #id_notif { display: none; } 
}
@media screen and (min-width: 990px) and (max-width: 1624px) {
  #id_notif { display: block; }  
}

@media screen and (min-width: 0px) and (max-width: 990px) {
  #small_screen_notif { display: block; } 
}
@media screen and (min-width: 990px) and (max-width: 1624px) {
  #small_screen_notif { display: none; }  
}

</style>
<body class="{{ $class ?? '' }}">
  <div class="wrapper" >
    @auth
      @include('layouts.page_template.auth')
    @endauth
    @guest
      @include('layouts.page_template.guest')
    @endguest
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets') }}/js/core/jquery.min.js"></script>
  <script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
  <script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>
  <script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets') }}/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets') }}/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('assets') }}/demo/demo.js"></script>
  
  {{-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script> --}}
  <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.bootstrap4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>

  <script src="{{ asset('assets') }}/js/bbath/action.js"></script>
  @stack('js')
</body>

</html>