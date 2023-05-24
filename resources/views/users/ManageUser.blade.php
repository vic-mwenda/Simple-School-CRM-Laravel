<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage users') }}
        </h2>
    </x-slot>

    <div class="container">
     <div class="row">
     <div class="col-lg-3"></div>
     <div class="col-lg-3"></div>
     <div class="col-lg-3"></div>
        <div class="col-lg-3 pb-4">
        <a href="{{route('usermanage.create')}}">
               <x-primary-button>{{ __('Add User') }}</x-primary-button>
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

                        <td>

                        <a href="{{route('usermanage.edit',$user->id)}}">
                        <x-secondary-button>{{ __('Edit') }}</x-secondary-button>
                        </a>

                        </td>
                        <td>
                        <form action="{{route('usermanage.destroy', $user->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <x-danger-button>{{ __('Delete') }}</x-danger-button>
                        </form>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
              </table>
      </div>
    </div>


</x-app-layout>

