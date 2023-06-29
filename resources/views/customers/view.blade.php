<x-app-layout>

    <section>
        <header class="d-flex align-items-center">
            <h2 class="text-lg fw-bolder font-medium text-gray-900 dark:text-gray-100">
            </h2>
        </header>

        <div class="row p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Customer Details</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Customer Inquiries</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="feedback-tab" data-tabs-target="#feedback" type="button" role="tab" aria-controls="feedback" aria-selected="false">Feedback</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Status</button>
                    </li>
                </ul>
            </div>
            <div id="myTabContent">
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Attributes
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Values
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Customer name
                                </th>
                                <td class="px-6 py-4">
                                    {{$customers->name}}
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Customer Email
                                </th>
                                <td class="px-6 py-4">
                                    <a href="mailto:{{$customers->email}}">{{$customers->email}}</a>
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Customer Phone
                                </th>
                                <td class="px-6 py-4">
                                    {{$customers->phone}}
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Customer Gender
                                </th>
                                <td class="px-6 py-4">
                                    {{$customers->gender}}
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    How did they hear about us
                                </th>
                                <td class="px-6 py-4">
                                    {{$customers->how_did_you_hear}}
                                </td>
                            </tr>

                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Date of Registration
                                </th>
                                <td class="px-6 py-4">
                                    {{$customers->created_at}}
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Inquiry Time
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Inquiry Location
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Course Inquired
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Mode of Inquiry
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Subject of Inquiry
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($inquiries as $inquiry)

                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                    {{$inquiry->created_at}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$user->campus}}
                                </td>
                                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                    {{$inquiry->course_name}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$inquiry->mode_of_inquiry}}
                                </td>
                                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                    {{$inquiry->message}}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="feedback" role="tabpanel" aria-labelledby="feedback-tab">

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Date of Feedback
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Subject of Inquiry
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Course Customer Had Inquired
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Feedback Message
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($feedbacks as $feedback)

                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                    {{$feedback->created_at}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$feedback->inquiry?->message}}
                                </td>
                                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                    {{$feedback->inquiry?->course_name}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$feedback->feedback}}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">

                    <ol class="items-center sm:flex">
                        @if($customers->status =="pending" )
                            <li class="relative mb-6 sm:mb-0">
                                <div class="flex items-center">
                                    <div class="z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                                        <svg aria-hidden="true" class="w-3 h-3 text-blue-800 dark:text-blue-300" fill="red" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <div class="hidden sm:flex w-full bg-gray-200 h-0.5 dark:bg-gray-700"></div>
                                </div>
                                <div class="mt-3 sm:pr-8">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pending Feedback</h3>
                                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">customer created on {{$customers->created_at}}</time>
                                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">The customer only made an inquiry but is yet to apply for course</p>
                                </div>
                            </li>
                        @elseif($customers->status =="active")
                            <li class="relative mb-6 sm:mb-0">
                                <div class="flex items-center">
                                    <div class="z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                                        <svg aria-hidden="true" class="w-3 h-3 text-blue-800 dark:text-blue-300" fill="red" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <div class="hidden sm:flex w-full bg-gray-200 h-0.5 dark:bg-gray-700"></div>
                                </div>
                                <div class="mt-3 sm:pr-8">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pending Feedback</h3>
                                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">customer created on {{$customers->created_at}}</time>
                                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">The customer only made an inquiry but is yet to apply for course</p>
                                </div>
                            </li>
                            <li class="relative mb-6 sm:mb-0">
                                <div class="flex items-center">
                                    <div class="z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                                        <svg aria-hidden="true" class="w-3 h-3 text-blue-800 dark:text-blue-300" fill="yellow" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <div class="hidden sm:flex w-full bg-gray-200 h-0.5 dark:bg-gray-700"></div>
                                </div>
                                <div class="mt-3 sm:pr-8">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Applied on sajili</h3>
                                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">customer updated at {{$customers->updated_at}}</time>
                                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">The customer has made an application on sajili.</p>
                                </div>
                            </li>
                        @endif
                    </ol>

                </div>

            </div>

        </div>
    </section>
</x-app-layout>
