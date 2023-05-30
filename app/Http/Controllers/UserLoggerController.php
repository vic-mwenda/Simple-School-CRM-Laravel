<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_log;

class UserLoggerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logs= user_log::paginate(5);
        return view('logs.app',compact('logs'));
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
