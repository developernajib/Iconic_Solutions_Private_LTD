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
        $userTransactions = new Transaction();

        $userTransactions->from = Auth::user()->email;
        $userTransactions->to = $request->to;
        dd(Wallet::find(Auth::user()->id));
        // if(){}
        $userTransactions->status = 1;
    }
}
