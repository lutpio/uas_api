<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Resep::with("kategori")->orderBy('judul','asc')->get();
        return response()->json([
        'status' =>true,
        'message' => 'Resep Tersedia',
        'resep' => $data
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
            'judul' => 'required',
             'waktu_masak'  => 'required',
             'bahan'  => 'required',
             'intruksi'  => 'required',
             'kategori_id'  => 'required',
         ];

        $Validator = Validator::make($request->all(), $rules);
        if($Validator->fails()) {
            return response()->json([
                'status'=> false,
                'message'=>'Gagal memasukan data',
                'data'=>$Validator->errors()
            ],422);
        }
        $dataresep = new Resep;
        $dataresep->judul = $request->judul;
        $dataresep->waktu_masak = $request->waktu_masak;
        $dataresep->bahan = $request->bahan;
        $dataresep->intruksi = $request->intruksi;
        $dataresep->kategori_id = $request->kategori_id;

        $dataresep->save();

        return response()->json([
        'status' => true,
        'message' => 'Berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Resep::with("kategori")->find($id);
        if($data){
            return response()->json([
                'status'=>true,
                'message'=>'Resep Ditemukan',
                'resep'=>$data
            ], 200);
        }else{
        return response()->json([
            'status' => false,
            'message'=> 'Resep Tidak Ditemukan'
        ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = Resep::find($id);
        if(empty ($data)){
            return response()->json([
                'status'=> false,
                'message'=>'Resep Tidak Ditemukan',               
            ],404);
        }

        $rules =[
           'judul' => 'required',
            'waktu_masak'  => 'required',
            'bahan'  => 'required',
            'intruksi'  => 'required',
            'kategori_id'  => 'required',
        ];

        $Validator = Validator::make($request->all(), $rules);
        if($Validator->fails()) {
            return response()->json([
                'status'=> false,
                'message'=>'Gagal memasukan data',
                'data'=>$Validator->errors()
            ],422);
        }

        $data->judul = $request->judul;
        $data->waktu_masak = $request->waktu_masak;
        $data->bahan = $request->bahan;
        $data->intruksi = $request->intruksi;
        $data->kategori_id = $request->kategori_id;

        $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil',            
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataresep = Resep::find($id);
        if (empty($dataresep)) {
            return response()->json([
            'status' => false,
            'message' => 'Resep Tidak Ditemukan'
            ], 404);    
        }

        $dataresep->delete();
        return response()->json([
            'status' => true,
            'message' => 'Berhasil Delete Data'
        ]);
    }
}
