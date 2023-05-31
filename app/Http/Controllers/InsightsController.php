<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inquiries;
use App\Models\user_log;

class InsightsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inquiries= inquiries::all();
        $TotalInquiries=$inquiries->count();
        return view('insights.app',['TotalInquiries'=>$TotalInquiries]);
    }

    /**
     * Show the chart for statistics showing user logs.
     */


    public function showChart()
    {
        $visitorsCount = [];
        $myCat = [];

        $totalDays = cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));

        $monthArray = [];

        for ($i = 1; $i <= $totalDays; $i++) {
            $key = ($i < 10) ? '0' . $i : $i;
            $monthArray[$key] = 0;
            $myCat[] = 'Day ' . $i;
        }

        $results = user_log::select('created_at')->get();

        if ($results->count() > 0) {
            foreach ($results as $row) {
                $userDate = $row->created_at;
                $dateArray = explode('/', $userDate);
                $year = $dateArray[0];
                $currentMonth = date('m', mktime(0, 0, 0, $dateArray[1], 10));

                if ($year == date("Y") && $currentMonth == date("m")) {
                    if (array_key_exists($dateArray[2], $monthArray)) {
                        $monthArray[$dateArray[2]]++;
                    }
                }
            }
        }

        $visitorsCount = array_values($monthArray);

        $currentMonth = date("F");

        return view('insights.app', compact('myCat', 'visitorsCount', 'currentMonth'));
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
