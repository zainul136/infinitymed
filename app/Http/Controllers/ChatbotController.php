<?php

namespace App\Http\Controllers;

use App\Models\ChatbotSubmission;
use App\Notifications\ChatbotFormSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Notification;

class ChatbotController extends Controller
{

    public function store(Request $request)
    {
        // print_r($request->all());
        // // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'help' => 'required|string',
            'medical_conditions' => 'nullable|string',
            'contact_preference' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'call_time' => 'nullable|string',
            'urgent' => 'boolean',
        ]);
        $Data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
         
        Mail::to($request->email)->send(new SendMail($Data));
        $chatbotSubmission = ChatbotSubmission::create($request->all());

        return redirect()->back()->with('success', 'Form submitted successfully.');
    }
}
