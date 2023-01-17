<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenilaian extends Model
{
    use HasFactory;
    
    protected $table = 'detail_penilaian';
    protected $guarded = [];
    protected $primaryKey = 'id_detail_penilaian';

    public function crips()
    {
        return $this->belongsTo(Crips::class, 'id_crips');
    }
    public function tes()
    {
        return $this->belongsTo(Tes::class, 'id_tes');
    }

}
