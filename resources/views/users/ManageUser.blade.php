<x-app-layout>
    <x-slot name="header">
        <h2 class="ml-3 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Users') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Get to manage and extract relevant data from your user base') }}
        </p>
    </x-slot>

    <div class="container">
     <div class="row">
     <div class="col-lg-3">

     </div>
     <div class="col-lg-3"></div>
     <div class="col-lg-3"></div>
        <div class="col-lg-3 pb-4">
        <a href="{{route('usermanage.create')}}">
               <x-primary-button><i class="bi bi-file-earmark-plus" style="font-size: 20px;padding-right: 5px;"></i>{{ __('Add User') }}</x-primary-button>
        </a>
        </div>
     </div>
    </div>

    <div class="card">
        <div class="card-body">
        <form action="{{ route('usermanage.action') }}" method="post" id="bulkActionForm">
                @csrf
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900">
                <div>
                    <select name="bulkAction" id="bulkActionSelect" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                        <option value="">Bulk Actions</option>
                        <option value="delete">Delete</option>
                        <option value="archive">Archive</option>
                    </select>
                    <button type="button" id="applyBulkAction" class="btn btn-primary ml-3">Apply</button>
                </div>
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
                </div>
            </div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 datatable">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            #
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Position
                    </th>
                    <th scope="col" class="px-6 py-3">
                        customers
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-1" name="selectedItems[]" value="{{$user->id}}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="pl-3">
                                <div class="text-base font-semibold">{{ $user->name }}</div>
                                <div class="font-normal text-gray-500">{{ $user->email }}</div>
                            </div>
                        </th>

                        @if($user->role == 0)
                            <td class="px-6 py-4">administrator</td>
                        @elseif($user->role == 1)
                            <td class="px-6 py-4">User</td>
                        @else
                            <td class="px-6 py-4">Viewer</td>
                        @endif
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                 {{$user->customers_count}}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @if($user->last_seen == "logged_in")
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Online
                                @elseif($user->last_seen == "logged_out")
                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> Offline
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical" style="font-size: 2rem;"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li><a class="dropdown-item" href="{{route('usermanage.view',$user->id)}}"><i class="bi bi-eye-fill"></i> View User Details</a></li>
                                    <li><a class="dropdown-item" href=""><i class="bi bi-bullseye"></i> Set Target</a></li>
                                    <li><a class="dropdown-item" href="{{route('usermanage.edit',$user->id)}}"><i class="bi bi-pen-fill"></i> Edit User</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $users->links()}}
        </div>
        </form>
    </div>
    </div>

</x-app-layout>
<script>

    $(document).ready(function() {
        const table = $('.datatable').DataTable({
            paging:false,
            dom: 'lrtip',
            language: {
                info: ''
            }
        });

        // Event handler for the search bar
        $('#table-search').on('keyup', function() {
            table.search(this.value).draw();
        });
    });

</script>
<script>
    document.getElementById('applyBulkAction').addEventListener('click', function() {

        const form = document.getElementById('bulkActionForm');
        form.submit();
    });
</script>


