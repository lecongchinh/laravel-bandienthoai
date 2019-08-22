<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;

class CartController extends Controller
{
    public function index(Request $request) {
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
        // dd($carts);
        return view('client.cart', ['products' => $products, 'totalPrice' => $totalPrice]);
    }

    public function getItem($id) {
        $data = DB::table('sanpham')->where('id', $id)->get();
        return $data;
    }

    public function addToCart(Request $request) {
        if(!$request->session()->has('products.'.$request->id.'.quantity')) {
            $cart = $request->session()->get('products');
            $cart[$request->id] = array($this->getItem($request->id), 'quantity' => 1);
        } else {
            $cart = $request->session()->get('products');
            $cart[$request->id]['quantity'] +=1;
        }
        $request->session()->put('products', $cart);

        return response()->json(['success'=>'Add Complete!']);
    }


    public function update(Request $request, $id) {
        // dd($request->id);
        $cart = $request->session()->get('products');
        $cart[$id]['quantity'] = $request->quantity;
        $request->session()->put('products', $cart);

        return response()->json(['success'=>'update Complete!']);
    }

    public function delete(Request $request, $id) {
        $request->session()->forget('products.'.$id.'');

        return response()->json(["success", "Delete completed !"]);
    }

}
