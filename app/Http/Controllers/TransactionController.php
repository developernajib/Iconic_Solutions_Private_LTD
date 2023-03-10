<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use App\Models\SupplyLeft;
use App\Models\TotalSupply;

class TransactionController extends Controller
{
    public function UserTransactionView()
    {
        // getting all transaction total amount
        $gettingSpecificUserTransactionsAmount = 0;
        $gettingSpecificUserTransactions = Transaction::where('from', Auth::user()->email)->get();

        foreach ($gettingSpecificUserTransactions as $gettingSpecificUserTransaction) {
            $gettingSpecificUserTransactionsAmount = $gettingSpecificUserTransaction->amount + $gettingSpecificUserTransactionsAmount;
        };
        
        // getting user email address to find out his/her transactions
        $gettingUser = Auth::user()->id;
        $userTransactions = Transaction::where('from', Auth::user()->email)->get();
        
        return view("user.transactions.view_transaction", compact("userTransactions", "gettingSpecificUserTransactionsAmount"));
        
        
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

        if ((User::where('email', $checkEmail)->exists()) && (Wallet::where('email', $checkEmail)->exists())) {

            // creating a new transaction
            $userTransactions = new Transaction();
            // preventing to transact with own account
            if ($request->to == Auth::user()->email) {
                $notification = array(
                    'message' => "You can't do transactions to your own account.",
                    'alert-type' => 'warning',
                );
                return redirect()->back()->with($notification);
            }
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
                $walletCurrentAmount = User::find(Auth::user()->id)->WalletId;
                $walletCurrentAmount = $walletCurrentAmount->amount;
                $amount = $walletCurrentAmount - ($request->amount);
                $getWallet = Wallet::where('email', Auth::user()->email)->first();
                $getWallet->amount = $amount;
                

                $userTransactions->amount = $request->amount;
                $userTransactions->status = 1;
                

                // receiver wallet amount updating
                $walletUpdate = Wallet::where('email',  $request->to)->first();
                $amount = $walletUpdate->amount + ($request->amount);
                $walletUpdate->amount = $amount;
                


                // update leftover supply amount
                $totalSupply = TotalSupply::find(1)->total_supply;
                $WalletCalcs = Wallet::where('supply_id', 1)->get();
                $supplyLeft = 0;
                
                foreach ($WalletCalcs as $WalletCalc) {
                    $supplyLeft = $WalletCalc->amount + $supplyLeft;
                }
                $totalSupplyLeft = $totalSupply - $supplyLeft;
                $updateSupply = SupplyLeft::find(1);
                $updateSupply->total_supply_left = $totalSupplyLeft;
                $updateSupply->save();
                $supplyLeft = 0;
                $userTransactions->save();
                $getWallet->save();
                $walletUpdate->save();


                $notification = array(
                    'message' => "Transaction completed successfully",
                    'alert-type' => 'success',
                );
                return redirect()->route('user_transaction_view')->with($notification);
            } else {
                $notification = array(
                    'message' => 'Insufficient Balance',
                    'alert-type' => 'warning',
                );


                return redirect()->route('user_transaction_view')->with($notification);
            }
        } else {
            $notification = array(
                'message' => "User wallet doesn't exist. Ask him/her to create a new wallet",
                'alert-type' => 'warning',
            );

            return redirect()->route('user_transaction_create')->with($notification);
        }
    }
}
