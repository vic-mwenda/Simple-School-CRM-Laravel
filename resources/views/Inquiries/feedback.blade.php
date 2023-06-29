<x-app-layout>

    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Create Feedback') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Collect feedback from customer inquiries into our system') }}
            </p>
        </header>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <form method="post" action="{{route("feedback.store")}}">
                @csrf

                <div class="d-flex justify-content-center bg-[#012970] align-items-center">
                    <h3 style="color: white;padding-top: 7px;font-size: 22px;font-weight: bold;">Feedback</h3>
                </div>
                <input type="text" name="customer_id" value="{{$customer->id}}" hidden="">
                <div class="row container ">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label style="font-weight: bold;padding-top: 10px;" for="Inquiry">Customer Inquiry<i style="font-size: 7px;float: right;color: red" class="bi bi-asterisk"></i></label>
                            <select name="inquiry" class="form-control" id="inquiry">
                                @foreach($inquiries as $inquiry)
                                <option value="{{$inquiry->id}}">{{$inquiry->course_name}} at {{$user->campus}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('inquiry')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label style="font-weight: bold;padding-top: 10px;" for="Feedback"><i style="font-size: 7px;float: right;color: red" class="bi bi-asterisk"></i>Feedback Message</label>
                            <textarea name="feedback" id="Feedback" class="form-control"></textarea>
                            <x-input-error :messages="$errors->get('feedback')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center pt-6">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit <i style="font-size: 15px;color: white;" class="bi bi-send-plus"></i></button>
                    <button type="reset" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Reset <i style="font-size: 15px;color: white;" class="bi bi-arrow-repeat"></i></button>
                </div>
            </form>
        </div>
    </section>

</x-app-layout>
