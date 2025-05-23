<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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

        if (Auth::user()->role === 'admin') {

            toastr()
            ->closeButton(true)
            ->timeOut(3000) // 3 second
            ->success('log in successfully');

            return to_route('admin.dashboard');
        }

        // return redirect()->intended(route('dashboard', absolute: false));
        if (Auth::user()->role === 'user') {
             toastr()
            ->closeButton(true)
            ->timeOut(3000) // 3 second
            ->success('log in successfully');
            return to_route('customer.dashboard');
        }
        return back();
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
