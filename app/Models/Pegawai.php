<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'pegawai';

    protected $fillable = [
        'nama',
        'nip',
        'golongan',
        'jabatan',
        'image',
        'keterangan',
        'updated_by',
    ];

    public function admin() {
        return $this->belongsTo(Cms::class, 'updated_by');
    }
}
