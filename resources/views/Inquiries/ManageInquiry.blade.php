<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Inquiries') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">
                        <input type="checkbox" name="" id="">
                    </th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Course of Interest</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            <input type="checkbox" name="" id="">
                        </th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>

                            <a href="">
                                <x-secondary-button>{{ __('View Inquiry') }}</x-secondary-button>
                            </a>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



</x-app-layout>

