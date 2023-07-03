<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('dashboard.category.crud', [
            'categories'=>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
            'ok' => 'nullable',
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);

        if (!empty($validatedData['photo'])) {
            $validatedData['photo'] = $this->photoSave($validatedData['photo'], 'image/category');
        }
        if (!empty($validatedData['icon'])) {
            $validatedData['icon'] = $this->photoSave($validatedData['icon'], 'image/category');
        }
        if (!empty($validatedData['ok'])){
            $validatedData['ok'] = 1;
        }
        Category::create($validatedData);

        return redirect()->route('dashboard.category.index')->with('success', 'Data uploaded successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:20480',
            'icon' => 'image|mimes:jpeg,png,jpg,gif|max:20480',
            'ok' => 'nullable',
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);

        if (!empty($validatedData['photo'])) {
            $this->fileDelete('\Category', $id, 'photo');
            $validatedData['photo'] = $this->photoSave($validatedData['photo'], 'image/category');
        }
        if (!empty($validatedData['icon'])) {
            $this->fileDelete('\Category', $id, 'icon');
            $validatedData['icon'] = $this->photoSave($validatedData['icon'], 'image/category');
        }
        if (!empty($validatedData['ok'])){
            $validatedData['ok'] = 1;
        }
        if (empty($validatedData['ok'])){
            $validatedData['ok'] = 0;
        }
        Category::find($id)->update($validatedData);

        return redirect()->route('dashboard.category.index')->with('success', 'Data uploaded successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->fileDelete('\Category', $id, 'photo');
        $this->fileDelete('\Category', $id, 'icon');
        Category::find($id)->delete();
        return back()->with('success', 'Data deleted.');
    }
}
