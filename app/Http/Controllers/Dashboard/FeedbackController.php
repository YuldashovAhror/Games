<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with('products')->orderBy('id', 'desc')->get();
        return view('dashboard.feedback.crud', [
            'feedbacks'=>$feedbacks
        ]);
    }

    public function destroy($id)
    {
        Feedback::find($id)->delete();
        return back()->with('success', 'Data deleted.');
    }
}
