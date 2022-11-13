<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $user_id)
    {
        $user = User::find($user_id);
        if($user)
        {
            $user->role_as = $request->role_as;
            $user->update();
            return redirect('admin/users')->with('message', 'Updated Successfully');
        }
        return redirect('admin/users')->with('message', 'No User Found');
    }


    /**
     * @param integer $user_id
     * @param integer $status_code
     * @return \Illuminate\Http\RedirectResponse Response.
     */
    public function updateStatus($user_id, $status_code)
    {
        try {
            $update_user = User::whereId($user_id)->update([
                'status' => $status_code
            ]);

            if ($update_user) {
                return redirect('admin/users')->with('success', 'User Status Updated Successfully');
            }
            return redirect('admin/users')->with('error', 'Fail to update user status');

        } catch (\Throwable $th)
        {
            throw $th;
        }
    }
}
