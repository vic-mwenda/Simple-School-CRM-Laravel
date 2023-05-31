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
                                    <form method="POST" action="{{ route('password.set.store',$user = Auth::user()->id) }}">
                                        @csrf

                                        <!-- Password -->
                                        <div class="mt-4">
                                            <x-input-label for="password" :value="__('Password')" />
                                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                            <div id="password-feedback">
                                                <ul>
                                                    <li id="password-length" class="invalid"><i class="bi bi-dot"></i>At least 8 characters</li>
                                                    <li id="password-upper-lower" class="invalid"><i class="bi bi-dot"></i>Upper and lowercase letters</li>
                                                    <li id="password-number" class="invalid"><i class="bi bi-dot"></i>At least one number</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="mt-4">
                                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                          type="password"
                                                          name="password_confirmation" required autocomplete="new-password" />
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            <x-primary-button>
                                                {{ __('Set Password') }}
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
