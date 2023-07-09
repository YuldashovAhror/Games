<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PadCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class PadCategoryController extends Controller
{
    private $productController;
    public function __construct(ProductController $productController)
    {
        $this->productController = $productController;
    }

    public function index()
    {
        $padcategories = PadCategory::with('categories')->orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        return view('dashboard.padcategory.crud', [
            'padcategories'=>$padcategories,
            'categories'=>$categories,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|integer|max:255',
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);
        $padcategory = new PadCategory();
        $padcategory->name_uz = $validatedData['name_uz'];
        $padcategory->name_ru = $validatedData['name_ru'];
        $padcategory->name_en = $validatedData['name_en'];
        $padcategory->category_id = $validatedData['category_id'];
        $padcategory->save();

        return redirect()->route('dashboard.padcategory.index')->with('success', 'Data uploaded successfully.');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|integer|max:255',
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);
        $padcategory = PadCategory::find($id);
        $padcategory->name_uz = $validatedData['name_uz'];
        $padcategory->name_ru = $validatedData['name_ru'];
        $padcategory->name_en = $validatedData['name_en'];
        $padcategory->category_id = $validatedData['category_id'];
        $padcategory->save();

        return redirect()->route('dashboard.padcategory.index')->with('success', 'Data uploaded successfully.');
    }

    public function destroy($id)
    {
        PadCategory::find($id)->delete();
        foreach (Product::where('padcategory_id', $id)->get() as $prod) {
            $this->productController->destroy($prod->id);
        }
        return back()->with('success', 'Data deleted.');
    }
}
