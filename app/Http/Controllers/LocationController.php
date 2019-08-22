<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function getDistrict(Request $request) {
        $districts = DB::table('district')->where('provinceid', $request->provinceid)->get();
        return response()->json($districts);
    }

    public function getWard(Request $request) {
        $wards = DB::table('ward')->where('districtid', $request->districtid)->get();
        return response()->json($wards);
    }

    public function getVillage(Request $request) {
        $villages = DB::table('village')->where('wardid', $request->wardid)->get();
        return response()->json($villages);
    }
}
