<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpananKhususModel extends Model
{
    use HasFactory;
    protected $table = 'tb_simpanan_khusus';
    protected $guarded = NULL;
}
