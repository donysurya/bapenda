<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Uptb extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'uptb';

    protected $fillable = [
        'name',
        'peran',
        'fungsi',
        'layanan_pajak',
        'wilayah_uptb',
        'jam_layanan',
        'image',
        'maps_uptb',
        'updated_by',
    ];

    public function admin() {
        return $this->belongsTo(Cms::class, 'updated_by');
    }
}
