<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Wallet;

class TransactionController extends Controller
{
    public function UserTransactionView()
    {
        $userTransactions = Transaction::all();
        return view("user.transactions.view_transaction", compact("userTransactions"));
    }

    public function UserTransactionCreate()
    {
        $userTransactions = Transaction::all();

        return view("user.transactions.create_transaction", compact("userTransactions"));
    }

    public function UserTransactionCStore(Request $request)
    {
        $checkEmail = $request->to;
        $gettingWalletAmount = User::find(Auth::user()->id)->WalletId->amount;

        if (User::where('email', $checkEmail)->exists()) {

            $userTransactions = new Transaction();
            $userTransactions->from = Auth::user()->email;
            $userTransactions->to = $request->to;

            if ($gettingWalletAmount >= ($request->amount)) {
                $userTransactions->amount = $request->amount;
                $userTransactions->status = 1;
                $userTransactions->save();
            } else {
                $notification = array(
                    'message' => "User doesn't exist",
                    'alert-type' => 'warning',
                );

                return redirect()->route('user_transaction_view')->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Insufficient Balance',
                'alert-type' => 'warning',
            );

            return redirect()->route('user_transaction_view')->with($notification);
        }
    }
}
