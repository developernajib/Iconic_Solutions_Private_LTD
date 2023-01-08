<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Wallet;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        event(new Registered($user));

        Auth::login($user);
        
        
        $userIdFind = Auth::user()->id;
        
        Wallet::create([
            'user_id' => $userIdFind,
            'email' => $request->email,
            'amount' => 0,
            'supply_id' => 1,
        ]);
        
        $wallet = Wallet::where('user_id', Auth::user()->id)->first();
        $update_wallet_id = User::find(Auth::user()->id);
        $update_wallet_id->wallet_id = $wallet->id;
        $update_wallet_id->save();

        return redirect(RouteServiceProvider::HOME);
    }
}
