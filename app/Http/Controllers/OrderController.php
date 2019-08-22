<?php

namespace App\Http\Controllers;

use App\Order;
use App\Mail\Contact;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function ordered(Request $request, $orderId) {

        $order = Order::findOrFail($orderId);

        Mail::to($request->user())->send(new Contact($order));
    }
}
