<?php

namespace app\Http\Controllers\admin;

use App\Console\encription;
use App\Models\bill_payment;
use App\Models\bo;
use App\Models\deposit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController
{
public function index()
{
    $all=deposit::paginate(50);

    return view('finddeposite', compact('all'));
}
    public function finduser(Request $request)
    {
        $input = $request->all();
        $user_name = encription::encryptdata($input['user_name']);
        $phoneno = $input['phoneno'];
        $reference = $input['reference'];
        $amount = $input['amount'];
        $date = $input['date'];

        // Instantiates a Query object
        $query = deposit::Where('username', 'LIKE', "%$user_name%")
            ->orWhere('payment_ref', 'LIKE', "%$reference%")
            ->orWhere('date', 'LIKE', "%$date%")
            ->OrderBy('id', 'desc')
            ->limit(1000)
            ->get();
        if(!$query){
            Alert::warning('Admin', 'details does not exist');
            return back();
        }
        $cquery = deposit::Where('username','LIKE',  "%$user_name%")
            ->orWhere('payment_ref', 'LIKE', "%$reference%")
            ->orWhere('date', 'LIKE', "%$date%")
            ->count();

        return view('finddeposite', ['datas' => $query, 'count' => $cquery, 'result' => true]);
    }
    public function in(Request $request)
    {
        $today = Carbon::now()->format('Y-m-d');


        $data =deposit::orderBy('id', 'desc')->paginate(100);
        $tt = deposit::count();
        $ft = deposit::where([['date', 'like', Carbon::now()->format('Y-m-d') . '%']])->count();
        $st = deposit::where([['date', 'like', Carbon::now()->subDay()->format('Y-m-d') . '%']])->count();
        $rt = deposit::where([['date', 'like', Carbon::now()->subDays(2)->format('Y-m-d') . '%']])->count();
        $amount=deposit::sum('amount');
        $am=deposit::where([['date', 'LIKE', '%' . $today . '%']])->sum('amount');
        $am1=deposit::where([['date', 'like', '%'. Carbon::now()->subDay()->format('y-m-d'). '%']])->sum('amount');
        $am2=deposit::where([['date', 'like', '%'. Carbon::now()->subDays(2)->format('y-m-d'). '%']])->sum('amount');


        return view('deposits', ['data' => $data,'amount'=>$amount, 'am'=>$am, 'am1'=>$am1, 'am2'=>$am2,  'tt' => $tt, 'ft' => $ft, 'st' => $st, 'rt' => $rt]);

    }
    public function bill()
    {
        $today = Carbon::now()->format('Y-m-d');


        $data =bill_payment::orderBy('id', 'desc')->paginate(100);
        $tt = bill_payment::count();
        $ft = bill_payment::where([['timestamp', 'like', Carbon::now()->format('Y-m-d') . '%']])->count();
        $st = bill_payment::where([['timestamp', 'like', Carbon::now()->subDay()->format('Y-m-d') . '%']])->count();
        $rt = bill_payment::where([['timestamp', 'like', Carbon::now()->subDays(2)->format('Y-m-d') . '%']])->count();
        $amount=bill_payment::sum('amount');
        $am=bill_payment::where([['timestamp', 'LIKE', '%' . $today . '%']])->sum('amount');
        $am1=bill_payment::where([['timestamp', 'like', '%'. Carbon::now()->subDay()->format('y-m-d'). '%']])->sum('amount');
        $am2=bill_payment::where([['timestamp', 'like', '%'. Carbon::now()->subDays(2)->format('y-m-d'). '%']])->sum('amount');

        return view('bills', ['data' => $data,'amount'=>$amount, 'am'=>$am, 'am1'=>$am1, 'am2'=>$am2,  'tt' => $tt, 'ft' => $ft, 'st' => $st, 'rt' => $rt]);

    }




}
