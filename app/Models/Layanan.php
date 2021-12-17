<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = "Layanans";
    protected $primaryKey = "id";
    protected $fillable = [
       'id','namabarang','foto','harga','stok'];
}