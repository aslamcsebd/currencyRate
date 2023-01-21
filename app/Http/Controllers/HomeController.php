<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\CurrencyHistory;

class HomeController extends Controller {

    // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function index(){
        $today = date('Y-m-d');
        $todayCurrency = CurrencyHistory::where('date', $today)->get();

        if(!$todayCurrency->count()>0){
            $currencyAPI = 'https://developers.paysera.com/tasks/api/currency-exchange-rates';
            $todayCurrency = json_decode(file_get_contents($currencyAPI), true);

            foreach($todayCurrency['rates'] as $name => $value){
                CurrencyHistory::create([
                   'date' => $today,
                   'currency' => $name,
                   'rate' => $value
                ]);
            }
            $todayCurrency = CurrencyHistory::where('date', $today)->get();
        }

        return view('home', compact('todayCurrency'));
    }
}
