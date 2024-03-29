<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Structure extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'image',
        'updated_by',
    ];

    public function admin() {
        return $this->belongsTo(Cms::class, 'updated_by');
    }
}
