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
              <img class="mt-6" src="{{ Vite::asset('resources/images/Illustration-1.png') }}"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-6 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
                
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                  {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div> 
              <form method="POST" action="{{ route('password.email') }}">
                @csrf

                 <!-- Email Address -->
                 <div>
                      <x-input-label for="email" :value="__('Email')" />
                      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                      <x-input-error :messages="$errors->get('email')" class="mt-2" />
                 </div>

                 <div class="flex items-center justify-end mt-4">
                 <x-primary-button>
                  {{ __('Send Password Reset Link') }}
                 </x-primary-button>
                 </div>
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
