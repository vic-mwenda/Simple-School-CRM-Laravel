<x-app-layout>
    <section class="section dashboard">
        <div class="container">
            <img class="h-auto w-lg rounded-lg" style="height: 50vh;" src="{{ Vite::asset('resources/images/CRM_hero.svg') }}" alt="image description">

            <div class="row">
                <div class="row">
                    <div class="col-lg-4">
                        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight pt-12"> Manage your inquiries</h2>
                        <h3 class="text-sm text-gray-600 dark:text-gray-400">Get to view and extract relevant data from inquiries</h3>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Message
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Mode of Inquiry
                                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Course of Interest
                                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                    </div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($inquiries as $inquiry)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$inquiry->message}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$inquiry->mode_of_inquiry}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$inquiry->course_name}}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="{{route('manageinquiry.index')}}" class="w-100 inline-flex items-center">
                        <button type="button" class="w-100 text-gray-900 bg-white border hover:bg-gray-300 border-gray-300 focus:outline-none  focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                View all inquiries
                        </button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#4154f1" class="bi bi-question-square-fill" viewBox="0 0 16 16">
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.496 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927z"/>
                        </svg>
                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Need to add an inquiry?</h5>
                        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Go get started on our seamless inquiry management system:</p>
                        <a href="{{route('manageinquiry.create')}}" class="inline-flex items-center text-blue-600 hover:underline">
                            Create Inquiry
                            <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"></path><path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"></path></svg>
                        </a>
                    </div>


                </div>
            </div>

            <div class="row">
                <div class="row">
                    <div class="col-lg-4">
                        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight pt-12"> Manage your Customers</h2>
                        <h3 class="text-sm text-gray-600 dark:text-gray-400">See your customers and extract required data from your customer base</h3>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Customer name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Customer Email
                                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Status
                                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                    </div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$customer->name}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$customer->email}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            @if($customer->status =="pending" )
                                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> pending
                                            @elseif($customer->status =="active")
                                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> active
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="{{route('customers.index')}}" class="w-100 inline-flex items-center">
                            <button type="button" class="w-100 text-gray-900 bg-white border hover:bg-gray-300 border-gray-300 focus:outline-none  focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                View all our customers
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="row">
                    <div class="col-lg-4">
                        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight pt-12"> Insights overview
                        </h2>
                        <h3 class="text-sm text-gray-600 dark:text-gray-400">Review your performance and more</h3>
                    </div>
                </div>

                    <div class="md:bg-white grid grid-cols-2 md:grid-cols-3 gap-4 pt-6 border border-gray-200 rounded-lg shadow-sm">
                        <div>
                            <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-tl-lg md:border-r dark:bg-gray-800 dark:border-gray-700">
                                <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Inquiries Handled</h3>
                                    <p class="my-4">Number of inquiries that you have lodged</p>
                                </blockquote>
                                <figcaption class="flex items-center justify-center space-x-3">
                                    <dt class="mb-2 text-3xl font-extrabold">{{$TotalInquiries}}</dt>
                                </figcaption>
                            </figure>
                        </div>
                        <div>
                            <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-tr-lg dark:bg-gray-800 dark:border-gray-700">
                                <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Customers Handled</h3>
                                    <p class="my-4">Number of customers that you have handled</p>
                                </blockquote>
                                <figcaption class="flex items-center justify-center space-x-3">
                                    <dt class="mb-2 text-3xl font-extrabold">{{$totalCustomers}}</dt>
                                </figcaption>
                            </figure>
                        </div>
                        <div>
                            <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-tr-lg dark:bg-gray-800 dark:border-gray-700">
                                <div class="col-12">
                                    <div class="card-body">
                                        <canvas id="userChart" class="rounded shadow"></canvas>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <a href="{{route('insights.index')}}" class="w-100 inline-flex items-center">
                            <button type="button" class="w-100 text-gray-900 bg-white border hover:bg-gray-300 border-gray-300 focus:outline-none  focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                View Insights
                            </button>
                        </a>
                    </div>

            </div>

            <div class="row">
                <div class="row">
                    <div class="col-lg-4">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight pt-12"> What's new?</h2>
                        <h3 class="text-sm text-gray-600 dark:text-gray-400">View our changelog over time</h3>
                    </div>
                </div>
                <div class="container card">
                <ol class="relative border-l border-gray-200 dark:border-gray-700 pt-6">
                    <li class="mb-10 ml-6">
                             <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                              <svg aria-hidden="true" class="w-3 h-3 text-blue-800 dark:text-blue-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                         </span>
                        <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">Zetech CRM v1.0.2 <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ml-3">Latest</span></h3>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released on May 30th, 2023</time>
                        <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Introduced realtime reports to actively monitor the rate of customer inquiry</p>
                    </li>
                    <li class="mb-10 ml-6">
                           <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                           <svg aria-hidden="true" class="w-3 h-3 text-blue-800 dark:text-blue-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                           </span>
                           <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">Zetech CRM v1.0.1</h3>
                           <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released on May 23rd, 2023</time>
                           <p class="text-base font-normal text-gray-500 dark:text-gray-400">Search filters available for all our tables in the system</p>
                    </li>
                    <li class="ml-6">
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg aria-hidden="true" class="w-3 h-3 text-blue-800 dark:text-blue-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </span>
                        <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">Zetech CRM v1.0.0</h3>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released on May 20th, 2023</time>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Released advanced authentication features to safely login and secure user accounts</p>
                    </li>
                </ol>
                </div>


            </div>
        </div>

    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>

        var ctx = document.getElementById('userChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels:  {!!json_encode($chart->labels)!!} ,
                datasets: [
                    {
                        label: 'Inquiries',
                        data:  {!! json_encode($chart->dataset)!!} ,
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    },
                ]
            },

            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function(value) {if (value % 1 === 0) {return value;}}
                        },
                        scaleLabel: {
                            display: true
                        }
                    }]
                },
                tooltip: {
                    enabled: true
                },
                legend: {
                    labels: {
                        // This more specific font property overrides the global property
                        fontColor: '#122C4B',
                        fontFamily: "'Muli', sans-serif",
                        padding: 25,
                        boxWidth: 25,
                        fontSize: 14,
                    }
                },
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 0,
                        bottom: 20
                    }
                }
            }
        });
    </script>

</x-app-layout>

