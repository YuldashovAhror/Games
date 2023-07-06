<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends BaseController
{
    private $productController;
    public function __construct(ProductController $productController)
    {
        $this->productController = $productController;
    }

    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('dashboard.category.crud', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:20480',
            'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            'ok' => 'nullable',
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);
        $category = new Category();

        if(!empty($validatedData['photo'])){
            $category['photo'] = $this->photoSave($validatedData['photo'], 'image/category');
        }
        if (!empty($validatedData['icon'])) {
            $img_name = Str::random(10) . '.' . $validatedData['icon']->getClientOriginalExtension();
            $validatedData['icon']->move(public_path('/image/category'), $img_name);
            $category->icon = '/image/category/' . $img_name;
        }
        if (!empty($validatedData['ok'])) {
            $validatedData['ok'] = 1;
        }
        $category->name_uz = $request->name_uz;
        $category->name_ru = $request->name_ru;
        $category->name_en = $request->name_en;
        $category->save();

        return redirect()->route('dashboard.category.index')->with('success', 'Data uploaded successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:20480',
            'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            'ok' => 'nullable',
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);

        $category = Category::find($id);
        if(!empty($validatedData['photo'])){
            $this->fileDelete('\Category', $id, 'photo');
            $category['photo'] = $this->photoSave($validatedData['photo'], 'image/category');
        }

        if (!empty($validatedData['icon'])) {
            
            $this->fileDelete('\Category', $id, 'icon');
            $img_name = Str::random(10) . '.' . $validatedData['icon']->getClientOriginalExtension();
            $validatedData['icon']->move(public_path('/image/category'), $img_name);
            $category->icon = '/image/category/' . $img_name;
        }

        if (!empty($validatedData['ok'])) {
            $validatedData['ok'] = 1;
        }
        else {
            $validatedData['ok'] = 0;
        }
            
        $category->name_uz = $validatedData['name_uz'];
        $category->name_ru = $validatedData['name_ru'];
        $category->name_en = $validatedData['name_en'];
        $category->ok = $validatedData['ok'];
        
        $category->save();
        return redirect()->route('dashboard.category.index')->with('success', 'Data updated successfully.');
    }

    public function destroy($id)
    {
        $this->fileDelete('\Category', $id, 'photo');
        $this->fileDelete('\Category', $id, 'icon');
        Category::find($id)->delete();
        foreach (Product::where('category_id', $id)->get() as $prod) {
            $this->productController->destroy($prod->id);
        }
        return back()->with('success', 'Data deleted.');
    }
}
