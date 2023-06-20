<x-app-layout>
    <x-slot name="header">
        <h2 class="ml-10 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage our Customers') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Get to view and extract relevant customer information') }}
        </p>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-lg-3">

            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
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

                        <a href="{{route('export.customers')}}"><button type="button" data-tooltip-target="print-btn" class="ml-6 text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500">
                                <i class="bi bi-printer" style="font-size:20px;padding-right: 5px;"></i>
                        </button></a>
                        <div id="print-btn" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Print
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
                    @foreach($customers as $customer)
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
                {{ $customers->links()}}
            </div>
        </form>
        </div>
    </div>



</x-app-layout>

@if($customerCount > 0)
<script>
    const filterRadioInputs = document.querySelectorAll('input[name="filter-radio"]');

    filterRadioInputs.forEach(input => {
        input.addEventListener('change', () => {
            const days = input.value;
            updateTable(days);
        });
    });

    function updateTable(days) {
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });
        $.ajax({
            url: "{{url('customers/update-table')}}",
            type: 'POST',
            data: { days: days },
            dataType: 'json',
            success: function(response) {
                // Update the table content with the received data
                if (response.customers.length > 0) {
                    var tableBody = '';
                    $.each(response.customers, function(index, customer) {
                        tableBody += `
      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
        <td class="w-4 p-4">
          <div class="flex items-center">
            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
          </div>
        </td>
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
          ${customer.name}
        </th>
        <td class="px-6 py-4">
          ${customer.email}
        </td>
        <td class="px-6 py-4">
          ${customer.phone}
        </td>
        <td class="px-6 py-4">
          ${customer.how_did_you_hear}
        </td>
        <td class="px-6 py-4">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical" style="font-size: 2rem;"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li><a class="dropdown-item" href="{{route('customer.view',$customer->id)}}"><i class="bi bi-eye-fill"></i> View Inquiry</a></li>
              <li><a class="dropdown-item" href=""><i class="bi bi-box-arrow-down"></i> Download Inquiry</a></li>
            </ul>
          </div>
        </td>
      </tr>
    `;
                    });
                    $('#table-body').html(tableBody);
                } else {
                    // Handle case when no inquiries are found
                    $('#table-body').html('<tr><td colspan="3">No inquiries found</td></tr>');
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    }

</script>
@endif
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

