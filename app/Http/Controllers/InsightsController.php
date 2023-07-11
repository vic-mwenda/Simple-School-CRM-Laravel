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
     * method that gets all the insights
     */
    public function getInsights(Request $request)
    {
        $startDate = $request->input('start_date', '2023-01-01');
        $endDate = $request->input('end_date', '2023-12-31');
        
        $pieChartData = $this->generatePieChart($startDate, $endDate);
        $lineGraphData = $this->generateLineGraph($startDate, $endDate);
        $TotalInquiries = $this->getInquiriesCount($startDate, $endDate);
        $SumCustomers = $this->getCustomersCount($startDate, $endDate);

        return view('insights.app', compact('pieChartData', 'lineGraphData','TotalInquiries','SumCustomers'));
    }

    /**
     * Get the total number of inquiries
     */
    public function getInquiriesCount($startDate, $endDate)
    {
    $query = inquiries::query();
    if ($startDate && $endDate) {
        $query->whereBetween('created_at', [$startDate, $endDate]);
    }

    $inquiries = $query->get();

    return $inquiries->count();
    }

      /**
     * Get the total number of inquiries
     */
    public function getCustomersCount($startDate, $endDate)
    {
    $query = customer::query();
    if ($startDate && $endDate) {
        $query->whereBetween('created_at', [$startDate, $endDate]);
    }

    $customers = $query->get();

    return $customers->count();
   }

    

    /**
     * Show the PieChart containing illustration for inquiries-How they heard about us.
     */

    private function generatePieChart($startDate, $endDate){

        $start = $startDate; 
        $end = $endDate;

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
     * Show the lineGraph illustrating statistics for inquiries.
     */

    private function generateLineGraph($startDate, $endDate)
    {
        $start = $startDate; 
        $end = $endDate;

        $results = inquiries::selectRaw('COUNT(*) AS y, DATE(created_at) AS x')
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('x')
            ->orderBy('x', 'asc')
            ->get();

        $LineGraph = new Chart;
        $LineGraph->labels = $results->pluck('x')->toArray();
        $LineGraph->dataset = $results->pluck('y')->toArray();
        $LineGraph->colours = ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56'];

        return $LineGraph;
    }
}
