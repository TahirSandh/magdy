<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Frequent Deliver</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('front/assets/css/responsive.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/lib/slick-slider/slick/slick.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/lib/slick-slider/slick/slick-theme.css') }}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>

 </head>
<body>
  <header>
    <!--firstsection -->
    <section class="topbar">
      <div class="container">
        <div class="col-md-2 offset-10">
          {{-- <a href="#"><img src="{{ asset('front') }}/images/i.png" alt=""></a> --}}
          
          @if(Auth::check())
          <a href="{{ route("home")}}"><img src="{{ asset('front') }}/images/1.png" alt=""></a>
          @endif
          <!-- <a href="#"><img src="{{ asset('front') }}/images/2.png" alt=""></a> -->
          <!-- <a href="#"><img src="{{ asset('front') }}/images/3.png" alt=""></a> -->
        </div>
      </div>
    </section>
    <section class="secondsection_mu">
      <div class="mainmenu">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <a class="navbar-brand" href="index.php"><img src="{{ asset('front') }}/images/logo.png" alt=""></a>
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active text-white" aria-current="page" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active text-white" aria-current="page" href="{{route('about')}}">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active text-white" aria-current="page" href="{{route('howitwork')}}">How It
                    Works</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Shipping Price Calculation
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">link 1</a></li>
                    <li><a class="dropdown-item" href="#">Link 2</a></li>
                  </ul>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link active text-white" aria-current="page" href="{{route('login')}}">Login</a>
                </li> -->
             
                <li class="nav-item">
                  <a class="nav-link active text-white" aria-current="page" href="{{route('contactus')}}">Contact Us</a>
                </li>
                @if(!Auth::check())
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Login / Sign up
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{url('/login/Travelar')}}">Travelar</a></li>
                    <li><a class="dropdown-item" href="{{url('/login/Shopper')}}">Shopper</a></li>
                  </ul>
                </li>
                @else
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->f_name}}
                  </a>
                  
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{url('/dashboard')}}">Dashboard</a></li>
                    <li><a class="dropdown-item" href="{{url('/logout')}}">Logout</a></li>
                  </ul>
                </li>
                @endif
              </ul>
              <!-- <form class="d-flex">-->
              <!--  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
              <!--  <button class="btn btn-outline-success" type="submit">Search</button>-->
              <!--</form> -->
            </div>
          </div>
      </div>
      </nav>
      </div>
    </section>
  </header>


  @yield('content')
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="footlogo">
            <img src="{{ asset('front') }}/images/logo.png" alt="">
          </div>
        </div>
      </div>

      <div class="footlinks">
        <div class="row">
          <div class="col-md-3">
            <h4>Company</h4>
            <ul>
              <li>About</li>
              <li>Contact Us</li>
              <li>FAQ</li>
              <li>Help</li>
              <li>Terms & Conditions</li>
              <li>Privacy Policy</li>
            </ul>

          </div>
          <div class="col-md-3">
            <h4>Shoppers</h4>
            <ul>
              <li>How It Works</li>
              <li>Shipping Price Calculation</li>
              <li>Trust & Safety</li>
              <li>Become a Shopper</li>
              <li>Shopper Login</li>
              <li>Prohibited Items</li>
            </ul>

          </div>
          <div class="col-md-2">
            <h4>Shop From</h4>
            <ul>
              <li>USA</li>
              <li>Canada</li>
              <li>Trust & Safety</li>
              <li>Austrailia</li>
              <li>United Kingdom</li>
              <li>Netherlands</li>
              <li>Turkey</li>
            </ul>

          </div>
          <div class="col-md-2">
            <h4>Traveler</h4>
            <ul>
              <li>How It Works</li>
              <li>Become a Host</li>
              <li>Responsible Shipping</li>
              <li>Shipping Standards</li>
              <li>Shopper Login</li>
              <li>Shipper Network</li>
            </ul>

          </div>
          <div class="col-md-2">
            <div class="appstore">
              <img src="{{ asset('front') }}/images/gp.png" alt="">
            </div>

          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="paypalimg">
              <img src="{{ asset('front') }}/images/paypal.png" alt="">
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!--copyright section -->

  <div class="copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3>COPYRIGHT © 2022, ALL RIGHTS RESERVED</h3>
        </div>
      </div>
    </div>
  </div>


</body>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/css/bootstrap.min.css" integrity="sha512-siwe/oXMhSjGCwLn+scraPOWrJxHlUgMBMZXdPe2Tnk3I0x3ESCoLz7WZ5NTH6SZrywMY+PB1cjyqJ5jAluCOg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="{{asset('/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"
  integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="{{ asset('front') }}/assets/lib/slick-slider/slick/slick.min.js"></script>
<script src="{{ asset('front') }}/assets/js/main.js"></script>
<script>
function previewFile() {
  debugger
  var preview = $('.profile_image');
  var file = $('#profile-image-upload')[0].files[0];
  debugger
  var reader = new FileReader();
  reader.addEventListener("load", function () {
    debugger
    preview.attr("src",reader.result);
  }, false);
  if (file) {
      reader.readAsDataURL(file);
  }
}
$(function () {
  $('#profile-image1').on('click', function () {
    debugger
      $('#profile-image-upload').click();
  });
});</script>
</html>