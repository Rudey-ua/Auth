<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class, 'category_id', 'id');
    }

    public function getSubCategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
