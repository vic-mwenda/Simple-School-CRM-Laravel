<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Zetech CRM') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Styles -->

    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
                <div class="container py-5 h-100" style="width:100%;">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;height: 70vh">
                            <div class="row g-0">
                                <div class="col-md-5 col-lg-5 d-flex align-items-center pt-24 pl-8">
                                    <img src="{{ Vite::asset('resources/images/home.svg') }}"
                                         alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                                </div>
                                <div class="col-md-5 col-lg-5 pl-11 ">
                                            <img src="{{ Vite::asset('resources/images/Logo-2.png') }}"
                                            alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;width: 50%" />
                                          <div>
                                              <h2 class="font-semibold pb-6 text-xl text-gray-800 dark:text-gray-200 leading-tight">Customer Relations Manager</h2>

                                              <p class="mt-1 pb-6 text-sm text-gray-600 dark:text-gray-400">
                                                  Unleash the power of seamless connections and elevate your customer experience with our cutting-edge CRM solution. Discover a world where efficiency meets innovation, as we empower your business to thrive in the digital era. Experience the future of customer relationship management, simplified and stylishly designed just for you.
                                              </p>

                                              @if (Route::has('login'))
                                                      @auth
                                                          <a href="{{ url('/dashboard') }}">
                                                              <x-primary-button>{{ __('Continue Journey') }}</x-primary-button>
                                                          </a>
                                                      @else
                                                          <a href="{{ route('login')  }}">
                                                              <x-primary-button>{{ __('Get started now') }}</x-primary-button>
                                                          </a>
                                                      @endif
                                                      @endauth

                                          </div>

                                    </div>
                                </div>
                            </div>
                             <div class="pb-6 ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                                Zetech CRM v<?php echo config('app.version')?> &copy; 20<?php echo date('y') ?>
                             </div>

                        </div>
                    </div>
                </div>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>
