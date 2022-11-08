<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Product;

class subcategory extends Model
{
    use HasFactory;
    protected $table = 'subcategory';
    protected $fillable = [

        'name',
        'slug',
        'image',
        'category_id',
        'status',
    ];



 public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
