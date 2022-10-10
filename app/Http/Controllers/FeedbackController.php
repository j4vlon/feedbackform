<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FeedbackRequest;
use App\Models\{Feedbacks};
use Carbon\Carbon;

class FeedbackController extends Controller
{

    /**
     * Display the feedback form.
     *
     */
    public function ShowFeedbackPage()
    {
        return view('users.feedbackform');
    }

    /**
     * Store a newly created request in DB.
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
        /**
         * Update the last feedback time for user.
         */
        $format = 'Y-m-d H:i:s';
        $user->last_feedback = Carbon::now()->format($format);

        /**
         * Save the last feedback time for user.
         */
        $user->save();

        $feedback->save();
        return redirect()->back()->with('success', 'Ваша заявка принята!');
    }
}
