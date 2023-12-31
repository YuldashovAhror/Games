<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'padcategory_id',
        'name_uz',
        'name_ru',
        'name_en',
        'view',
        'photos',
        'slug',
        'sertificat',
        'title_uz',
        'title_ru',
        'title_en',
        'article',
        'discription_uz',
        'discription_ru',
        'discription_en',
        'star',
    ];

    protected $casts = [
        'photos' => 'array',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function padcategories()
    {
        return $this->belongsTo(PadCategory::class, 'padcategory_id');
    }

    public function atributes()
    {
        return $this->hasMany(Atribute::class, 'product_id');
    }
    
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'product_id');
    }
}
