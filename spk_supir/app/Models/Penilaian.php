<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';
    protected $guarded = [];
    protected $primaryKey = 'id_penilaian';


    public function detailPenilaian()
    {
        return $this->hasMany(DetailPenilaian::class, 'id_penilaian');
    }

    public function supir()
    {
        return $this->belongsTo(Supir::class, 'id_supir');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode');
    }
}
