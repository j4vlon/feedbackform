<?php

namespace App\Http\Controllers;

use App\Models\Feedbacks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function ShowAdminPage()
    {
        $user_feedback = Feedbacks::all();
        return view('admin.admin', compact('user_feedback'));
    }
    public function CheckStatus(Request $request, $id)
    {
        $feedback = Feedbacks::find($id);
        $feedback->status = $request->input('status');
        $feedback->save();
        return redirect()->back();
    }
}
