<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
        'photo',
        'icon',
        'ok',
    ];


    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function padcategories()
    {
        return $this->hasMany(PadCategory::class, 'category_id');
    }
}
