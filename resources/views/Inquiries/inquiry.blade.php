<x-app-layout>

    <section>
        <header class="d-flex align-items-center">
            <h2 class="text-lg fw-bolder font-medium text-gray-900 dark:text-gray-100">
                {{$inquiries->name}}'s {{ __('Inquiry') }}
            </h2>
        </header>

        <div class="row p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Attribute</th>
                            <th scope="col">Response</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td><i style="color:blue;" class="bi bi-person"></i> {{$inquiries->name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><i style="color: #6776f4" class="bi bi-envelope"></i> {{$inquiries->email}}</td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td><i style="color: #3e4f6f" class="bi bi-telephone-fill"></i> {{$inquiries->phone}}</td>
                            </tr>
                            <tr>
                                <td>Course of interest</td>
                                <td><i style="color: #012970" class="bi bi-book-fill"></i> {{$inquiries->interest}}</td>
                            </tr>
                            <tr>
                                <td>How did they know about us</td>
                                @if($inquiries->source == 'youtube')
                                <td><i style="color: red" class="bi bi-youtube"></i> Youtube</td>
                                @elseif($inquiries->source == 'twitter')
                                 <td><i style="color: blue" class="bi bi-twitter"></i> Twitter</td>
                                @elseif($inquiries->source == 'facebook')
                                <td><i style="color: blue" class="bi bi-facebook"></i> Facebook</td>
                                @elseif($inquiries->source == 'instagram')
                                 <td><i style="color: orange" class="bi bi-instagram"></i> Instagram</td>
                                @else($inquiries->source == 'website')
                                 <td><i style="color: blue" class="bi bi-globe"></i> Website</td>
                                @endif
                            </tr>
                            <tr>
                                <td>Additional information</td>
                                <td><i style="color: #012970" class="bi bi-journal-plus"></i> {{$inquiries->message}}</td>
                            </tr>
                            <tr>
                                <td>Date of Inquiry</td>
                                <td><i style="color: #2c384e" class="bi bi-calendar-check-fill"></i> {{$inquiries->created_at}}</td>
                            </tr>
                            <tr>
                                <td>Creator of Inquiry</td>
                                <td><i style="color: #012970" class="bi bi-person-fill-lock"></i>{{$inquiries->logger}}</td>
                            </tr>
                        </tbody>
                    </table>

            </div>
    </section>
</x-app-layout>
