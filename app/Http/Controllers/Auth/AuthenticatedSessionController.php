<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\user_log;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();


        // Get IP address and location details
        $ip_address = $_SERVER['REMOTE_ADDR'];
//        $geopluginURL = 'http://www.geoplugin.net/php.gp?ip='. $ip_address;
//        $geopluginData = file_get_contents($geopluginURL);
//        $addrDetailsArr = unserialize($geopluginData);
//        $city = $addrDetailsArr['geoplugin_city'];

        // Get MAC address
        ob_start();
        system('ipconfig /all');
        $mycom = ob_get_contents();
        ob_clean();
        $findme = "Physical";
        $pmac = strpos($mycom, $findme);
        $mac = substr($mycom, ($pmac + 36), 17);

        // Insert login information into the database

            $user_log = [
                'name' => $request->user()->name,
                'email' => $request->user()->email,
                'ip' => $ip_address,
                'mac' => $mac,
//                'city' => $city,
            ];

            user_log::create($user_log);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
