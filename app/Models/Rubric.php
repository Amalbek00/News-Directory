<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubric extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(Rubric::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Rubric::class, 'parent_id');
    }

    public function news()
    {
        return $this->belongsToMany(News::class);
    }

}
