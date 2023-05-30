<x-app-layout>

    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Create an Inquiry') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Lodge inquiries from customers into our system') }}
            </p>
        </header>

        <div class="row p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="col-lg-6 max-w-xl">
                <form method="post" action="{{ route('manageinquiry.store') }}">
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Full Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="Enter contact's full names" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" placeholder="Enter contact's email address" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="phone" :value="__('Phone Number')" />
                        <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" placeholder="Enter contact's phone number" required autocomplete="phone" />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="course" :value="__('Course of interest')" />
                        <x-text-input id="course" class="block mt-1 w-full" type="text" name="course" :value="old('course')" placeholder="Enter inquired course" required autocomplete="course" />
                        <x-input-error :messages="$errors->get('course')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="source" :value="__('How did they hear about us?')" />
                        <select name="source" class="w-100 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" id="role">
                            <option value="website">Website</option>
                            <option value="instagram">Instagram</option>
                            <option value="facebook">Facebook</option>
                            <option value="twitter">Twitter</option>
                            <option value="youtube">Youtube</option>
                            <option value="word of mouth">Word of mouth</option>
                        </select>
                        <x-input-error :messages="$errors->get('source')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="message" :value="__('additional information')" />
                        <x-text-area id="message" style="height:100px;"  class="block mt-1 w-full" type="text" name="message" :value="old('message')" placeholder="any additional information given by the contact" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                    </div>
                    <input type="hidden" value="{{ Auth::user()->name }}: {{Auth::user()->email}}" name="logger">


                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-4">
                            {{ __('Submit Inquiry') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>

            <div class="hidden lg:block col-lg-4 ml-6 mt-4 d-flex align-items-center justify-items-center">
                <img src="{{ Vite::asset('resources/images/inquiry.svg') }}" alt="Illustration" class="img-fluid">
            </div>
        </div>

    </section>

</x-app-layout>
