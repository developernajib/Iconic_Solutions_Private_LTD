<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Wallet;
use App\Models\SupportedCurrency;

class UserController extends Controller
{
    public function UserDashboard()
    {
        $supportedCurrencies = SupportedCurrency::all();
        if (Auth::user()->wallet->id == null) {
            $wallet = Wallet::where('user_id', Auth::user()->id)->first();
            $walletBalance = $wallet->amount;
        } else {
            $walletBalance = "You didn't create a wallet.";
        }
        $notificationSuccess = array(
            'message' => 'Login successful',
            'alert-type' => 'success',
        );

        return view('dashboard', compact("supportedCurrencies", "walletBalance"))->with($notificationSuccess);
    }

    public function CurrencyConversionStore(Request $request)
    {
        $wallet = Wallet::where('user_id', Auth::user()->id)->first();
        $walletBalance = $wallet->amount;

        $currency = $request->currency;
        $curl = curl_init();
        $API_KEY = env('CURRENCY_CONVERTER_API');
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/convert?to=$currency&from=USD&amount=$walletBalance",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: text/plain",
                "apikey: $API_KEY"
            ),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $json = $response;
        $data = json_decode($json);
        $conversionAmount = $data->result;

        return redirect()->back()->with("alert", "$currency amount is: " . number_format($conversionAmount, 2) . " " . $currency);
    }

    public function UserCreateWallet()
    {
        return view('user.create_wallet');
    }

    public function UserWalletStore()
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
}
