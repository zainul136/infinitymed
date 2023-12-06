<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatbotSubmission extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'help',
        'medical_conditions',
        'contact_preference',
        'email',
        'phone',
        'call_time',
        'urgent',
    ];
}
