<?php

namespace App\Http\Controllers;

use App\Models\Feedbacks;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the admin page.
     *
     */

    public function ShowAdminPage()
    {
        $user_feedback = Feedbacks::all();
        return view('admin.admin', compact('user_feedback'));
    }

    /**
     * Function for change request status.
     * @param Request $feedback $id
     * @return void
     */
    public function CheckStatus(Request $request, $id)
    {
        $feedback = Feedbacks::find($id);
        $feedback->status = $request->input('status');
        $feedback->save();
        return redirect()->back();
    }

    /**
     * Display the all users.
     *
     */
    public function CreateAdminView()
    {
        $users = User::all();
        return view('users.user_list', compact('users'));
    }

    /**
     * Add admin role to user.
     * @param Request $feedback $id
     * @return void
     */
    public function CreateAdmin(Request $request, $id)
    {
        $user = User::find($id);
        $user->role = $request->input('role');
        $user->save();
        return redirect()->back();
    }
}
