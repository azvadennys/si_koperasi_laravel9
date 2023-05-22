<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_transaksi extends Model
{
    use HasFactory;
    protected $table = 'tb_transaksi';

    protected $guarded = NULL;
    protected $with = ['user', 'mobil', 'supir'];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function mobil()
    {
        return $this->hasMany(tb_detail_transaksi_mobil::class, 'transaksi_id', 'id');
    }
    public function supir()
    {
        return $this->hasMany(tb_detail_transaksi_supir::class, 'transaksi_id', 'id');
    }
}
