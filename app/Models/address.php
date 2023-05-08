<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class address extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'alamat',
        'no_telp',
        'email',
        'updated_by',
    ];
}
