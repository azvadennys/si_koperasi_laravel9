<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpananWajibModel extends Model
{
    use HasFactory;
    protected $table = 'tb_simpanan_wajib';
    protected $guarded = NULL;
    protected $with = ['anggota'];
    public function anggota()
    {
        return $this->hasOne(AnggotaModel::class, 'id', 'id_anggota');
    }
}
