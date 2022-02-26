<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipSuratKeluar extends Model
{
    use HasFactory;
    protected $table = 'arsip_sk';
    protected $primaryKey = 'id_arsip_sk';
    protected $guarded = [];
}
