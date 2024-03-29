<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $table = 'periode';
    protected $guarded = [];
    protected $primaryKey = 'id_periode';

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'id_periode');
    }
}
