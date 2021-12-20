<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkout extends Model
{
    protected $table = "checkout";
    protected $primaryKey = "id";
    protected $fillable = [
       'id',
       'nama_user',
       'nama_barang',
       'waktu',
       'jumlah',
       'alamat',
       'biaya_layanan',
       'biaya_PPN',
       'biaya_operasional',
       'biaya_pembuatan',
       'biaya_total'];
}
