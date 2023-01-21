<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

use App\Models\CurrencyHistory;
use App\Models\CurrencyConvert;
use App\Models\CommissionRate;

class CurrencyController extends Controller {

    public function csv_import(Request $request){

        $validator = Validator::make($request->all(),[
            'csv_file' => 'required|mimes:csv'
        ]);

        if($validator->fails()){
            $messages = $validator->messages();
            return Redirect::back()->withErrors($validator);
        }

        $path = $request->file('csv_file')->getRealPath();
        $data = array_map('str_getcsv', file($path));

        CurrencyConvert::truncate();

        foreach($data as $value){
            $today = date('Y-m-d');
            $day = $value[0];

            $rate = CurrencyHistory::where('date', $today)->where('currency', $value[5])->first();
            $percentage = CommissionRate::where('client_type', $value[2])->where('operation_type', $value[3])->first();

            $total = $value[4] * $rate->rate;
            $commission = $total * $percentage->percentage;
            $subTotal = $total - $commission;


            if($today==$day){
                CurrencyConvert::create([
                    'date'          => $value[0],
                    'user_id'       => $value[1],
                    'client_type'   => $value[2],
                    'operation_type' => $value[3],
                    'amount'        => $value[4],
                    'currency'      => $value[5],
                    'total'         => round($subTotal, 2),
                    'commission'    => round($commission, 2)
                ]);
            }else{
                CurrencyConvert::create([
                    'date'          => 'Invalid date',
                    'user_id'       => '-----',
                    'client_type'   => '---------',
                    'operation_type'=> '---------',
                    'amount'        => '---------',
                    'currency'      => '---------',
                    'total'         => '---------',
                    'commission'    => '---------'
                ]);
            }
        }

        $path="CSV_File/input";
        if ($request->hasFile('csv_file')){
            if($files=$request->file('csv_file')){

                $fullName = $request->file('csv_file')->getClientOriginalName();

                $files->move(public_path($path), $fullName);
                $fileLink = $path . $fullName;
            }
        }

        return back();
    }


    public function commission_rate(){
        $data['rates'] = CommissionRate::all();
        return view('pages.commission-rate', $data);
    }

}
