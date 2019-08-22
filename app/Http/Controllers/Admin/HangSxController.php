<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Hang_sx;

class HangSxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $test = DB::table('hang_sx')->sanpham()->get();
        // dd($test);

        $hangsxs = DB::table('hang_sx')->get();
        return view('admin.hangsx', ['hangsxs'=>$hangsxs]);
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,['name' => 'required|max:20|min:2']);
        $request->validate([
            'name' => 'required|max:20|min:2',
        ]);
        // $data = new Hang_sx();
        DB::table('hang_sx')->insert([
            ['name'=>$request->name]
        ]);

        $data = DB::table('hang_sx')->get()->last();

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|max:20|min:2',
        ]);

        DB::table('hang_sx')->where('id', $id)
                            ->update(['name' => $request->name]);
        
        $data = DB::table('hang_sx')->where('id', $id)->get();

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('hang_sx')->where('id', $id)->delete();

        return response()->json(['success'=>'Delete completed !']);
    }

}
