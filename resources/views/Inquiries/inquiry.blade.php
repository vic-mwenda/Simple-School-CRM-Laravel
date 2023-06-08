<x-app-layout>

    <section>
        <header class="d-flex align-items-center">
            <h2 class="text-lg fw-bolder font-medium text-gray-900 dark:text-gray-100">
                {{$inquiry->customer?->name}}'s {{ __('Inquiry') }}
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
                                <td><i style="color:blue;" class="bi bi-person"></i> {{$inquiry->customer?->name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><i style="color: #6776f4" class="bi bi-envelope"></i> {{$inquiry->customer?->email}}</td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td><i style="color: #3e4f6f" class="bi bi-telephone-fill"></i> {{$inquiry->customer?->phone}}</td>
                            </tr>
                            <tr>
                                <td>Course of interest</td>
                                <td><i style="color: #012970" class="bi bi-book-fill"></i> {{$inquiry->course_name}}</td>
                            </tr>
                            <tr>
                                <td>How did they know about us</td>
                                <td>{{$inquiry->customer?->how_did_you_hear}}</td>
                            </tr>
                            <tr>
                                <td>Subject</td>
                                <td><i style="color: #012970" class="bi bi-journal-plus"></i> {{$inquiry->subject}}</td>
                            </tr>
                            <tr>
                                <td>Additional information</td>
                                <td><i style="color: #012970" class="bi bi-journal-plus"></i> {{$inquiry->message}}</td>
                            </tr>
                            <tr>
                                <td>Creator of Inquiry</td>
                                <td><i style="color: #012970" class="bi bi-person-fill-lock"></i>{{$inquiry->user?->name}}</td>
                            </tr>
                            <tr>
                                <td>Date of Inquiry</td>
                                <td><i style="color: #2c384e" class="bi bi-calendar-check-fill"></i> {{$inquiry->created_at}}</td>
                            </tr>
                        </tbody>
                    </table>

            </div>
    </section>
</x-app-layout>
