<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

use App\Models\CurrencyConvert;

class CurrencyController extends Controller {

    public function csv_import(Request $request){



        $validator = Validator::make($request->all(),[
            'csv_file' => 'required|mimes:csv'
        ]);

        if($validator->fails()){
            $messages = $validator->messages();
            return Redirect::back()->withErrors($validator);
        }

        $path="CSV_File/";
        if ($request->hasFile('csv_file')){
            if($files=$request->file('csv_file')){

                $fullName = $request->file('csv_file')->getClientOriginalName();

                $files->move(public_path($path), $fullName);
                $fileLink = $path . $fullName;
            }
        }

        $path = $request->file('csv_file')->getRealPath();
        $data = array_map('str_getcsv', file($path));

        foreach($data as $value){
            $today = date('Y-m-d');
            $day = $value[0];

            if($today==$day){
                CurrencyConvert::create([
                    'date'  => $value[0],
                    'user_id'   => $value[1],
                    'client_type'   => $value[2],
                    'amount'     => $value[3],
                    'operation_type'    => $value[4],
                    'currency'  => $value[5]
                ]);
            }else{
                CurrencyConvert::create([
                    'date'  => 'This is invali date'
                ]);
            }
        }


        // return view('home', compact('csv_data'));
    }

}
