<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datapenjualan extends Model
{
    protected $table = "datapenjualan";
    protected $primaryKey = "id";
    protected $fillable = [
       'id',
       'januari',
       'februari',
       'maret',
       'april',
    ];
}
