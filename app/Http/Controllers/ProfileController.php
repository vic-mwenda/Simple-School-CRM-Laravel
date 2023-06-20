<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Chart;
use App\Models\customer;
use App\Models\inquiries;
use App\Models\User;
use App\Models\user_targets;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
//    function getTargetRateForUser($userId)
//    {
//        $target = user_targets::where('user_id', $userId)->first();
//
//        if (!$target) {
//            return null;
//        }
//
//        $predefinedRate = $target->rate;
//
//        $totalCustomers = customer::where('user_id', $userId)->count();
//        return ceil(($predefinedRate / 100) * $totalCustomers);
//    }
//
//    /**
//     * Calculate the conversion rate for our users
//     */
//    public function calculateConversionRate($userId)
//    {
//        $totalCustomers = customer::where('user_id', $userId)->count();
//
//        $convertedCustomers = customer::where('user_id', $userId)
//            ->where('status', 'active')
//            ->count();
//
//        if ($totalCustomers > 0) {
//            $conversionRate = round($convertedCustomers / $totalCustomers* 100,1) ;
//        } else {
//            $conversionRate = 0;
//        }
//
//        return $conversionRate;
//    }
//
//    /**
//     * Show all the data that exists for a single user.
//     */
//    public function view(User $user)
//    {
//        $userdata = User::find($user->id);
//        $inquiries = User::with('inquiries')->find($user->id);
//        $customers = User::with('customers')->find($user->id);
//        $TotalInquiries = inquiries::where('user_id', $user->id)->count();
//        $totalCustomers = customer::where('user_id', $user->id)->count();
//        $TotalConversions = customer::where('user_id', $user->id)
//            ->where('status', 'active')
//            ->count();
//
//        $ConversionRate = $this->calculateConversionRate($user->id);
//        $TargetCustomers = $this->getTargetRateForUser($user->id);
//        $TargetRate = user_targets::where('user_id',$user->id)->select('rate')->first();
//
//
//        $start = '2023-01-01'; // To be replaced with the desired start date gotten from UI
//        $end = '2023-12-31'; // To be replaced with the desired start date gotten from UI
//
//        $results = inquiries::selectRaw('COUNT(*) AS y, DATE(created_at) AS x')
//            ->where('user_id', $user->id) // Replace $userId with the user's ID
//            ->whereBetween('created_at', [$start, $end])
//            ->groupBy('x')
//            ->orderBy('x', 'asc')
//            ->get();
//
//        $chart = new Chart;
//        $chart->labels = $results->pluck('x')->toArray();
//        $chart->dataset = $results->pluck('y')->toArray();
//        $chart->colours = ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56'];
//
//        return (compact('userdata','TargetRate','TargetCustomers','totalCustomers','customers','ConversionRate','inquiries','chart','TotalInquiries','TotalConversions'));
//    }

}
