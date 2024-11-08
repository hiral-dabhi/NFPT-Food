<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $userData = User::where('email', $request->email)->first();

        if ($userData && $userData->userRole->first()->guard_name) {
            $guard = $userData->userRole->first()->guard_name;

            if ($guard == 'customer') {
                if (Auth::guard('customer')->attempt($credentials)) {
                    $user = Auth::guard('customer')->user();
                    if ($user && $user->hasRole('Client/Customer')) {
                        return redirect()->back()->with('success', 'Logged in successfully!');
                    } else {
                        Auth::guard('customer')->logout();
                        return back()->with('error', 'Access denied. Only customers can log in.!');
                    }
                } else {
                    // return back()->withErrors(['email' => 'Invalid credentials. Please try again.'])->withInput();
                    return back()->with('error', 'Invalid credentials. Please try again.');
                }
            } elseif ($guard == 'web') {
                if (Auth::guard('web')->attempt($credentials)) {
                    return redirect()->route('home')->with('success', 'Logged in successfully!');
                }
            }
        } else {
            return back()->with('error', 'Invalid credentials. Please try again.');
            // return back()->withErrors(['email' => 'Invalid credentials. Please try again.'])->withInput();
        }
    }

    public function logout()
    {
        if (Auth::guard('customer')->check()) {
            Auth::guard('customer')->logout();
            return redirect()->route('front.home')->with('success', 'Logged out successfully as customer!');
        } elseif (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
            return redirect()->route('front.home')->with('success', 'Logged out successfully as admin!');
        }

        return redirect()->route('front.home')->with('error', 'No active session found.');

        // Auth::guard('customer')->logout();
        // return redirect()->route('front.home')->with('success', 'Logged out successfully!');
    }
}
