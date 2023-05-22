<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_detail_transaksi_supir extends Model
{
    use HasFactory;
    protected $table = 'tb_detail_transaksi_supir';
    protected $with = ['supir'];
    protected $guarded = NULL;
    public function supir()
    {
        return $this->hasOne(tb_supir::class, 'id', 'supir_id');
    }
}
