<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="vh-150">
  <div class="container py-5 h-100" style="width:100%;">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-6 d-flex justify-content-center align-items-center">
              <img class="hidden lg:block mt-6" src="{{ Vite::asset('resources/images/Illustration-1.png') }}"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-6 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
              <form method="POST" action="{{ route('login') }}">
                @csrf

                  <div class="d-flex align-items-center">
                         <a href="/">
                            <x-application-logo class="img-fluid h-10" />
                         </a>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into our CRM</h5>

                  <div class="form-outline mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email"  name="email" style="border-radius:8px;" class="form-control form-control-lg" placeholder="enter your email" required/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </div>

                  <div class="form-outline mb-4">
                  <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" style="border-radius:8px;" class="form-control form-control-lg" placeholder="enter your password" required/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  </div>

                  <div class="pt-1 mb-4">
                    <x-primary-button style="text-align:center;">
                             {{ __('Log in') }}
                    </x-primary-button>
                  </div>
                   <!-- Remember Me -->
                  <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                      <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                      <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                  </div>

                  <a class="small text-muted" href="{{route('password.request')}}">Forgot password?</a>
                  <br>
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                </form>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



</x-guest-layout>
