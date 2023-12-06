<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\APIResponse;
use App\Models\Service;
use App\Models\WeightLoss;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WeightLossController extends Controller
{
    use  APIResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $weightLosses = WeightLoss::with('services')->get();

        return view('admin.pages.weightLoss.index', compact('weightLosses'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::query()->get();

        return view('admin.pages.weightLoss.create',compact('services'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $rules = [
                'description' => 'required|string',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $weightLoss = new WeightLoss();
            $weightLoss->service_id = $request->service_id;

            $weightLoss->description = $request->description;
            $weightLoss->save();

            return redirect()->route('weight-loss.index')->with('success', 'Weight Loss Created Successfully');
        } catch (QueryException $e) {
            return redirect()->route('weight-loss.create')->with('error', 'An error occurred while saving the record.');
        } catch (\Exception $e) {
            return redirect()->route('weight-loss.create')->with('error', 'An unexpected error occurred.');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $weightLoss = WeightLoss::query()->findOrFail($id);
        if (!$weightLoss) {
            return redirect()->route('weight-loss.index')->with('error', 'Weight Loss record not found.');
        }
        return view('admin.pages.weightLoss.show',compact('weightLoss'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $services = Service::query()->get();

        $weightLoss = WeightLoss::query()->findOrFail($id);

        if (!$weightLoss) {
            return redirect()->route('weight-loss.index')->with('error', 'Weight Loss record not found.');
        }

        return view('admin.pages.weightLoss.edit', compact('weightLoss','services'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'description' => 'required|string|max:5000',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('weight-loss.edit', ['id' => $id])->withErrors($validator)->withInput();
        }

        $weightLoss = WeightLoss::query()->findOrFail($id);
        if (!$weightLoss) {
            return redirect()->route('weight-loss.index')->with('error', 'Weight Loss record not found.');
        }
        $weightLoss->service_id = $request->service_id;
        $weightLoss->description = $request->description;
        $weightLoss->save();

        return redirect()->route('weight-loss.index')->with('success', 'Weight Loss Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $weightLoss = WeightLoss::query()->findOrFail($id);
            if($weightLoss) {
                $weightLoss->delete();
            }
            return back()->with('success', 'Weight loss record deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while deleting the weight loss record: ' . $e->getMessage());
        }

    }
}
