<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Support\Facades\DB;

class SanphamController extends Controller
{
    public function show($id) {
        $sanpham = DB::table('sanpham')->get();
        return view('client.product', ['sanpham'=>$sanpham]);
    }
}
