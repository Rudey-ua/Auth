<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    protected $fillable = ['advertisement_id', 'user_id'];

    public function advertisements() {
        return $this->hasMany(Advertisement::class, 'id', 'advertisement_id');
    }

    public function users() {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

}
