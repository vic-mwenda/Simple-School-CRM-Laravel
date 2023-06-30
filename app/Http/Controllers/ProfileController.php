<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Chart;
use App\Models\customer;
use App\Models\inquiries;
use App\Models\User;
use App\Models\user_targets;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update or create the user's avatar image 
     */

    public function upload(Request $request)
    {
    $image = $request->file('image');
    $userId = Auth::user()->id;
   
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
    ]);

    $user = User::findOrFail($userId);
    if ($user->image_path) {
        Storage::disk('public')->delete($user->image_path);
    }

    $filename = $userId . '.' . $image->getClientOriginalExtension();

    $image->storeAs('images', $filename, 'public');

    $user->image_path = 'images/' . $filename;
    $user->save();

    toast('Successfully added avatar','success');

    return redirect()->route('profile.edit');    
    }

}
