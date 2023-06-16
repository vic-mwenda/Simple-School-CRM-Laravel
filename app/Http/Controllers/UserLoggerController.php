<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user_log;

class UserLoggerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

// ...

    public function index()
    {
        $current_user = Auth::user();

        if ($current_user->role == '0' || $current_user->role == '3') {
            $logs = user_log::paginate(5);
        } elseif ($current_user->role == '1') {
            $campus = $current_user->campus;
            $logs = user_log::whereHas('user', function ($query) use ($campus) {
                $query->where('campus', $campus);
            })->paginate(5);
        } else {
            $logs = user_log::where('id', $current_user->id)->paginate(5);
        }

        return view('logs.app', compact('logs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
