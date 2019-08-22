<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class PlaceOrderController extends Controller
{
    public function postPlaceOrder(Request $request) {

        // dd($request);
        //get user order
        $userOrder = DB::table('users')->where('email', $request->email_val)->get();
        // dd($userOrder[0]->id);

        // dd(($request->value_active));
        if(isset($request->value_active)) {
            $request->validate([
                'location' => 'required',
                'province' => 'required',
                'district' => 'required',
                'ward' => 'required',
                'village' => 'required',
                'phone' => 'required',
            ]);

            $province = DB::table('province')->where('provinceid', $request->province)->get();
            $district = DB::table('district')->where('districtid', $request->district)->get();
            $ward = DB::table('ward')->where('wardid', $request->ward)->get();
            $village = DB::table('village')->where('villageid', $request->village)->get();
            // dd($province);

            $address_order = $request->location. ', '.$village[0]->name.
                        ', '.$ward[0]->name. ', '.$district[0]->name.
                        ', '.$province[0]->name;
        } else {
            $request->validate([
                'phone' => 'required',
            ]);

            $address_order = $userOrder[0]->address;
        }

        //get Product in Cart
        $products = $request->session()->get('products');
        // dd($products);

        //calculate Total price
        $totalPrice = 0;
        foreach($products as $product) {
            $totalPrice += ($product[0][0]->price)*$product['quantity'];
        }

        //insert into bills
        DB::table('bills')->insert([
            'id_user' => $userOrder[0]->id,
            'total_price' => $totalPrice,
            'address_order' => $address_order,
            'phone' => $request->phone,
            'note' => $request->note,
            'date_order' => '2019-07-31 13:48:35'
        ]);

        //get bills just insert
        $bill = DB::table('bills')->latest()->first();
    
        //insert into bill_detail
        foreach($products as $product) {
            DB::table('bill_detail')->insert([
                'id_bill' => $bill->id,
                'id_sanpham' => $product[0][0]->id,
                'quantity' => $product['quantity'],
                'unit_price' => $product[0][0]->price
            ]);
        }

        //delete session products
        $request->session()->forget('products');
    }
}
