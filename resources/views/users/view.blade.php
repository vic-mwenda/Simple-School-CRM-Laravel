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
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">User Details</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="inquiries-tab" data-tabs-target="#inquiries" type="button" role="tab" aria-controls="dashboard" aria-selected="false">User Inquiries</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="customers-tab" data-tabs-target="#customers" type="button" role="tab" aria-controls="dashboard" aria-selected="false">User Customers</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="performance-tab" data-tabs-target="#performance" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Performance</button>
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
                                    Username
                                </th>
                                <td class="px-6 py-4">
                                    {{$userdata->name}}
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    User Email
                                </th>
                                <td class="px-6 py-4">
                                    <a href="mailto:{{$userdata->email}}">{{$userdata->email}}</a>
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    User Phone Number
                                </th>
                                <td class="px-6 py-4">
                                    {{$userdata->phone_number}}
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    User Location
                                </th>
                                <td class="px-6 py-4">
                                    {{$userdata->campus}}
                                </td>
                            </tr>

                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Date of Registration
                                </th>
                                <td class="px-6 py-4">
                                    {{$userdata->created_at}}
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="inquiries" role="tabpanel" aria-labelledby="inquiries-tab">

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
                                    Subject of Inquiry
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Message
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($inquiries->inquiries as $inquiry)

                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        {{$inquiry->created_at}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$userdata->campus}}
                                    </td>
                                    <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                        {{$inquiry->course_name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$inquiry->subject}}
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
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="customers" role="tabpanel" aria-labelledby="customers-tab">

                    <form action="{{ route('customer.action') }}" method="post" id="bulkActionForm">
                        @csrf
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <div class="flex items-center justify-between pb-4">
                                <div class="flex items-center justify-between">

                                    <select name="bulkAction" id="bulkActionSelect" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                        <option value="">Bulk Actions</option>
                                        <option value="delete">Delete</option>
                                        <option value="archive">Archive</option>
                                    </select>
                                    <button type="button" id="applyBulkAction" class="btn btn-primary ml-3">Apply</button>
                                    <a href="{{route('customer.refresh')}}"><button type="button" data-tooltip-target="refresh-btn" class="ml-6 text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                            </svg>
                                        </button></a>
                                    <div id="refresh-btn" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Refresh table
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>

                                <div>
                                    <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                                        <svg class="w-4 h-4 mr-2 text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                        Last 30 days
                                        <svg class="w-3 h-3 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div id="dropdownRadio" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                                        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                                            <li>
                                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <input id="filter-radio-example-1" type="radio" value="1" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="filter-radio-example-1" class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last day</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <input checked="" id="filter-radio-example-2" type="radio" value="7" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="filter-radio-example-2" class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last 7 days</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <input id="filter-radio-example-3" type="radio" value="30" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="filter-radio-example-3" class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last 30 days</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <input id="filter-radio-example-5" type="radio" value="365" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="filter-radio-example-5" class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last year</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <label for="table-search" class="sr-only pt-6">Search</label>
                                <div class="relative mt-1 flex">
                                    <div class="flex items-center pl-3">
                                        <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 flex-1" placeholder="Search for items">
                                    </div>
                                </div>

                            </div>
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 datatable">

                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all-search" name="selectedItems[]" value="" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Customer name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Customer Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        How they heard about us
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="table-body">
                                @foreach($customers->customers as $customer)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-table-search-1" name="selectedItems[]" value="{{$customer->id}}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$customer->name}}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$customer->email}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$customer->phone}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$customer->how_did_you_hear}}
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
                                        <td class="px-6 py-4">
                                            <div class="filter">
                                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical" style="font-size: 2rem;"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                    <li><a class="dropdown-item" href="{{route('customer.view',$customer->id)}}"><i class="bi bi-eye-fill"></i> View Customer Details</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('manageinquiry.download',$customer->id)}}"><i class="bi bi-box-arrow-down"></i> Download Customer Details</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="performance" role="tabpanel" aria-labelledby="performance-tab">

                        <div class="row">
                                <div class="row">

                                    <div class="grid mb-8 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 md:mb-12 md:grid-cols-2">
                                        <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-tl-lg md:border-r dark:bg-gray-800 dark:border-gray-700">
                                            <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Inquiries Handled</h3>
                                                <p class="my-4">Number of inquiries that our user lodged</p>
                                            </blockquote>
                                            <figcaption class="flex items-center justify-center space-x-3">
                                                <dt class="mb-2 text-3xl font-extrabold">{{$TotalInquiries}}</dt>
                                            </figcaption>
                                        </figure>
                                        <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-tr-lg dark:bg-gray-800 dark:border-gray-700">
                                            <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Customers Handled</h3>
                                                <p class="my-4">Number of customers that our user handled</p>
                                            </blockquote>
                                            <figcaption class="flex items-center justify-center space-x-3">
                                                <dt class="mb-2 text-3xl font-extrabold">{{$totalCustomers}}</dt>
                                            </figcaption>
                                        </figure>
                                        <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-bl-lg md:border-b-0 md:border-r dark:bg-gray-800 dark:border-gray-700">
                                            <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Conversion Rate</h3>
                                                <p class="my-4">Understand the rate of conversion for our users</p>
                                            </blockquote>
                                            <figcaption class="flex items-center justify-center space-x-3">
                                                <dt class="mb-2 text-3xl font-extrabold">{{$ConversionRate}}%</dt>
                                            </figcaption>
                                            <div class="flex items-center w-50 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                                <div class="bg-black h-2.5 rounded-full" style="width:{{$ConversionRate}}%"></div>
                                            </div>
                                        </figure>
                                        <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-gray-200 rounded-b-lg md:rounded-br-lg dark:bg-gray-800 dark:border-gray-700">
                                            <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Goals</h3>
                                                <p class="my-4">This is the target achievement rate set by our system</p>
                                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Target:{{$TargetRate->rate}}%</h3>

                                            </blockquote>
                                            <figcaption class="flex items-center justify-center space-x-3">
                                                <dt class="mb-2 text-3xl font-extrabold">{{$TotalConversions}}/ {{$TargetCustomers}}</dt>
                                            </figcaption>

                                            exit<div class="w-50 bg-gray-200 rounded-full dark:bg-gray-700">
                                                <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: {{$ConversionRate}}%"> {{$ConversionRate}}</div>
                                            </div>
                                        </figure>
                                    </div>

                                </div>
                                    <!-- Line Graph-->
                               <div class="row">
                                    <div class="col-12">
                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li class="dropdown-header text-start">
                                                    <h6>Filter</h6>
                                                </li>

                                                <li><a class="dropdown-item" href="#">Today</a></li>
                                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                                <li><a class="dropdown-item" href="#">This Year</a></li>
                                            </ul>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">Inquiry Report <span>/Today</span></h5>
                                            <canvas id="userChart" class="rounded shadow"></canvas>
                                        </div>
                                    </div>
                               </div>
                        </div>

                    </>
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

                </div>

            </div>

        </div>
    </section>
</x-app-layout>
