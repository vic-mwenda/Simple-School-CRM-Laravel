<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
class GoogleAuthController extends Controller
{
    public function signInwithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackToGoogle()
    {

        $user = Socialite::driver('google')->user();

        $finduser = User::where('email', $user->email)->first();

        if($finduser){

                Auth::login($finduser);

                return redirect('/dashboard');
            } else {

                 toast('User does not exist','warning');

                 return redirect('login');
        }
    }
}
