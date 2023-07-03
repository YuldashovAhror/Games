<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name_uz',
        'name_ru',
        'name_en',
        'size_uz',
        'size_ru',
        'size_en',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
