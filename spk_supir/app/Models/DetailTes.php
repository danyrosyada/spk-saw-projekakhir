<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTes extends Model
{
    use HasFactory;

    protected $table = 'detail_tes';
    protected $guarded = [];
    protected $primaryKey = 'id_detail_tes';


    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'id_pertanyaan');
    }

    public function jawaban()
    {
        return $this->belongsTo(Jawaban::class, 'id_jawaban');
    }

}
