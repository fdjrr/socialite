<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class AuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::updateOrCreate([
                'google_id' => $googleUser->id,
            ], [
                'name'     => $googleUser->name,
                'email'    => $googleUser->email,
                'password' => Hash::make('password'),
            ]);

            Auth::login($user);

            return redirect()->route('dashboard');
        } catch (Throwable $e) {
            abort(500);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('dashboard');
    }
}
