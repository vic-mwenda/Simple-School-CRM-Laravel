<x-app-layout>
    <x-slot name="header">
        <h2 class="ml-3 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage our Inquiries') }}
        </h2>
    </x-slot>

   <div class="container">
     <div class="row">
     <div class="col-lg-3">
         <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
             {{ __('Get to view and extract relevant data from inquiries') }}
         </p>
     </div>
     <div class="col-lg-3"></div>
     <div class="col-lg-3">
         <a href="{{route('manageinquiry.print')}}">
             <x-primary-button><i class="bi bi-printer" style="font-size:20px;padding-right: 5px;"></i> {{ __('Print All Inquiries') }}</x-primary-button>
         </a>
     </div>
        <div class="col-lg-3 pb-4">
        <a href="{{route('manageinquiry.create')}}">
               <x-primary-button><i class="bi bi-pencil-square" style="font-size:20px;padding-right: 5px;"></i>{{ __('Create Inquiry') }}</x-primary-button>
        </a>
        </div>
     </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-responsive-sm table-striped datatable">
                <thead>
                <tr>

                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Course of Interest</th>
                    <th scope="col">Heard of us through</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($inquiries as $inquiry)
                    <tr>
                        <td>{{$inquiry->name}}</td>
                        <td>{{$inquiry->email}}</td>
                        <td>{{$inquiry->interest}}</td>
                        <td>{{$inquiry->source}}</td>
                        <td class="w-2">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical" style="font-size: 2rem;"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li><a class="dropdown-item" href="{{route('manageinquiry.view',$inquiry->id)}}"><i class="bi bi-eye-fill"></i> View Inquiry</a></li>
                                    <li><a class="dropdown-item" href="{{ route('manageinquiry.download',$inquiry->id)}}"><i class="bi bi-box-arrow-down"></i> Download Inquiry</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $inquiries->links() }}
        </div>
    </div>



</x-app-layout>

