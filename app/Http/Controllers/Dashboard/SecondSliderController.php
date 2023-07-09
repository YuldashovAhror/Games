<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SecondSlider;
use Illuminate\Http\Request;

class SecondSliderController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = SecondSlider::orderBy('id', 'desc')->get();
        return view('dashboard.secondslider.crud', [
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
        // dd($request->all());
        // $request = $request->toArray();
        // if (!empty($request['photos'])){
        //     $photos = [];
        //     foreach ($request['photos'] as $photo){
        //         array_push($photos, $this->photoSave($photo, 'image/secondslider'));
        //     }
        //     $request['photos'] = $photos;
        // }
        // SecondSlider::create($request);
        // return back()->with('success', 'Data uploaded successfully.');
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
        // dd($request->all());
        
        $request = $request->toArray();
        if (!empty($request['photo'])){
            $this->fileDelete('\SecondSlider', $id, 'photo');
            $request['photo'] = $this->photoSave($request['photo'], 'image/secondslider');
        }
        if (!empty($request['photo2'])){
            $this->fileDelete('\SecondSlider', $id, 'photo');
            $request['photo2'] = $this->photoSave($request['photo2'], 'image/secondslider');
        }
        if (!empty($request['photo3'])){
            $this->fileDelete('\SecondSlider', $id, 'photo');
            $request['photo3'] = $this->photoSave($request['photo3'], 'image/secondslider');
        }
        SecondSlider::find($id)->update($request);
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
        // dd('asd');
        $product = SecondSlider::find($id);
        foreach ($product->photos as $photo){
            $this->fileDelete(null, null, $photo);
        }
        // foreach ($product->docs as $doc){
        //     $this->productDocService->destroy($doc->id);
        // }
        $product->delete();
        return back()->with('success', 'Data deleted.');
    }
}
