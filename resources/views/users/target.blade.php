<x-app-layout>
<div class="container-fluid flex justify-content-center">
    <div class="card">
        <div class="card-body">
              <form class="space-y-6" action="{{route('targets.store')}}" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">

        <label for="rate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Target Conversion Rate</label><output for="rate" id="rate-output"></output>
        <input id="rate" type="range" name="rate" min="0" max="100" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
        <x-input-error :messages="$errors->get('rate')" class="mt-2" />
        <script>
            const rateInput = document.getElementById('rate');
            const rateOutput = document.getElementById('rate-output');

            rateInput.addEventListener('input', function() {
                rateOutput.value = rateInput.value + '%';
            });
        </script>
        <label for="start_date">Start Date:</label>
        <input class="form-control" type="date" name="start_date" id="start_date">
        <x-input-error :messages="$errors->get('start_date')" class="mt-2" />

        <label for="end_date">End Date:</label>
        <input class="form-control" type="date" name="end_date" id="end_date">
        <x-input-error :messages="$errors->get('end_date')" class="mt-2" />

        <button type="submit" class="w-full mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Set Target</button>

    </form>
        </div>
    </div>
</div>
</x-app-layout>
