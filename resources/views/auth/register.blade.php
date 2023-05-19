<x-guest-layout>

  <section class="vh-150">
  <div class="container py-5 h-100" style="width:100%;">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-6 d-flex justify-content-center align-items-center">
              <img class="mt-6" src="{{ Vite::asset('resources/images/Illustration-1.png') }}"
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

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign up into our CRM</h5>

                  <div class="form-outline mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" style="border-radius:8px;" class="form-control form-control-lg" placeholder="enter your email" required/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </div>

                  <div class="form-outline mb-4">
                  <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" style="border-radius:8px;" class="form-control form-control-lg" placeholder="enter your password" required/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  </div>

                  <div class="pt-1 mb-4">
                    <x-primary-button style="text-align:center;">
                             {{ __('Register') }}
                    </x-primary-button>
                  </div>
                   <!-- Remember Me -->
                  <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                      <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                      <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                  </div>

                  <a class="small text-muted" href="#!">Forgot password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Already Registered? <a href="{{route('login')}}"
                      style="color: #393f81;">Log in here</a></p>
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

<!-- <form method="POST" action="{{ route('register') }}">
        @csrf -->

        <!-- Name -->
        <!-- <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div> -->

        <!-- Email Address -->
        <!-- <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div> -->

        <!-- Password -->
        <!-- <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div> -->

        <!-- Confirm Password -->
        <!-- <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div> -->
<!-- <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form> -->