<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'payment_id',
        'image',
        'description',
        'updated_by',
    ];

    public function admin() {
        return $this->belongsTo(Cms::class, 'updated_by');
    }

    public function Payment() {
        return $this->belongsTo(Payment::class);
    }
}
