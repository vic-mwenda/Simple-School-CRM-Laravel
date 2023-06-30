<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Insights') }}
        </h2>
        <form action="{{route("insights.index")}}" method="get">
           <div class="row">
            <div class="col-lg-5 mb-2">
                <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Start Date">
            </div>
            <div class="col-lg-5 mb-2">
                <input type="date" class="form-control" name="end_date" id="end_date" placeholder="End Date">
            </div>
            <div class="col-lg-2">
                 <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 ">Submit <i style="font-size: 15px;color: white;" class="bi bi-send-plus"></i></button>
            </div>
           </div>
        </form>
    </x-slot>

    <section class="section dashboard">
        <div class="row">
        <div class="col-lg-8 scrollable-card">

            <div class="row">
                <!-- Inquiries Card -->
                    <div class="col-xxl-6 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Inquiries</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-info-circle"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$TotalInquiries}}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xxl-6 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">Customers <span></span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$SumCustomers}}</h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <!-- Reports -->
                    <div class="col-12">
                    

                        <div class="card-body">
                            <h5 class="card-title">Inquiry Report</h5>
                             <canvas id="userChart" class="rounded shadow"></canvas>
                        </div>
                    </div>
                </div>
            <div class="row pt-12">

            <div class="col-lg-6">
               <div class="row">
               
                <div class="card-body">
                    <h5 class="card-title">Sources Report <span>/Today</span></h5>
                        <canvas id="userPieChart" style="height: 400px;padding-top: 30px"></canvas>
                    </div>
                </div>
            </div>
             <div class="col-lg-6 pt-24">
                 <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                     <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#4154f1" class="bi bi-question-square-fill" viewBox="0 0 16 16">
                         <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.496 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927z"/>
                     </svg>
                     <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">How did our clients hear about us?</h5>
                     <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Achieve a better view of how our customers got to hear about our services</p>

                 </div>

                 <div class="max-w-sm mt-6 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                     <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#4154f1" class="bi bi-question-square-fill" viewBox="0 0 16 16">
                         <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.496 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927z"/>
                     </svg>
                     <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Basis:</h5>
                     <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">These insights are based on your most recent Inquires made</p>

                 </div>

             </div>
        </div>
        </div>

        <div class="col-lg-4 fixed-card">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><span>Page Contents</span></h5>

                        <div class="activity">

                            <div class="activity-item d-flex">
                                <div class="activite-label">Overall</div>
                                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                <div class="activity-content">
                                    <a href="#userChart">Get insights into our inquiries</a>
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">Sources</div>
                                <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                                <div class="activity-content">
                                    <a href="#userPieChart">View how our inquirers heard about us</a>
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">Courses</div>
                                <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                <div class="activity-content">
                                    Understand which courses are most heard about
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">Gender</div>
                                <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                                <div class="activity-content">
                                    Acquire a better perspective of the gender demographics on our inquiriers with their respective courses
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">Age</div>
                                <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                                <div class="activity-content">
                                    Get a clearer view of our age demographics versus our courses over a lengthy time period
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">Extract</div>
                                <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                                <div class="activity-content">
                                    Extract data acquired from this page and employ it in your documentation
                                </div>
                            </div><!-- End activity item-->

                        </div>

                    </div>
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
                labels:  {!!json_encode($lineGraphData->labels)!!} ,
                datasets: [
                    {
                        label: 'Inquiries',
                        data:  {!! json_encode($lineGraphData->dataset)!!} ,
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
    <script>

        // Get the canvas element
        var ctx = document.getElementById('userPieChart').getContext('2d');

        // Create the pie chart
        var pieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: {!!json_encode($pieChartData->labels)!!},
                datasets: [{
                    data:{!!json_encode($pieChartData->dataset)!!},
                    backgroundColor:['#ff6384', '#36a2eb', '#cc65fe', '#ffce56','red','blue','yellow']

                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'top'
                }
            }
        });
    </script>


</x-app-layout>

