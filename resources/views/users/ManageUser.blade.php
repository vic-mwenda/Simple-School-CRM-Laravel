<x-app-layout>
    <x-slot name="header">
        <h2 class="ml-3 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Users') }}
        </h2>
    </x-slot>

    <div class="container">
     <div class="row">
     <div class="col-lg-3">
         <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
             {{ __('Get to manage and extract relevant data from your user base') }}
         </p>
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
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">
                        <input type="checkbox" name="" id="">
                    </th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                    <th scope="row">
                    <input type="checkbox" name="" id="">
                    </th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @if($user->role == 0)
                            <td>administrator</td>
                        @elseif($user->role == 1)
                            <td>User</td>
                        @else
                            <td>Viewer</td>
                        @endif

                        <td style="width: 1%;">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical" style="font-size: 2rem;"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li> <a class="dropdown-item" href="{{route('usermanage.edit',$user->id)}}"><i class="bi bi-pen" style="font-size: 1rem;padding-right: 5px;"></i>{{ __('Edit') }}</a></li>
                                    <li> <a class="dropdown-item" href="{{route('usermanage.destroy', $user->id)}}}}" data-confirm-delete="true"><i class="bi bi-trash" style="font-size: 1rem;padding-right: 5px;"></i>{{ __('Delete') }}</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
              </table>
      </div>
    </div>


</x-app-layout>

