<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use App\Models\customer;
use App\Models\inquiries;
use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Rules\EmailIsValid;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class ViewUsersController extends Controller
{
    /**
     * Display a listing of all the users
     */
    public function index()
    {
        $users = User::withCount('customers')->paginate(5);
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('users.ManageUser', compact('users'));
    }

    /**
     * Show all the data that exists for a single user.
     */
    public function view(User $user)
    {
        $userdata = User::find($user->id);
        $inquiries = User::with('inquiries')->find($user->id);
        $customers = User::with('customers')->find($user->id);
        $TotalInquiries = inquiries::where('user_id', $user->id)->count();
        $TotalConversions = customer::where('user_id', $user->id)
            ->where('status', 'active')
            ->count();


        $start = '2023-01-01'; // To be replaced with the desired start date gotten from UI
        $end = '2023-12-31'; // To be replaced with the desired start date gotten from UI

        $results = inquiries::selectRaw('COUNT(*) AS y, DATE(created_at) AS x')
            ->where('user_id', $user->id) // Replace $userId with the user's ID
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('x')
            ->orderBy('x', 'asc')
            ->get();

        $chart = new Chart;
        $chart->labels = $results->pluck('x')->toArray();
        $chart->dataset = $results->pluck('y')->toArray();
        $chart->colours = ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56'];

        return view('users.view',compact('userdata','customers','inquiries','chart','TotalInquiries','TotalConversions'));
    }
    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('auth.register');

    }

    /**
     * Store a newly created user.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255','unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255',new EmailIsValid, 'unique:'.User::class],
            'phone_number' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10','unique:'.User::class],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'role'=> $request->role,
            'campus'=> $request->campus,
            'password' => Hash::make('zetech123'),
        ]);

        event(new Registered($user));

        toast('Successfully added user','success');
        return redirect()->route('usermanage.index');
    }

    /**
     * Show the form for editing our user.
     */
    public function edit(User $user)
    {
        return view('auth.edit-user', ['user' => $user]);

    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email',new EmailIsValid,'max:255'],
            'phone_number' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request ->input('role');
        $user->campus = $request->input('campus');

        $user->save();
        toast('Successfully updated user','success');

        return redirect('/usermanage');

    }

    /**
     * Delete the user's account.
     */
    public function destroy(User $user)
    {
    // Delete the user
        $user->delete();

    // Redirect to the users index page or show a success message
        toast('Successfully deleted user','success');

        return redirect('/usermanage');
    }

    public function action(Request $request)
    {
        $action = $request->input('bulkAction');
        $selectedItems = $request->input('selectedItems');

        if ($action === 'delete') {
            User::whereIn('id', $selectedItems)->delete();
        }

        return $this->index();
    }
}
