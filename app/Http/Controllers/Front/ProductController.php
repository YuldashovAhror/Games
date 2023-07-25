<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CatalogTeg;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function padshow($slug)
    {
        $products = Product::where('padcategory_id', $slug)->get();
        $categories = Category::with('products')->orderBy('id', 'desc')->get();
        $tag = CatalogTeg::find(1);
        return view('front.catalog', [
            'products'=>$products,
            'tag'=>$tag,
            'categories'=>$categories,
        ]);
    }

    public function show($slug)
    {
    
        $product = Product::with('atributes')->where('slug', $slug)->first();
        $product->increment('view');
        $products = Product::where('category_id', $product->category_id)->where('slug', '!=', $slug)->get();
        return view('front.product', [
            'product'=>$product,
            'products'=>$products,
        ]);
    }

}
