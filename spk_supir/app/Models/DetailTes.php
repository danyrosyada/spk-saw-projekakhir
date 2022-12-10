<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTes extends Model
{
    use HasFactory;

    
    protected $table = 'detail_tes';
    protected $guarded = [];

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'pertanyaan_id');
    }
    public function jawaban()
    {
        return $this->belongsTo(Jawaban::class, 'jawaban_id');
    }

}
