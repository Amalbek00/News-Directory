<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['full_name', 'email', 'avatar'];

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function getAvatarUrlAttribute()
    {
        return asset('storage/' . $this->avatar);
    }
}
