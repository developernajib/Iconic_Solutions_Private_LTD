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
        $userTransactions = Transaction::where('');
        return view("user.transactions.view_transaction", compact("userTransactions"));
    }

    public function UserTransactionCreate()
    {
        $userTransactions = Transaction::all();

        return view("user.transactions.create_transaction", compact("userTransactions"));
    }

    public function UserTransactionCStore(Request $request)
    {
        // email & amount check
        $checkEmail = $request->to;
        $gettingWalletAmount = User::find(Auth::user()->id)->WalletId->amount;

        if (User::where('email', $checkEmail)->exists()) {

            // creating a new transaction
            $userTransactions = new Transaction();
            $userTransactions->from = Auth::user()->email;
            $userTransactions->to = $request->to;

            // validating the transaction amount
            if ($gettingWalletAmount >= ($request->amount)) {

                if ($request->amount <= 0) {
                    $notification = array(
                        'message' => "Please enter a valid amount",
                        'alert-type' => 'warning',
                    );
                    return redirect()->back()->with($notification);
                }

                // sender wallet amount updating
                $update_amount = Wallet::find(Auth::user()->id);
                $walletCurrentAmount = User::find(Auth::user()->id)->WalletId->amount;
                $amount = $walletCurrentAmount - ($request->amount);
                $walletCurrentAmount = $amount;

                $userTransactions->amount = $request->amount;
                $userTransactions->status = 1;

                // receiver wallet amount updating
                $walletUpdate = Wallet::where('email',  $request->to)->first();
                $amount = $walletUpdate->amount + ($request->amount);
                $walletUpdate->amount = $amount;


                $update_amount->save();
                $walletUpdate->save();
                $userTransactions->save();

                $notification = array(
                    'message' => "Transaction completed successfully",
                    'alert-type' => 'success',
                );
                return redirect()->route('user_transaction_view')->with($notification);
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
