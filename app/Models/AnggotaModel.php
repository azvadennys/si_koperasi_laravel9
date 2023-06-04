<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaModel extends Model
{
    use HasFactory;
    protected $table = 'tb_anggota';
    protected $guarded = NULL;

    public function simpananpokok()
    {
        return $this->hasMany(SimpananPokokModel::class, 'id_anggota', 'id');
    }
    public function simpananwajib()
    {
        return $this->hasMany(SimpananWajibModel::class, 'id_anggota', 'id');
    }
    public function simpanankhusus()
    {
        return $this->hasMany(SimpananKhususModel::class, 'id_anggota', 'id');
    }
}
