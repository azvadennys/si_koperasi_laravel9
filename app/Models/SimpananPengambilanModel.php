<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpananPengambilanModel extends Model
{
    use HasFactory;
    protected $table = 'tb_pengambilan_simpanan';
    protected $guarded = NULL;
    protected $with = ['anggota'];
    public function anggota()
    {
        return $this->hasOne(AnggotaModel::class, 'id', 'id_anggota');
    }
}
