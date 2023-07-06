<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // $token = '6009160734:AAGJ8ltyAphlPaOvZGV1JWuRe7x-ek_lB8E';
        // $group = [
        //     'text' => "Имя: " . $request->name . "\n" . "Телефон: " . $request->phone . "\n" ."Тип:" . Type::find($request->type)->name_ru."\n" . "Ширина:".$request->width . "\n". "Высота:".$request->height . "\n" . "Проект: Poklik", 'chat_id' => '-814757227'];
        // file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($group));
        dd($request->all());
        $feedback = new Feedback();
        $feedback->name = $request->name;
        $feedback->phone = $request->phone;
        $feedback->product_id = $request->product_id;
        $feedback->save();
        return back();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
