<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function listUser(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::query()->where('user_type', '=', 'user')->get();
        return view('admin.pages.user.list', compact('users'));
    }

    public function adminProfile(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.pages.user.profile');
    }

    public function adminUpdateProfile(Request $request)
    {
        try{
            $user = Auth::user();
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'phone' => 'nullable|string|max:255',
                'street' => 'nullable|string|max:255',
                'city' => 'nullable|string|max:255',
                'zip_code' => 'nullable|string|max:255',
                'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->street = $request->street;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->zip_code = $request->zip_code;
            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('profile_image'), $filename);
                $user->profile_image = $filename;
            }
            $user->save();

            return redirect()->route('profile')->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions that might occur
            return redirect()->back()->with('error', 'An error occurred while updating your profile.');
        }
    }

}
