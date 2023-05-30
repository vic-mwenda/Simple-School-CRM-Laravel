<x-app-layout>
    <x-slot name="header">
        <h2 class="ml-3 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Logs') }}
        </h2>
        <p class="ml-3 mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Get to monitor and extract relevant data from logs') }}
        </p>
    </x-slot>


    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">IP Address</th>
                    <th scope="col">Logged in at</th>
                </tr>
                </thead>
                <tbody>
                @foreach($logs as $log)
                    <tr>
                        <td>{{ $log->name }}</td>
                        <td>{{ $log->email }}</td>
                        <td>{{ $log->ip }}</td>
                        <td>{{ $log->created_at }}</td>
                    </tr>

                @endforeach

                </tbody>
            </table>
            {{ $logs->links() }}
        </div>
    </div>


</x-app-layout>

