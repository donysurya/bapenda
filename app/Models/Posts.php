<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'posts';
    protected $fillable = [
        'title', 
        'category_id', 
        'content', 
        'abstract', 
        'image', 
        'slug', 
        'created_by'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function tags() {
        return $this->belongsToMany(Tags::class);
    }
    public function admin() {
        return $this->belongsTo(Cms::class, 'created_by');
    }
}
