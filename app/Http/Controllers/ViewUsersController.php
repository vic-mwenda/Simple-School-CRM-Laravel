<?php

namespace App\Http\Controllers;

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
        $users = User::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('users.ManageUser', compact('users'));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',new EmailIsValid, 'unique:'.User::class],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role'=> $request->role,
            'password' => Hash::make('zetech123'),
        ]);

        event(new Registered($user));

        toast('Successfully added user','success');

        return redirect('/usermanage');
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
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request ->input('role');

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
}
