<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamanModel extends Model
{
    use HasFactory;
    protected $table = 'tb_pinjaman';
    protected $guarded = NULL;
    protected $with = ['anggota'];
    public function anggota()
    {
        return $this->hasOne(AnggotaModel::class, 'id', 'id_anggota');
    }
    public function angsuran()
    {
        return $this->hasMany(AngsuranModel::class, 'id_pinjaman', 'id');
    }
}
