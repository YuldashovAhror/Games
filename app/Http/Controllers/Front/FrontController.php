<?php

namespace App\Http\Controllers\Front;

use App\Models\CatalogTeg;
use App\Models\Category;
use App\Models\InstagramSlider;
use App\Models\Product;
use App\Models\SecondSlider;
use App\Models\Slider;

class FrontController
{
    public function index()
    {
        if (session()->get('locale') == '') {
            session()->put('locale', 'ru');
            app()->setLocale('ru');
        } else {
            app()->setLocale(session()->get('locale'));
        }
        $lang = session()->get('locale');

        $tag = CatalogTeg::find(1);
        $sliders = Slider::orderBy('id', 'desc')->get();
        $categories = Category::with('padcategories')->orderBy('id', 'desc')->get();
        $products = Product::all()->random()->paginate(8);
        $second_slider = SecondSlider::find(1);
        $instagram_sliders = InstagramSlider::orderBy('id', 'desc')->get();

        return view('front.welcome', compact('lang', 'sliders', 'categories', 'products', 'second_slider', 'instagram_sliders', 'tag'));
    }

}
