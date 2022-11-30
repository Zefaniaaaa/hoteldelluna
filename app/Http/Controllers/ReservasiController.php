<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Reservasi::all();
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
        $table = Reservasi::create([
            "username" => $request->username,
            "email" => $request->email,
            "telepon" => $request->telepon,
            "tipe" => $request->tipe,
            "jumlah_pesan" => $request->jumlah_pesan,
            "check_in" => $request->check_in,
            "check_out" => $request->check_out,
            "to_harga" => $request->to_harga,
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'Pesanan Berhasil Ditambahkan!',
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
        $table = Reservasi::find($id);
        if ($table) {
            return response()->json([
                'status' => 200,
                'data' => $table
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . ' tidak ditemukan'
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
        $table = Reservasi::find($id);
        if($table){
            $table->username = $request->username ? $request->username : $table->username;
            $table->email = $request->email ? $request->email : $table->email;
            $table->telepon = $request->telepon ? $request->telepon : $table->telepon;
            $table->tipe = $request->tipe ? $request->tipe : $table->tipe;
            $table->jumlah_pesan = $request->jumlah_pesan ? $request->jumlah_pesan : $table->jumlah_pesan;
            $table->check_in = $request->check_in ? $request->check_in : $table->check_in;
            $table->check_out = $request->check_out ? $request->check_out : $table->check_out;
            $table->to_harga = $request->to_harga ? $request->to_harga : $table->to_harga;
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
        $table = Reservasi::where('id', $id)->first();
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
