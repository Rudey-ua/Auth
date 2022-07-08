<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Spatie\QueryBuilder\Filters\Filter;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'data',
        'views',
        'price',
        'checked',
        'is_vip',
        'category_id',
        'user_id',
        'engine_type',
        'engine_power',
        'engine_volume',
        'transmission',
        'type_of_drive',
        'mileage',
        'year',
        'color',
        'seats',
        'type',
        'load_capacity',
        'body_type',
        'number_of_axles',
        'object_type',
        'floor',
        'rooms',
        'square',
        'kitchen_square',
        'class',
        'furniture',
        'storeys',
        'house_type',
        'amount_acres',
        'heating',
        'phone_brand',
        'operating_system',
        'screen_diagonal',
        'console_type',
        'camera_type',
        'laptops_type',
        'bred',
        'gender',
        'size',
        'min_bid',
        'time'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'advertisement_id', 'id');
    }
}
