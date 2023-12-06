<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\APIResponse;
use App\Models\Question;
use App\Models\Service;
use App\Models\WeightLoss;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    use  APIResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::query()->with('services')->get();
        return view('admin.pages.question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::query()->get();
        return view('admin.pages.question.create',compact('services'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $rules = [
                'heading' => 'required|string',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $weightLoss = new Question();
            $weightLoss->heading = $request->heading;
            $weightLoss->service_id = $request->service_id;
            $weightLoss->save();

            return redirect()->route('question.index')->with('success', 'Question Created Successfully');
        } catch (QueryException $e) {
            return redirect()->route('question.create')->with('error', 'An error occurred while saving the record.');
        } catch (\Exception $e) {
            return redirect()->route('question.create')->with('error', 'An unexpected error occurred.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $services = Service::query()->get();
        $question = Question::query()->findOrFail($id);
        return view('admin.pages.question.edit',compact('question','services'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $rules = [
                'heading' => 'required|string',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $weightLoss = Question::query()->find($id);
            $weightLoss->heading = $request->heading;
            $weightLoss->service_id = $request->service_id;
            $weightLoss->save();

            return redirect()->route('question.index')->with('success', 'Question Updated Successfully');
        } catch (QueryException $e) {
            return redirect()->route('question.create')->with('error', 'An error occurred while saving the record.');
        } catch (\Exception $e) {
            return redirect()->route('question.create')->with('error', 'An unexpected error occurred.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $weightLoss = Question::query()->findOrFail($id);

            if ($weightLoss) {
                $weightLoss->delete();
            }

            return back()->with('success', 'Question record deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while deleting the weight loss record: ' . $e->getMessage());
        }

    }
}
