<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\inquiries;
use Illuminate\Support\Facades\Auth;

class CustomerManagerController extends Controller
{
    public function index()
    {
        $current_user = Auth::user();

        if ($current_user->role == '0' || $current_user->role == '3') {
            $customers = customer::paginate(5);
        } elseif ($current_user->role == '1') {

            $customers = customer::whereHas('user', function ($query) use ($current_user) {
                $query->where('campus', $current_user->campus);
            })->paginate(5);
        } else {
            $customers = customer::where('user_id', $current_user->id)->paginate(5);
        }

        return view('customers.index', compact('customers'));
    }

    public function refresh()
    {
        $externalStudents = Students::all();

        foreach ($externalStudents as $externalStudent) {

            $customer = customer::where('email', $externalStudent->email )->first();

            if ($customer) {

                $customer->status = 'active';
                $customer->save();
            }
        }
        return $this->index();
    }

    function view(customer $customer){
        $inquiries = $customer->inquiries;
        return view('customers.view', ['customers' => $customer],compact('inquiries'));
    }

    public function filter(Request $request)
    {
        $current_user = Auth::user();

        if ($current_user->role == '0' || $current_user->role == '3') {
            $customers = customer::paginate(5);
        } elseif ($current_user->role == '1') {
            $campus = $current_user->campus;
            $customers = customer::whereHas('user', function ($query) use ($campus) {
                $query->where('campus', $campus);
            })->paginate(5);
        } else {
            $currentUserId = Auth::id();
            $customers = customer::where('user_id', $currentUserId)->paginate(5);
        }

        $days = $request->input('days');

        $filteredCustomers = $customers->filter(function ($customer) use ($days) {
            return $customer->created_at->gte(now()->subDays($days));
        });

        // Return the filtered customers
        return response()->json(['customers' => $filteredCustomers]);
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
