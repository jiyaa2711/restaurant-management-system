<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>User Dashboard - Vege</title>

   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
   <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">

   <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

   <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Sen&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

   <style>
      /* Visitor jaisa logo aur navbar spacing set karne ke liye */
      .navbar-brand img {
          height: 60px; 
          width: auto; 
          object-fit: contain;
          transition: 0.3s;
      }
      .navbar {
          padding: 0.5rem 1rem;
      }
   </style>
</head>

<body>

<div class="header_section">
   <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         
         <!-- Logo set exactly like visitor page -->
         <a class="navbar-brand" href="{{ route('user.dashboard') }}">
            <img src="{{ asset('images/images/finall.png') }}" alt="Logo">
         </a>

         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

               <li class="nav-item">
                  <a class="nav-link font-weight-bold" href="{{ route('user.dashboard') }}">Home</a>
               </li>

               <li class="nav-item">
                  <a class="nav-link font-weight-bold" href="{{ route('user.about') }}">About Us</a>
               </li>

               <li class="nav-item">
                  <a class="nav-link font-weight-bold" href="{{ route('user.meals') }}">Meals</a>
               </li>

               <li class="nav-item">
                  <a class="nav-link font-weight-bold" href="{{ route('user.book_table') }}">Book Table</a>
               </li>

               <li class="nav-item">
                  <a class="nav-link font-weight-bold" href="{{ route('user.feedback') }}">Feedback</a>
               </li>

               <li class="nav-item">
                  <a class="nav-link font-weight-bold" href="{{ route('user.contact') }}">Contact Us</a>
               </li>

               <li class="nav-item">
                  <a class="nav-link font-weight-bold" href="{{ route('user.my_orders') }}">My Orders</a>
               </li>

               <li class="nav-item">
                  <a class="nav-link position-relative font-weight-bold" href="{{ route('cart') }}">
                    Cart
                     @auth
                        @php 
                           $dbCount = \DB::table('carts')->where('user_id', Auth::id())->count(); 
                        @endphp
                        
                        @if($dbCount > 0) 
                           <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" 
                                 style="font-size: 0.7rem; padding: 4px 8px; border: 2px solid #00a651; z-index: 10;">
                              {{ $dbCount }}
                           </span> 
                        @endif
                     @endauth
                  </a>
               </li>

               @auth
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle font-weight-bold " href="#" id="userDropdown" role="button" data-toggle="dropdown">
                     <i class="fa fa-user-circle"></i> {{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                     <a class="dropdown-item font-weight-bold" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out text-danger"></i> Logout
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
                  </div>
               </li>
               @endauth

            </ul>
         </div>
      </nav>
   </div>
</div>

<div class="py-5">
   @yield('main')
</div>

<footer>
   <p class="text-center mb-0" style="background-color:black; color:white; padding: 25px 0; font-size: 14px;">
      © 2026 D & Z Restaurant | Developed By Patel Diya & Dodhiya Jiya
   </p>
</footer>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>