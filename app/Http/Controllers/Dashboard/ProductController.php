<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Atribute;
use App\Models\Category;
use App\Models\PadCategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends BaseController
{
    private $atributeController;
    public function __construct(AtributeController $atributeController)
    {
        $this->atributeController = $atributeController;
    }

    public function index()
    {
        $products = Product::with(['categories', 'padcategories'])->orderBy('id', 'desc')->get();
        return view('dashboard.product.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $padcategories = PadCategory::orderBy('id', 'desc')->get();
        return view('dashboard.product.create', [
            'categories' => $categories,
            'padcategories' => $padcategories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $products = new Product();
        $request = $request->toArray();
        if (!empty($request['photos'])) {
            $photos = [];
            foreach ($request['photos'] as $photo) {
                array_push($photos, $this->photoSave($photo, 'image/product'));
            }
            $request['photos'] = $photos;
        }

        if (!empty($request['sertificat'])) {
            $img_name = Str::random(10) . '.' . $request['sertificat']->getClientOriginalExtension();
            $request['sertificat']->move(public_path('/image/product'), $img_name);
            $products->sertificat = '/image/product/' . $img_name;
        }
        $products->name_uz = $request['name_uz'];
        $products->name_ru = $request['name_ru'];
        $products->name_en = $request['name_en'];
        if (!empty($request['name_uz'])){
            $products->slug = str_replace(' ', '_', strtolower($request['name_uz'])) . '-' . Str::random(5);
        }
        $products->category_id = $request['category_id'];
        $products->title_uz = $request['title_uz'];
        $products->title_ru = $request['title_ru'];
        $products->title_en = $request['title_en'];
        $products->article = $request['article'];
        $products->discription_uz = $request['discription_uz'];
        $products->discription_ru = $request['discription_ru'];
        $products->discription_en = $request['discription_en'];
        $products->star = $request['star'];
        $products->padcategory_id = $request['padcategory_id'];
        $products->photos = $photos;
        $products->save();
        return back()->with('success', 'Data uploaded successfully.');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::orderBy('id', 'desc')->get();
        $padcategories = PadCategory::orderBy('id', 'desc')->get();
        return view('dashboard.product.edit', [
            'categories' => $categories,
            'product' => $product,
            'padcategories' => $padcategories,
        ]);
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        $request = $request->toArray();
        if (!empty($request['photos'])) {
            foreach ($products->photos as $photo) {
                $this->fileDelete(null, null, $photo);
            }
            $photos = [];
            foreach ($request['photos'] as $photo) {
                array_push($photos, $this->photoSave($photo, 'image/product'));
            }
            $request['photos'] = $photos;
            $products->photos = $photos;
        }

        if (!empty($request['sertificat'])) {
            if (is_file(public_path($products->sertificat))) {
                unlink(public_path($products->sertificat));
            }
            $img_name = Str::random(10) . '.' . $request['sertificat']->getClientOriginalExtension();
            $request['sertificat']->move(public_path('/image/product'), $img_name);
            $products->sertificat = '/image/product/' . $img_name;
        }
        $products->name_uz = $request['name_uz'];
        $products->name_ru = $request['name_ru'];
        $products->name_en = $request['name_en'];
        if (!empty($request['name_uz'])){
            $products->slug = str_replace(' ', '_', strtolower($request['name_uz'])) . '-' . Str::random(5);
        }
        $products->category_id = $request['category_id'];
        $products->title_uz = $request['title_uz'];
        $products->title_ru = $request['title_ru'];
        $products->title_en = $request['title_en'];
        $products->article = $request['article'];
        $products->discription_uz = $request['discription_uz'];
        $products->discription_ru = $request['discription_ru'];
        $products->discription_en = $request['discription_en'];
        $products->star = $request['star'];
        $products->padcategory_id = $request['padcategory_id'];
        $products->save();
        return back()->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        foreach (Atribute::where('product_id', $id)->get() as $prod){
            $this->atributeController->destroy($prod->id);
        }
        $product = Product::find($id);
        foreach ($product->photos as $photo) {
            $this->fileDelete(null, null, $photo);
        }
        if (is_file(public_path($product->sertificat))) {
            unlink(public_path($product->sertificat));
        }
        $product->delete();
        return back()->with('success', 'Data deleted.');
    }
}
