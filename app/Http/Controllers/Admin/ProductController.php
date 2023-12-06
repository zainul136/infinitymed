<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->with('services')->orderBy('id','desc')->get();

        return view('admin.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::query()->get();
        return view('admin.pages.products.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'description' => 'required',
            'service_id' => 'required',
            'image' => 'required|image',

        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {

            $products = new Product();
            $products->name = $request->name;
            $products->description = $request->description;
            $products->service_id = $request->service_id;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('assets/products-images'), $filename);
                $products->images = $filename;
            }

            $products->save();

            return redirect()->route('product.index')->with('success', 'Product Created Successfully');
        } catch (\Exception $e) {
            return redirect()->route('product.create')->with('error', 'An unexpected error occurred.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::query()->findOrFail($id);
        return view('admin.pages.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $services = Service::query()->get();
        $product = Product::query()->findOrFail($id);
        return view('admin.pages.products.edit', compact('product','services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {  $rules = [
        'name' => 'required|string',
        'description' => 'required',
        'service_id' => 'required',
    ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            $products = Product::query()->findOrFail($id);
            $products->name = $request->name;
            $products->description = $request->description;
            $products->service_id = $request->service_id;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('assets/products-images'), $filename);
                $products->images = $filename;
            }

            $products->save();

            return redirect()->route('product.index')->with('success', 'Product Update Successfully');
        } catch (\Exception $e) {
            return redirect()->route('product.create')->with('error', 'An unexpected error occurred.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::query()->findOrFail($id);

            if($product) {
                $product->delete();
            }

            return back()->with('success', 'Product record deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while deleting the weight loss record: ' . $e->getMessage());
        }

    }
}
