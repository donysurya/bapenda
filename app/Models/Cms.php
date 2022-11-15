<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cms extends Model implements Authenticatable
{
    use Notifiable, AuthenticableTrait;

    protected $guard = 'cms';

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 'picture',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
