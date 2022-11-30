<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;
    protected $fillable =[
        'nama_pelanggan', 'no_rekening', 'detail_pesanan', 'total_bayar'
    ];
}
