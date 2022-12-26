<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Wallet;

class UserController extends Controller
{
    public function UserDashboard()
    {
        $wallet_id = User::find(11)->WalletConnection;

        $notificationSuccess = array(
            'message' => 'User Login Successfully',
            'alert-type' => 'success',
        );

        return view('dashboard')->with($notificationSuccess);
    }

    public function UserCreateWallet()
    {
        // dd(Auth::user());
        return view('user.create_wallet');
    }

    public function UserWalletStore(Request $request)
    {
        $notification = array(
            'message' => 'Wallet already exists.',
            'alert-type' => 'warning',
        );

        $wallet = new Wallet();
        $wallet->user_id = Auth::user()->id;

        if (!Auth::user()->id == Wallet::find($wallet->user_id)) {
            return redirect()->back()->with($notification);
        } else {
            $wallet->email = Auth::user()->email;
            $wallet->save();
            $update_wallet_id = User::find(Auth::user()->id);
            $update_wallet_id->wallet_id = $wallet->id;
            $update_wallet_id->save();

            $notificationSuccess = array(
                'message' => 'Wallet already exists.',
                'alert-type' => 'warning',
            );

            return redirect()->route('dashboard')->with($notificationSuccess);
        }
    }


    public function ViewTransaction()
    {
        echo "viewTransaction";
    }

    public function CreateTransaction()
    {
        echo "createTransaction";
    }
}