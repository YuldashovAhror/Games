<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\InstagramSlider;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderInstagramController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = InstagramSlider::orderBy('id', 'desc')->get();
        return view('dashboard.instagramslider.crud', [
            'sliders'=>$sliders
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
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
            'link' => 'nullable',
        ]);

        if (!empty($validatedData['photo'])) {
            $validatedData['photo'] = $this->photoSave($validatedData['photo'], 'image/istagramslider');
        }
        InstagramSlider::create($validatedData);

        return redirect()->route('dashboard.instagramslider.index')->with('success', 'Data uploaded successfully.');
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
            'link' => 'nullable',
        ]);

        if (!empty($validatedData['photo'])) {
            $this->fileDelete('\InstagramSlider', $id, 'photo');
            $validatedData['photo'] = $this->photoSave($validatedData['photo'], 'image/istagramslider');
        }
        InstagramSlider::find($id)->update($validatedData);

        return redirect()->route('dashboard.instagramslider.index')->with('success', 'Data uploaded successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->fileDelete('\InstagramSlider', $id, 'photo');
        InstagramSlider::find($id)->delete();
        return back()->with('success', 'Data deleted.');
    }
}
