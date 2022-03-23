<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    protected $table = 'template';
    protected $primaryKey = 'id_template';
    protected $guarded = [];

    public function validator() {
        return $this->belongsTo(User::class, 'id_validator');
    }

    public function ttd() {
        return $this->belongsTo(User::class, 'id_ttd');
    }
}
