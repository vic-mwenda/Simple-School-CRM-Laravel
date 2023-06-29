<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use App\Models\customer;
use App\Models\inquiries;
use App\Models\User;
use App\Models\user_targets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource for our inquiries table.
     */
     public function index()
    {
        $current_user=Auth::user();
        if ($current_user->role == '0'||$current_user->role == '3'){
        $inquiries = inquiries::with('customer', 'user')->paginate(5);
        }elseif ($current_user->role == '1'){
            $campus = $current_user->campus;
            $inquiries = inquiries::whereHas('user', function ($query) use ($campus) {
                $query->where('campus', $campus);
            })->with('customer', 'user')->paginate(5);
        }else{
            $currentUserId = Auth::id();

            $inquiries = inquiries::whereHas('user', function ($query) use ($currentUserId) {
                $query->where('id', $currentUserId);
            })->with('customer', 'user')->paginate(5);
        }
        $customers = $this->Customerindex();
        $insights = $this->insights();
        $chart=$this->insights();
        $TotalInquiries=$this->TotalInquiries();
        $totalCustomers=$this->TotalCustomers();


        return view('dashboard',['inquiries' => $inquiries],compact('customers','insights','TotalInquiries','totalCustomers','chart'));
    }

    public function Customerindex()
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

        return $customers;
    }

    public function insights()
    {
        $userid=Auth::id();

        $start = '2023-01-01'; // To be replaced with the desired start date gotten from UI
        $end = '2023-12-31'; // To be replaced with the desired start date gotten from UI

        $results = inquiries::selectRaw('COUNT(*) AS y, DATE(created_at) AS x')
            ->where('user_id', $userid) // Replace $userId with the user's ID
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('x')
            ->orderBy('x', 'asc')
            ->get();

        $chart = new Chart;
        $chart->labels = $results->pluck('x')->toArray();
        $chart->dataset = $results->pluck('y')->toArray();
        $chart->colours = ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56'];

        return $chart;
    }

    public function TotalCustomers(){
        $userid=Auth::id();
        return customer::where('user_id', $userid)->count();
    }

    public function TotalInquiries(){
        $userid=Auth::id();
        return inquiries::where('user_id', $userid)->count();
    }

}
