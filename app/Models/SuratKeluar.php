<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;
    protected $table = 'surat_keluar';
    protected $primaryKey = 'id_surat_keluar';
    protected $guarded = [];

    public function validator() {
        return $this->belongsTo(User::class, 'id_validator');
    }

    public function ttd() {
        return $this->belongsTo(User::class, 'id_ttd');
    }
}
