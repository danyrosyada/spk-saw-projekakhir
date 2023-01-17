<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $table = 'pertanyaan';
    protected $guarded = [];
    protected $primaryKey = 'id_pertanyaan';


    public function jawaban()
    {
        return $this->hasMany(Jawaban::class, 'id_pertanyaan');
    }

}
