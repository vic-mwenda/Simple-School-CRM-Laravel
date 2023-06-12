<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\inquiries;

class CustomerManagerController extends Controller
{
    function index(){
        $customers =customer::paginate(5);
        return view('customers.index',compact('customers'));
    }

    public function getUserCustomers()
    {
        $user = auth()->user();

        $customers = $user->customers()->paginate(5);

        return view('customers.index', ['customers' => $customers]);
    }

    function view(customer $customer){
        $inquiries = $customer->inquiries;
        return view('customers.view', ['customers' => $customer],compact('inquiries'));
    }
    public function filter(Request $request){

        $days = $request->input('days');
        $customers = customer::whereDate('created_at', '>=', now()->subDays($days))
            ->get();

        // Return the updated table data as a JSON response
        return response()->json(['customers' => $customers]);
    }
    /**
     * Handle bulk actions
     */
    public function action(Request $request)
    {
        $action = $request->input('bulkAction');
        $selectedItems = $request->input('selectedItems');

        if ($action === 'delete') {
            customer::whereIn('id', $selectedItems)->delete();
        }

        return $this->getUserCustomers();
    }
}
