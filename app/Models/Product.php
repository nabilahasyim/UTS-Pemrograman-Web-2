<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
    'category_id',
    'name',
    'brand',
    'price',
    'stock',
    'description',
    'status'
];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}