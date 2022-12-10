<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supir extends Model
{
    use HasFactory;

    protected $table = 'supir';
    protected $guarded = [];
    protected $primaryKey = 'id_supir';

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'supir_id');
    }

}
