<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';
    protected $guarded = [];

    public function supir()
    {
        return $this->belongsTo(Supir::class, 'supir_id');
    }
    public function detailPenilaian()
    {
        return $this->hasMany(DetailPenilaian::class, 'penilaian_id');
    }

}
