<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $services = Service::all();
        return view('user.index', compact('services'));
    }

    public function dashboard()
    {
        try {

            $user = Auth::user();

            if ($user->user_type === 'admin') {

                return view('admin.dashboard');
            }
            elseif ($user->user_type === 'user') {

                return redirect('/');
            }
            else{

            }
        } catch (\Exception $e) {
            return redirect('/'); // Redirect to the base URL in case of an exception
        }
    }

    public  function getLogin()
    {
        return view('user.pages.admin_login');
    }


    /**
     * @throws ValidationException
     */
    public function storeAdminLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Check the user's type
            $user = Auth::user();
            if ($user->user_type === 'admin') {
                return redirect('admin/dashboard')->with('success','Admin Are login');
            } else {
                // If the user is not an admin, log them out
                Auth::logout();
                return redirect()->route('get-login')->with('error', 'You are not authorized to log in.');
            }
        }

        return redirect()->route('get-login')->with('error', 'Invalid credentials');
    }


}
