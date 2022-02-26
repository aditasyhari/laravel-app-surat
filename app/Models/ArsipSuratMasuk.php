<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipSuratMasuk extends Model
{
    use HasFactory;
    protected $table = 'arsip_sm';
    protected $primaryKey = 'id_arsip_sm';
    protected $guarded = [];
}
