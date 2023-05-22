<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_mobil extends Model
{
    use HasFactory;
    protected $table = 'tb_mobil';
    protected $primaryKey = 'id_mobil';
    protected $keyType = 'string';
    protected $guarded = NULL;
}
