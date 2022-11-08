<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Brand;
use App\Models\subcategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [

        'name',
        'slug',
        'image',
        'parent_id',
        'status',
    ];


    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')-> with('children');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

   


    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function brands()
    {

        return $this->hasMany(Brand::class, 'category_id', 'id')->where('status', '0');
    }


}


