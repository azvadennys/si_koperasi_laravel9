<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpananPokokModel extends Model
{
    use HasFactory;
    protected $table = 'tb_simpanan_pokok';
    protected $guarded = NULL;
    protected $with = ['anggota'];
    public function anggota()
    {
        return $this->hasOne(AnggotaModel::class, 'id', 'id_anggota');
    }
}
