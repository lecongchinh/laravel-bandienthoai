<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function setting() {
        $province = DB::table('province')->get();

        return view('auth.setting', ['province'=> $province]);
    }

    public function update(Request $request) {

        if(isset($request->location)) {
            $request->validate([
                'location' => 'required',
                'province' => 'required',
                'district' => 'required',
                'ward' => 'required',
                'village' => 'required',
                'name' => 'required'
            ]);

            $province = DB::table('province')->where('provinceid', $request->province)->get();
            $district = DB::table('district')->where('districtid', $request->district)->get();
            $ward = DB::table('ward')->where('wardid', $request->ward)->get();
            $village = DB::table('village')->where('villageid', $request->village)->get();
            // dd($province);

            $address = $request->location. ', '.$village[0]->name.
                        ', '.$ward[0]->name. ', '.$district[0]->name.
                        ', '.$province[0]->name;

            DB::table('users')->where('id', $request->id)->update([
                'name' => $request->name,
                'address' => $address
            ]);

        } else {
            $request->validate([
                'name' => 'required',
            ]);

            DB::table('users')->where('id', $request->id)->update([
                'name' => $request->name
            ]);
        }
    }
}
