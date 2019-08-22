<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\SanPham;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sanphams = SanPham::with('comments')->comments;
        // dd($sanphams);
        $sanphams = SanPham::with('hang_sx')->paginate(4);
        $hangsxs = DB::table('hang_sx')->get();
        // $sanpham = DB::table('sanpham')->find(1);
        // dd($sanpham->hang_sx->id);
        

        return view('admin.sanpham', ['sanphams' => $sanphams, 'hangsxs'=>$hangsxs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->image->getClientOriginalName());
        // $image = $request->file('image');
        // dd(Input::file('image'));

        // dd($request->all());

        $request->validate([
            'price' =>'required|integer',
            'name' => 'required|min:3|max:20',
            'tomtat' => 'required|min:3',
            'content' =>'required|min:3',
            'image' => 'required|image'
        ]);

        $image = $request->image;
        $new_name = rand() . '.' . $image->getClientOriginalName();

        DB::table('sanpham')->insert([
            'hang_sx_id' => $request->idHangsx,
            'image' => $new_name,
            'price' => $request->price,
            'name' => $request->name,
            'tom_tat' => $request->tomtat,
            'content' => $request->content
        ]);
        
        
        $image->move(public_path('images/sanpham'), $new_name);

        $data = DB::table('sanpham')->get()->last();

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
        $data = DB::table('sanpham')->find($id);
        // dd($data);
        return response()->json($data);
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
        // dd($request->all());

        $request->validate([
            'price' =>'required|integer',
            'name' => 'required|min:3|max:20',
            'tomtat' => 'required|min:3',
            'content' =>'required|min:3',
            'image' => 'image'
        ]);

        if(isset($request->image)) {
            $image = $request->image;
            $new_name = rand() . '.' . $image->getClientOriginalName();
            DB::table('sanpham')->where('id', $id)
                ->update(['image' => $new_name]);
            
            $image->move(public_path('images/sanpham'), $new_name);
        }
        
        DB::table('sanpham')->where('id', $id)
            ->update([
                'hang_sx_id' => $request->idHangsx,
                'price' => $request->price,
                'name' => $request->name,
                'tom_tat' =>$request->tomtat,
                'content' => $request->content
            ]);

        return response()->json(['Success' => 'Edit completed!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('sanpham')->where('id', $id)->delete();

        return response()->json(['success'=>'Delete complete !']);
    }
}
