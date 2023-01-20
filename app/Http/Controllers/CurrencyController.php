<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Redirect;

class CurrencyController extends Controller {

    public function csv_import(Request $request){

        $validator = Validator::make($request->all(),[
            'csv_import' => 'required|mimes:csv'
         ]);
         //Maximum file size: 10 MB.

         if($validator->fails()){
            $messages = $validator->messages();
            return Redirect::back()->withErrors($validator);
         }


        $path="files/";
      if ($request->hasFile('file')){
         if($files=$request->file('file')){
            $file = $request->file;
            $fullName=time().".".$file->getClientOriginalExtension();
            $files->move(public_path($path), $fullName);
            $fileLink = $path . $fullName;
         }
      }else{
         $fileLink = '';
      }

      $fileId = File::insertGetId([
         'created_by' => Auth::user()->name,
         'name' => $request->name,
         'file' => $fileLink
      ]);


        return back();
        $path = $request->file('csv')->getRealPath();
        $data = array_map('str_getcsv', file($path));

        $csv_data = $data;
        // $csv_data = array_slice($data, 0, 2);
        return view('home', compact('csv_data'));
    }

}
