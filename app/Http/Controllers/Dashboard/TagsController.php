<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CatalogTeg;
use Illuminate\Http\Request;

class TagsController extends BaseController
{
    public function home()
    {
        $tags = CatalogTeg::find(1);
        return view('dashboard.tags.crud', [
            'tags'=>$tags
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:20480',
            'name' => 'required|string|max:255',
            'discription' => 'required|string|max:255',
            'catalog_photo' => 'image|mimes:jpeg,png,jpg,gif|max:20480',
            'catalog_name' => 'required|string|max:255',
            'catalog_discription' => 'required|string|max:255',
        ]);

        if (!empty($validatedData['photo'])) {
            $this->fileDelete('\CatalogTeg', $id, 'photo');
            $validatedData['photo'] = $this->photoSave($validatedData['photo'], 'image/catalogTeg');
        }

        if (!empty($validatedData['catalog_photo'])) {
            $this->fileDelete('\CatalogTeg', $id, 'catalog_photo');
            $validatedData['catalog_photo'] = $this->photoSave($validatedData['catalog_photo'], 'image/catalogTeg');
        }
        CatalogTeg::find($id)->update($validatedData);

        return redirect()->route('dashboard.home.teg')->with('success', 'Data updated successfully.');
    }
}
