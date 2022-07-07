<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = [
        'advertisement_id',
        'user_id',
        'password',
        'price',
    ];

    public function user()
    {
        return User::where(['id' => $this->user_id])->get()->first();
    }
}
