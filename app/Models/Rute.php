<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'rute';

    public function maskapai()
    {
        return $this->belongsTo(Maskapai::class);
    }
}
