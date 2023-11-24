<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kategori::orderBy('nama','asc')->get();
        return response()->json([
        'status' =>true,
        'message' => 'Kategori Tersedia',
        'kategori' => $data
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules =[
            'nama' => 'required|unique:kategoris',             
         ];

        $Validator = Validator::make($request->all(), $rules);
        if($Validator->fails()) {
            return response()->json([
                'status'=> false,
                'message'=>'Gagal memasukan data',
                'data'=>$Validator->errors()
            ],422);
        }

        Kategori::create(['nama'=>$request->nama]);

        return response()->json([
            'status' => true,
            'message' => 'Berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {        
        $data = Kategori::find($id);

        if($data){
            return response()->json([
                'status'=>true,
                'message'=>'Kategori Ditemukan',
                'kategori'=>$data
            ], 200);
        }else{
            return response()->json([
                'status' => false,
                'message'=> 'Kategori Tidak Ditemukan'
            ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {     
        $data = Kategori::find($id);
        if(empty ($data)){
            return response()->json([
                'status'=> false,
                'message'=>'Kategori Tidak Ditemukan',               
            ],404);
        }

        $rules =[
           'nama' => 'required|unique:kategoris',            
        ];

        $Validator = Validator::make($request->all(), $rules);
        if($Validator->fails()) {
            return response()->json([
                'status'=> false,
                'message'=>'Gagal memasukan data',
                'data'=>$Validator->errors()
            ],422);
        }
        
        $data->nama = $request->nama;

        $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil',            
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Kategori::find($id);
        
        if (empty($data)) {
            return response()->json([
            'status' => false,
            'message' => 'Kategori Tidak Ditemukan'
            ], 404);    
        }

        $data->delete();
        return response()->json([
            'status' => true,
            'message' => 'Berhasil Delete Data'
        ]);
    
    }
}
