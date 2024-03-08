<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maskapai extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'maskapai';

    public function rute()
    {
        return $this->hasOne(Rute::class);
    }
}
