<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogTeg extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'discription',
        'catalog_name',
        'catalog_photo',
        'catalog_discription',
    ];
}
