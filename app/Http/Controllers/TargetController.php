<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\user_targets;

class TargetController extends Controller
{

    public function view(User $user){
        return view('users.target',['user' => $user]);
    }
    /**
     * Store a new target in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $validatedData = $request->validate([
            'rate' => 'required|numeric|min:0|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $target= [
            'user_id' => $request->input('user_id'),
            'rate' =>$validatedData['rate'] ,
            'start_date' =>  $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],

        ];
        user_targets::create($target);

        toast('User Target has been set successfully.', 'success');

        return redirect()->route('usermanage.index');
    }

}
