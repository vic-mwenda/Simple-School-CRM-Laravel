<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
</head>


<body style="background: #e1edf7">


  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="logo d-flex align-items-center justify-content-between">
      <a href="{{ route('dashboard') }}" class="d-flex align-items-center">
        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
      </a>
    </div>
      <i class="bi bi-list toggle-sidebar-btn"></i>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-person"></i><span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

            <li class="dropdown-header">
              <h6>{{ Auth::user()->name }}</h6>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('profile.edit')}}">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                <i class="bi bi-person"></i>
                <span>Logout</span>
              </a>
            </li>


          </ul>
        </li>

      </ul>
    </nav>

  </header>



  @if(Auth::user()->role == 0||Auth::user()->role == 1)
      @include('layouts.admin_navigation')
  @elseif(Auth::user()->role == 2)
      @include('layouts.user_navigation')
  @else
      @include('layouts.viewer_navigation')
  @endif


  <main id="main" class="main">
{{--      <div class="typewriter" >--}}
{{--          <div class="slide"><i></i></div>--}}
{{--          <div class="paper"></div>--}}
{{--          <div class="keyboard"></div>--}}
{{--      </div>--}}


  @if (isset($header))
        <div class="page-title">
            {{ $header }}
        </div>
  @endif

  @include('sweetalert::alert')

  {{ $slot }}
  </main>
  <footer>
    <div class="pb-6 ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
             Zetech CRM v<?php echo config('app.version')?> &copy; 20<?php echo date('y') ?>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.40.0/apexcharts.min.js" integrity="sha512-Kr1p/vGF2i84dZQTkoYZ2do8xHRaiqIa7ysnDugwoOcG0SbIx98erNekP/qms/hBDiBxj336//77d0dv53Jmew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.4.2/echarts.min.js" integrity="sha512-VdqgeoWrVJcsDXFlQEKqE5MyhaIgB9yXUVaiUa8DR2J4Lr1uWcFm+ZH/YnzV5WqgKf4GPyHQ64vVLgzqGIchyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
      <script scr="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
</body>

</html>



