<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>Admin Dashboard - Vege</title>

   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
   <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">

   <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
   <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Sen&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

   <style>
      /* Sirf logo aur navbar spacing ke liye jo visitor mein tha */
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
         
         <!-- Logo set exactly like visitor -->
         <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('images/images/finall.png') }}" alt="Logo">
         </a>

         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

               <li class="nav-item">
                  <a class="nav-link font-weight-bold" href="{{ route('admin.dashboard') }}">Dashboard</a>
               </li>

               <li class="nav-item">
                  <a class="nav-link font-weight-bold" href="{{ route('admin.users') }}">Users</a>
               </li>

               <li class="nav-item ">
                  <a href="{{ route('admin.orders') }}" class="nav-link font-weight-bold">
                      Manage Orders
                  </a>
               </li>

               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle font-weight-bold" href="#" id="categoryDropdown" role="button" data-toggle="dropdown">
                  Category
                  </a>
                  <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                     <a class="dropdown-item font-weight-bold" href="{{ route('admin.categories.create') }}">Add New Category</a>
                     <a class="dropdown-item font-weight-bold" href="{{ route('admin.categories.index') }}">View All Categories</a>
                  </div>
               </li>

               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle font-weight-bold" href="#" id="mealsDropdown" role="button" data-toggle="dropdown">
                      Meals
                  </a>
                  <div class="dropdown-menu" aria-labelledby="mealsDropdown">
                     <a class="dropdown-item font-weight-bold" href="{{ route('admin.meals.create') }}">Add New Meal</a>
                     <a class="dropdown-item font-weight-bold" href="{{ route('admin.meals.index') }}">View All Meals</a>
                  </div>
               </li>

               <li class="nav-item">
                  <a class="nav-link font-weight-bold" href="{{ route('admin.bookings') }}">
                  Bookings
                  </a>
               </li>

               <li class="nav-item">
                  <a class="nav-link font-weight-bold" href="{{ route('admin.feedback_list') }}">Feedback</a>
               </li>

               <li class="nav-item">
                  <a  class="nav-link font-weight-bold" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
               </li>

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