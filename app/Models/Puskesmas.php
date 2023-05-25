<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Puskesmas extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $table = 'puskesmas';
    protected $fillable = [
        'nama', 'slug', 'id_kecamatan'
    ];

    protected $hidden = [];

    public function user()
    {
        return $this->belongsToMany(User::class, 'puskesmas_user', 'id_user', 'id_puskesmas');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id');
    }

    public function giziBaik()
    {
        $item = Stunting::select(DB::raw('count(stunting.bb_per_tb) as jumlah', 'stunting.id_balita', 'balita.id_puskesmas'))
            ->join('balita', 'stunting.id_balita', '=', 'balita.id')
            ->where('stunting.bb_per_tb', 'Gizi Baik')
            ->where('balita.id_puskesmas', $this->id)
            ->first();
        return $item->jumlah;
    }

    public function risikoGiziLebih()
    {
        $item = Stunting::select(DB::raw('count(stunting.bb_per_tb) as jumlah', 'stunting.id_balita', 'balita.id_puskesmas'))
            ->join('balita', 'stunting.id_balita', '=', 'balita.id')
            ->where('stunting.bb_per_tb', 'Risiko Gizi Lebih')
            ->where('balita.id_puskesmas', $this->id)
            ->first();
        return $item->jumlah;
    }

    public function giziKurang()
    {
        $item = Stunting::select(DB::raw('count(stunting.bb_per_tb) as jumlah', 'stunting.id_balita', 'balita.id_puskesmas'))
            ->join('balita', 'stunting.id_balita', '=', 'balita.id')
            ->where('stunting.bb_per_tb', 'Gizi Kurang')
            ->where('balita.id_puskesmas', $this->id)
            ->first();
        return $item->jumlah;
    }

    public function giziBuruk()
    {
        $item = Stunting::select(DB::raw('count(stunting.bb_per_tb) as jumlah', 'stunting.id_balita', 'balita.id_puskesmas'))
            ->join('balita', 'stunting.id_balita', '=', 'balita.id')
            ->where('stunting.bb_per_tb', 'Gizi Buruk')
            ->where('balita.id_puskesmas', $this->id)
            ->first();
        return $item->jumlah;
    }

    public function giziLebih()
    {
        $item = Stunting::select(DB::raw('count(stunting.bb_per_tb) as jumlah', 'stunting.id_balita', 'balita.id_puskesmas'))
            ->join('balita', 'stunting.id_balita', '=', 'balita.id')
            ->where('stunting.bb_per_tb', 'Gizi Lebih')
            ->where('balita.id_puskesmas', $this->id)
            ->first();
        return $item->jumlah;
    }

    public function obesitas()
    {
        $item = Stunting::select(DB::raw('count(stunting.bb_per_tb) as jumlah', 'stunting.id_balita', 'balita.id_puskesmas'))
            ->join('balita', 'stunting.id_balita', '=', 'balita.id')
            ->where('stunting.bb_per_tb', 'Obesitas')
            ->where('balita.id_puskesmas', $this->id)
            ->first();
        return $item->jumlah;
    }

    public function pendek()
    {
        $item = Stunting::select(DB::raw('count(stunting.tb_per_u) as jumlah', 'stunting.id_balita', 'balita.id_puskesmas'))
            ->join('balita', 'stunting.id_balita', '=', 'balita.id')
            ->where('stunting.tb_per_u', 'Pendek')
            ->where('balita.id_puskesmas', $this->id)
            ->first();
        return $item->jumlah;
    }

    public function sangatPendek()
    {
        $item = Stunting::select(DB::raw('count(stunting.tb_per_u) as jumlah', 'stunting.id_balita', 'balita.id_puskesmas'))
            ->join('balita', 'stunting.id_balita', '=', 'balita.id')
            ->where('stunting.tb_per_u', 'Sangat Pendek')
            ->where('balita.id_puskesmas', $this->id)
            ->first();
        return $item->jumlah;
    }

    public function normal()
    {
        $item = Stunting::select(DB::raw('count(stunting.tb_per_u) as jumlah', 'stunting.id_balita', 'balita.id_puskesmas'))
            ->join('balita', 'stunting.id_balita', '=', 'balita.id')
            ->where('stunting.tb_per_u', 'Normal')
            ->where('balita.id_puskesmas', $this->id)
            ->first();
        return $item->jumlah;
    }

    public function tinggi()
    {
        $item = Stunting::select(DB::raw('count(stunting.tb_per_u) as jumlah', 'stunting.id_balita', 'balita.id_puskesmas'))
            ->join('balita', 'stunting.id_balita', '=', 'balita.id')
            ->where('stunting.tb_per_u', 'Tinggi')
            ->where('balita.id_puskesmas', $this->id)
            ->first();
        return $item->jumlah;
    }

    public function beratBadanKurang()
    {
        $item = Stunting::select(DB::raw('count(stunting.bb_per_u) as jumlah', 'stunting.id_balita', 'balita.id_puskesmas'))
            ->join('balita', 'stunting.id_balita', '=', 'balita.id')
            ->where('stunting.bb_per_u', 'Kurang')
            ->where('balita.id_puskesmas', $this->id)
            ->first();
        return $item->jumlah;
    }

    public function beratBadanNormal()
    {
        $item = Stunting::select(DB::raw('count(stunting.bb_per_u) as jumlah', 'stunting.id_balita', 'balita.id_puskesmas'))
            ->join('balita', 'stunting.id_balita', '=', 'balita.id')
            ->where('stunting.bb_per_u', 'Berat Badan Normal')
            ->where('balita.id_puskesmas', $this->id)
            ->first();
        return $item->jumlah;
    }

    public function beratBadanSangatKurang()
    {
        $item = Stunting::select(DB::raw('count(stunting.bb_per_u) as jumlah', 'stunting.id_balita', 'balita.id_puskesmas'))
            ->join('balita', 'stunting.id_balita', '=', 'balita.id')
            ->where('stunting.bb_per_u', 'Sangat Kurang')
            ->where('balita.id_puskesmas', $this->id)
            ->first();
        return $item->jumlah;
    }

    public function risikoBeratBadanLebih()
    {
        $item = Stunting::select(DB::raw('count(stunting.bb_per_u) as jumlah', 'stunting.id_balita', 'balita.id_puskesmas'))
            ->join('balita', 'stunting.id_balita', '=', 'balita.id')
            ->where('stunting.bb_per_u', 'Risiko Lebih')
            ->where('balita.id_puskesmas', $this->id)
            ->first();
        return $item->jumlah;
    }
}
