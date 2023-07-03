<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name_uz',
        'name_ru',
        'name_en',
        'photos',
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
    public function atribute()
    {
        return $this->hasMany(Atribute::class, 'product_id');
    }
}
