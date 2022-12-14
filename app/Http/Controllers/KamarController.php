<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Kamar::all();
        return $table;
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
        $table = Kamar::create([
            "tipe" => $request->tipe,
            "harga" => $request->harga,
            "deskripsi" => $request->deskripsi,
            "fasilitas" => $request->fasilitas,
            "kebijakan" => $request->kebijakan,
            "jumlah_kamar" => $request->jumlah_kamar,
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'Kamar Berhasil Ditambahkan!',
            'data' => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Kamar::find($id);
        if ($table) {
            return response()->json([
                'status' => 200,
                'data' => $table
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id atas ' . $id . 'tidak ditemukan'
            ], 400);
        }
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
        $table = Kamar::find($id);
        if($table){
            $table->tipe = $request->tipe ? $request->tipe : $table->tipe;
            $table->harga = $request->harga ? $request->harga : $table->harga;
            $table->deskripsi = $request->deskripsi ? $request->deskripsi : $table->deskripsi;
            $table->fasilitas = $request->fasilitas ? $request->fasilitas : $table->fasilitas;
            $table->kebijakan = $request->kebijakan ? $request->kebijakan : $table->kebijakan;
            $table->jumlah_kamar = $request->jumlah_kamar ? $request->jumlah_kamar : $table->jumlah_kamar;
            $table->save();
            return response()->json([
                'status' => 200,
                'data' => $table
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => $id . ' tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Kamar::where('id', $id)->first();
        if($table){
            $table->delete();
            return response()->json([
                'status' => 200,
                'data' => $table
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id .' tidak ditemukan'
            ], 404);
        }
    }
}
