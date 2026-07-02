<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>Visitor Page</title>

   <!-- Fonts -->
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
   
   <!-- Stylesheets -->
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
   <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

   <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />

   <style>
      /* Pure white background as requested */
      body {
          font-family: 'Poppins', sans-serif;
          background-color: #ffffff;
          margin: 0;
          padding: 0;
      }

      /* Fix for Click issue - Ensuring header is on top */
      .header_section {
          position: relative;
          z-index: 1050; 
          background-color: #28a745;
      }

      .navbar {
          padding: 10px 20px;
          background-color: #28a745 !important;
      }

      .navbar-brand img {
          height: 60px;
          width: auto;
          object-fit: contain;
      }

      /* Hover effect for Menu items */
      .nav-link {
          color: #ffffff !important;
          padding: 10px 15px !important;
          transition: 0.3s;
      }

      .nav-link:hover {
          color: #333 !important; /* Green color from image_abcfef.jpg */
      }

      .footer_bottom_strip {
          background-color: #000000;
          color: #ffffff;
          padding: 25px 0;
          font-size: 14px;
          width: 100%;
      }

      .main-content {
          position: relative;
          z-index: 1;
      }
   </style>
</head>

<body>

@if(!Route::is('login') && !Route::is('register'))
<header class="header_section shadow-sm">
   <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light">
         
         <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/images/finall.png') }}" alt="Logo">
         </a>

         <!-- Hamburger Menu for Mobile -->
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link font-weight-bold" href="{{ route('home') }}">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link font-weight-bold" href="{{ route('user.about') }}">About Us</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link font-weight-bold" href="{{ route('user.meals') }}">Meals</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link font-weight-bold" href="{{ route('user.contact') }}">Contact Us</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link font-weight-bold" href="{{ route('login') }}">Login</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link font-weight-bold" href="{{ route('register') }}">Register</a>
               </li>
            </ul>
         </div>
      </nav>
   </div>
</header>
@endif

<main class="main-content" style="min-height: 80vh;">
   @yield('main')
</main>

<footer class="mt-5">
   <!-- Simple and Clean student project style footer -->
   <div class="footer_bottom_strip text-center">
      <div class="container">
         <p class="mb-0">© 2026 D & Z Restaurant | Developed By Patel Diya & Dodhiya Jiya</p>
      </div>
   </div>
</footer>

<!-- Scripts - Footer ke end mein load hone chahiye -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>