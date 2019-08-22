<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\Village;


class CheckoutController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    public function index(Request $request) {
        $province = Province::with('districts')->get();
        // $district = District::all();
        // $ward     = Ward::all();
        // $village  = Village::all();
        $totalPrice = 0;
        // $products = Session::get('products');
            // dd($products);
        
        // dd($totalPrice);
        if($request->session()->has('products')) {

            $products = $request->session()->get('products');
            foreach($products as $product) {
                $totalPrice += ($product[0][0]->price)*$product['quantity'];
            }
        } else {
            $products = null;
        }
        return view('client.checkout', ['products' => $products,
                                        'totalPrice' => $totalPrice,
                                        'province'=>$province,
                                        ]);
    }

}
