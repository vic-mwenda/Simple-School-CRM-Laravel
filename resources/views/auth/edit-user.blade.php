<x-app-layout>

<section>
<header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Edit this user') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Edit this user in our customer relationship management system') }}
        </p>
</header>

<div class="row p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
  <div class="col-lg-6 max-w-xl">
    <form method="POST" action="{{route('usermanage.update',$user->id)}}">
      @csrf
      <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>

      <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>
        <div class="mt-4">
            <x-input-label for="phone_number" :value="__('Phone Number')" />
            <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" value="{{ $user->phone_number }}" required autocomplete="username" />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="role" :value="__('User Role')" />

            <select name="role" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" id="role">
                <option value="0">Administrator</option>
                <option value="1">Super User</option>
                <option value="2">User</option>
                <option value="3">Viewer</option>
            </select>

            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div class="mt-4">

            <x-input-label for="campus" :value="__('Campus')" />

            <select name="campus" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" id="role">
                <option value="Thika Road Campus">Thika Road Campus</option>
                <option value="Mang'u Campus">Mang'u Campus</option>
                <option value="Nairobi Campus 1">Nairobi Campus(Pioneer Hse)</option>
                <option value="Nairobi Campus 2">Nairobi Campus(Stanchart)</option>
            </select>
        </div>

      <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ml-4">
          {{ __('Update User') }}
        </x-primary-button>
      </div>
    </form>
  </div>

  <div class="hidden lg:block col-lg-4 ml-6 mt-4 d-flex align-items-center justify-items-center">
    <img src="{{ Vite::asset('resources/images/sign_up.svg') }}" alt="Illustration" class="img-fluid">
  </div>
</div>

</section>

</x-app-layout>
