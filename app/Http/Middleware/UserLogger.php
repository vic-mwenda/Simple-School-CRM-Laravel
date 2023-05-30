<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\user_log;

class UserLogger
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {


            // Get IP address and location details
            $ip_address = $request->ip();
            $geopluginURL = 'http://www.geoplugin.net/php.gp?ip=' . $ip_address;
            $addrDetailsArr = unserialize(file_get_contents($geopluginURL));
            $city = $addrDetailsArr['geoplugin_city'];

            // Get MAC address
            ob_start();
            system('config /all');
            $mycom = ob_get_contents();
            ob_clean();
            $findme = "Physical";
            $pmac = strpos($mycom, $findme);
            $mac = substr($mycom, ($pmac + 36), 17);

            // Insert login information into the database
        if (Auth::check()){

            $user_log = [
                'name' => $request->user()->name,
                'email' => $request->user()->email,
                'ip' => $ip_address,
                'mac' => $mac,
                'city' => $city,
            ];

            user_log::create($user_log);

            return $next($request);

        }
        abort('404','could not insert log');


        }

}
