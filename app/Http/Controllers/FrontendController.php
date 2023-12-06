<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use App\Models\WeightLoss;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|RedirectResponse|View
     */
    public function about(): View|Factory|Application|RedirectResponse
    {
        return view('user.pages.about');
    }

    /**
     * Display a listing of the resource.
     *
     * @param $slug
     * @return Application|Factory|RedirectResponse|View
     */

    public function cardDetails($slug): View|Factory|Application|RedirectResponse
    {
        $service = Service::query()->where('slug', '=', $slug)->with('weightLoss')->first();
        $weightLoss =  WeightLoss::query()->where('service_id', $service->id)->first();
        if (!$service) {
            return redirect()->back();
        }
        return view('user.pages.card-details', compact('service', 'weightLoss'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\Foundation\Application|View
     */
    public function assessment($slug)
    {
        $service = Service::query()->where('slug', '=', $slug)->with('question')->first();
        $assessments = $service->question;
        return view('user.pages.assessment', compact('assessments', 'slug'));
    }

    public function getServiceProducts(Request $request)
    {

        $service = Service::query()->where('slug', '=', $request->slug)->with('question')->first();
        $products = Product::query()->where('service_id', '=', $service->id)->with('services')->get();
        return response()->json(['data' => $products], 200);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|RedirectResponse|View
     */
    public function contactUS(): View|Factory|RedirectResponse|Application
    {
        return view('user.pages.contact');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|RedirectResponse|View
     */
    public function userProfile(): View|Factory|RedirectResponse|Application
    {
        return view('user.pages.edit-profile');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return View|Factory|RedirectResponse|Application
     */
    public function userUpdateProfile(Request $request): View|Factory|RedirectResponse|Application
    {
        try {
            $user = Auth::user();
            // Validate the form data
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'phone' => 'nullable|string|max:255',
                'street' => 'nullable|string|max:255',
                'city' => 'nullable|string|max:255',
                'zip_code' => 'nullable|string|max:255',
                'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Example image validation
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            // Update the user profile data
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->street = $request->street;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->zip_code = $request->zip_code;

            // Handle image upload
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
