<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'announcement', 'text', 'published_at', 'author_id'];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function rubrics()
    {
        return $this->belongsToMany(Rubric::class);
    }
}
