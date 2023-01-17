<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tes extends Model
{
    use HasFactory;

    protected $table = 'tes';
    protected $guarded = [];
    protected $primaryKey = 'id_tes';


    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }

    public function detailTes()
    {
        return $this->hasMany(DetailTes::class, 'id_tes');
    }
}
