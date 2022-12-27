<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\Wallet;
use App\Models\Transaction;
use App\Models\TotalSupply;
use App\Models\SupplyLeft;

class AdminController extends Controller
{
    // Admin Login Controller
    public function AdminLogin()
    {
        return view("admin.auth.admin_login");
    }

    public function AdminLoginStore(Request $request)
    {
        $check = $request->all();

        $notificationSuccess = array(
            'message' => "Admin Login Successfully",
            'alert-type' => 'success'
        );

        if (Auth::guard("admin")->attempt(["email" => $check["email"], "password" => $check["password"], "secret_code" => $check["secret_code"]])) {
            return redirect()->route("admin_dashboard")->with($notificationSuccess);
        } else {
            return back()->with("alert", "Email, Password or Secret Code is invalid.");
        }

        if (!(Auth::guard("admin")->attempt(["email" => $check["email"]]))) {
            return back()->with("alert", "Email doesn't exists on our database.");
        } else {
            return back()->with("alert", "Email or Password is invalid.");
        }
    }

    public function AdminLogout()
    {
        Auth::guard("admin")->logout();
        return redirect()->route("admin_login")->with("alert", "Admin Logout successfully.");
    }

    public function AdminRegister()
    {
        return view("admin.auth.admin_register");
    }

    public function AdminRegisterStore(Request $request)
    {
        Admin::insert([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "secret_code" => "Test",
            "created_at" => Carbon::now(),
        ]);

        return redirect()->route("admin_login")->with("alert", "Admin Created Successfully");
    }
    // End Admin Login Controller


    // Admin Dashboard Controller
    public function AdminDashboard()
    {
        return view("admin.dashboard.index");
    }

    public function UserData()
    {
        $usersData = User::all();
        return view("admin.dashboard.user_data", compact("usersData"));
    }

    public function TotalSupply()
    {
        $totalSupply = TotalSupply::find(1);
        $leftOverSupply = SupplyLeft::find(1);
        return view("admin.dashboard.total_supply", compact("totalSupply", "leftOverSupply"));
    }

    public function TransactionView()
    {
        $userTransactions = Transaction::all();
        return view("admin.dashboard.transaction", compact("userTransactions"));
    }
    public function WalletDeposit()
    {
        return view("admin.dashboard.deposit");
    }

    public function WalletDepositStore(Request $request)
    {
        // email & amount check
        $checkEmail = $request->to;
        $gettingWalletAmount = Wallet::where('email', $checkEmail)->first();

        if (User::where('email', $checkEmail)->exists()) {
            if ((SupplyLeft::find(1)->total_supply_left) >= 0) {

                // creating a new transaction
                $AdminDeposit = new Transaction();
                $AdminDeposit->from = Admin::find(1)->email;
                $AdminDeposit->to = $gettingWalletAmount->email;


                // validating the transaction amount
                $gettingLeftOverSupply = SupplyLeft::find(1)->total_supply_left;
                if ($gettingLeftOverSupply >= ($request->amount)) {

                    if ($request->amount <= 0) {
                        $notification = array(
                            'message' => "Please enter a valid amount",
                            'alert-type' => 'warning',
                        );
                        return redirect()->back()->with($notification);
                    }

                    $AdminDeposit->amount = $request->amount;
                    $gettingWalletAmount->save();

                    // updating user wallet with balance
                    $walletUpdate = Wallet::where('email',  $request->to)->first();
                    $totalAmount = ($gettingWalletAmount->amount) + ($request->amount);
                    $walletUpdate->amount = $totalAmount;
                    $walletUpdate->save();

                    // Transaction part
                    $AdminDeposit->status = 1;
                    $AdminDeposit->save();


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



                    $notification = array(
                        'message' => "Transaction completed successfully",
                        'alert-type' => 'success',
                    );
                    return redirect()->route('admin_transaction_view')->with($notification);
                } else {
                    $notification = array(
                        'message' => "User doesn't exist",
                        'alert-type' => 'warning',
                    );

                    return redirect()->route('admin_transaction_view')->with($notification);
                }
            } else {

                $notification = array(
                    'message' => 'Insufficient Balance',
                    'alert-type' => 'warning',
                );


                return redirect()->route('admin_transaction_view')->with($notification);
            }
        } else {

            $notification = array(
                'message' => "User's wallet does not exist",
                'alert-type' => 'warning',
            );


            return redirect()->route('admin_transaction_view')->with($notification);
        }
    }
}
