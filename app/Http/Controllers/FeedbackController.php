<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FeedbackRequest;
use Illuminate\Http\Request;
use App\Models\{Feedbacks, User};
use Carbon\Carbon;

class FeedbackController extends Controller
{
    public function ShowFeedbackPage()
    {
        return view('users.feedbackform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\FeedbackRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function SendFeedback(FeedbackRequest $request)
    {
        $user = Auth::user();
        $feedback = new Feedbacks();
        $feedback->user_id = $user->id;
        $feedback->user_name = $user->name;
        $feedback->user_email = $user->email;
        $feedback->feedback_theme = $request->input('theme');
        $feedback->feedback = $request->input('message');
        if ($request->hasfile('file_url')) {
            $path = $request->file_url->store('uploads', 'public');
            $feedback->file_url = '/storage/' . $path;
        }

        Auth::user()->updateLastFeedback();

        $feedback->save();
        return redirect()->back()->with('success', 'Ваша заявка принята!');
    }
}
