<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';
    protected $guarded = [];
    protected $primaryKey = 'id_kriteria';

    public function crips()
    {
        return $this->hasMany(Crips::class, 'id_kriteria');
    }

    public function pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class, 'id_kriteria');
    }

}
