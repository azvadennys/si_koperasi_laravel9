<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_detail_transaksi_mobil extends Model
{
    use HasFactory;
    protected $table = 'tb_detail_transaksi_mobil';

    protected $guarded = NULL;
    protected $with = ['mobil'];
    public function mobil()
    {
        return $this->hasOne(tb_mobil::class, 'id_mobil', 'mobil_id');
    }
}
