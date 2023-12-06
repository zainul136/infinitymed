<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.pages.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {

        $file = $request->file('image');
        $extention = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extention;
        $file->move('admin/services/', $filename);

        $service = new Service();
        $service->name = $request->name;
        $service->slug = $request->slug;
        $service->image = $filename;
        $service->save();

        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        $service = Service::find($service)->first();
        if (!$service) {
            return redirect()->route('admin.pages.services.index');
        }
        return view('admin.pages.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $service = Service::find($service)->first();
        if (!$service) {
            return redirect()->route('admin.pages.services.index');
        }
        return view('admin.pages.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if ($request->hasFile('image')) {
            $user = DB::table('services')->where('id', $request->id)->first();
            if (!is_null($user)) {
                $desitination = 'admin/services/' . $user->image;
                if (File::exists($desitination)) {
                    File::delete($desitination);
                }
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('admin/services/', $filename);
                DB::table('services')->where('id', $request->id)->update([
                    'image' => $filename,
                ]);
            }
        }
        DB::table('services')->where('id', $request->id)->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service = Service::find($service)->first();
        if ($service) {
            $desitination = 'admin/services/' . $service->image;
            if (File::exists($desitination)) {
                File::delete($desitination);
            }
            $service->delete();
        }
        return back();
    }
}
