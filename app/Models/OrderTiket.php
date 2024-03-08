<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTiket extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'order_tiket';
}
