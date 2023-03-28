<?php

namespace App\Http\Controllers;

use App\Charts\UserChart;
use App\Console\encription;
use App\Mail\login;
use App\Models\airtimecon;
use App\Models\big;
use App\Models\bill_payment;
use App\Models\charge;
use App\Models\charp;
use App\Mail\Emailpass;
use App\Models\easy;
use App\Models\Giveaway;
use App\Models\Messages;
use App\Models\profit;
use App\Models\profit1;
use App\Models\refer;
use App\Models\safe_lock;
use App\Models\server;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\wallet;
use App\Models\bo;
use App\Models\data;
use App\Models\deposit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use mysql_xdevapi\Exception;
use RealRashid\SweetAlert\Facades\Alert;


class AuthController
{
    public function customLogin(Request $request)
    {


        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);



        $user = User::where('email', encription::encryptdata($request->email))
            ->where('password', $request->password)
            ->first();
        if (Auth::user()){
            Alert::success('Dashboard', 'Login Successfully');
            return redirect()->intended('dashboard')
                ->with('success', 'Welcome back '.encription::decryptdata($user->name));
        }
        if(!isset($user)){
            Alert::error('Credentials does not match', 'Kindly check your password & email');
            return back();
        }elseif ($user->role != "admin"){
            Alert::warning('Something Wrong', 'You are not register as admin');
            return back();
        } else {

            Auth::login($user);

            Alert::success('Dashboard', 'Login Successfully');
            return redirect()->intended('dashboard')
                ->with('success', 'Welcome back '.encription::decryptdata($user->name));
        }


    }
    public function charges(Request  $request)
    {
        if(Auth::check()){
            $user = User::find($request->user()->id);
            $bill = charge::where('username', $request->user()->username)->get();


            return view('charges', compact('user', 'bill'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function dashboard(Request $request)
    {
        if (Auth()->user()->role=="admin") {
            $user = User::where('username', Auth::user()->username)->where('role', 'admin')->first();
            $me = Messages::where('status', 1)->first();
            $refer = refer::get();
            $totalrefer = 0;
            foreach ($refer as $de) {
                $totalrefer += $de->amount;

            }
            $count = refer::count();
            $alluser = User::count();
            $profit = profit::get();
            $profit1 = profit1::sum('amount');
            $totalprofit = 0;
            foreach ($profit as $pro) {
                $totalprofit += $pro->amount;
            }
            $wallet = wallet::get();
            $totalwallet=0;
            foreach ($wallet as $wall) {
                $totalwallet += (int)$wall->balance;

            }
            $deposite = deposit::get();
            $totaldeposite = 0;
            foreach ($deposite as $depo) {
                $totaldeposite += (int)$depo->amount;

            }
            $charge=charge::get();
            $totalcharge= 0;
            foreach ($charge as $ch) {
                $totalcharge += (int)$ch->amount;

            }
            $bil2 = bill_payment::get();
            $bill = 0;
            $lock=0;
            foreach ($bil2 as $bill1) {
                $bill += (int)$bill1->amount;
                $lock += (int)$bill1->discountamoun;

            }
            $resellerURL = 'https://integration.mcd.5starcompany.com.ng/api/reseller/';

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $resellerURL . 'me',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('service' => 'balance'),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: mcd_key_75rq4][oyfu545eyuriup1q2yue4poxe3jfd'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
//                                                        return $response;
            $data = json_decode($response, true);
            $success = $data["success"];
            $tran = $data["data"]["wallet"];
            $pa = $data["data"]["commission"];

            $today = Carbon::now()->format('Y-m-d');


            $data['bill'] = bill_payment::where([['status', '=', '1'], ['timestamp', 'LIKE', $today . '%']])->count();
            $data['deposit'] = deposit::where([['status', '=', '1'], ['date', 'LIKE', $today . '%']])->count();
            $data['user'] = User::where([['created_at', 'LIKE', $today . '%']])->count();
            $data['nou'] = wallet::where([['updated_at', 'LIKE', $today . '%']])->count();
            $data['sum_deposits'] = deposit::where([['date', 'LIKE', '%' . $today . '%']])->sum('amount');
            $data['sum_bill'] = bill_payment::where([['timestamp', 'LIKE', '%' . $today . '%']])->sum('amount');
            $mo=safe_lock::where('status', '1')->sum('balance');

            return view('dashboard', compact('user', 'wallet',   'mo', 'profit1', 'data', 'lock', 'totalcharge',  'tran', 'alluser', 'totaldeposite', 'totalwallet', 'deposite', 'me', 'bil2', 'bill', 'totalrefer', 'totalprofit',  'count'));

        }
        return redirect("login")->with('status', 'You are not allowed to access');

    }

}
