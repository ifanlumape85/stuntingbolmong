<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    use HasFactory;
    protected $table = 'balita';

    protected $fillable = [
        'id_puskesmas', 'id_kelurahan', 'posyandu', 'rt', 'rw', 'alamat', 'nik', 'nama', 'jk', 'tgl_lahir', 'bb_lahir', 'tb_lahir', 'nama_orang_tua'
    ];

    protected $hidden = [];

    public function stunting()
    {
        return $this->hasMany(Stunting::class, 'id_balita', 'id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'id_kelurahan', 'id');
    }
}
