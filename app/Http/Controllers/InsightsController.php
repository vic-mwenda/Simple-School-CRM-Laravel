<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use App\Models\inquiries;
use App\Models\user_log;
use App\Models\Chart;
use App\Models\PieChart;

class InsightsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inquiries= inquiries::all();
        return $inquiries->count();
    }
    /**
     * Show the Pie_chart containing statistics for inquiries-How they heard about us.
     */

    public function PieChart(){
        $start = '2023-01-01'; // Replace with your desired start date
        $end = '2023-12-31'; // Replace with your desired end date

        $results = customer::selectRaw('how_did_you_hear, COUNT(*) AS total')
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('how_did_you_hear')
            ->get();

        $totalCustomers = $results->sum('total');

        $Piechart = new PieChart;
        $Piechart->labels = $results->pluck('how_did_you_hear')->toArray();
        $Piechart->dataset = $results->map(function ($item) use ($totalCustomers) {
            return round(($item->total / $totalCustomers) * 100, 2);
        })->toArray();
        $Piechart->colours = ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56','red','blue','yellow']; // You can generate random colours here if needed

        return $Piechart;
    }

    /**
     * Show the chart containing statistics for inquiries.
     */
    function Show()
    {
        $TotalInquiries=$this->index();

        $start = '2023-01-01'; // To be replaced with the desired start date gotten from UI
        $end = '2023-12-31'; // To be replaced with the desired start date gotten from UI

        $results = inquiries::selectRaw('COUNT(*) AS y, DATE(created_at) AS x')
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('x')
            ->orderBy('x', 'asc')
            ->get();

        // Prepare the data for returning with the view
        $chart = new Chart;
        $chart->labels = $results->pluck('x')->toArray();
        $chart->dataset = $results->pluck('y')->toArray();
        $chart->colours = ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56'];
        $PieChart = $this->PieChart();

        return view('insights.app', compact('chart','TotalInquiries','PieChart'));


    }
}
