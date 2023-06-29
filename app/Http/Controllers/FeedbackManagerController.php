<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\inquiries;
use App\Models\customer;
use Illuminate\Support\Facades\Auth;

class FeedbackManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(customer $customer)
    {
        $inquiries= $customer->inquiries;
        $user = $customer->user;
        return view('Inquiries.feedback',compact('inquiries','user','customer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'feedback' => ['required', 'string', 'max:255'],
            'inquiry' => 'required',
        ]);



            $feedback = [
                'feedback' =>  $request->input('feedback'),
                'inquiry_id' => $request->input('inquiry'),
                'customer_id'=> $request->input('customer_id'),
            ];
            Feedback::create($feedback);

        toast('Customer feedback has been saved successfully.', 'success');

        return redirect()->route('customers.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
