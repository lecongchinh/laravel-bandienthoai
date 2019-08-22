<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hang_sx;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hangsxs = Hang_sx::all();
        return view('client.home', ['hangsxs'=>$hangsxs]);
    }

    public function showSanpham() {
        $hangsxs = Hang_sx::all();
        return response()->json($hangsxs);
    }
}
