<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('id', 'desc')->get();
        return view('dashboard.client.crud', [
            'clients'=>$clients
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
            'photo' => 'mimes:jpeg,png,jpg,gif,pdf,xls,xlsx|max:20480',
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);
        $client = new Client();

        if(!empty($validatedData['photo'])){
            $client['photo'] = $this->fileSave($validatedData['photo'], 'image/client');
        }
        $client->name_uz = $validatedData['name_uz'];
        $client->name_ru = $validatedData['name_ru'];
        $client->name_en = $validatedData['name_en'];
        $client->save();

        return redirect()->route('dashboard.client.index')->with('success', 'Data uploaded successfully.');
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
            'photo' => 'mimes:jpeg,png,jpg,gif,pdf,xls,xlsx|max:20480',
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);
        $client = Client::find($id);

        if(!empty($validatedData['photo'])){
            $this->fileDelete('\Client', $id, 'photo');
            $client['photo'] = $this->fileSave($validatedData['photo'], 'image/client');
        }
        $client->name_uz = $validatedData['name_uz'];
        $client->name_ru = $validatedData['name_ru'];
        $client->name_en = $validatedData['name_en'];
        $client->save();

        return redirect()->route('dashboard.client.index')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->fileDelete('\Client', $id, 'photo');
        Client::find($id)->delete();
        return back()->with('success', 'Data deleted.');
    }
}
