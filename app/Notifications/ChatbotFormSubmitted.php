<?php

namespace App\Notifications;

use App\Models\ChatbotSubmission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;

class ChatbotFormSubmitted extends Notification
{
    use Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new notification instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $data = $this->data; // Access the data passed to the notification

        return (new MailMessage)
            ->subject('Chatbot Form Submission')
            ->line('A chatbot form has been submitted:')
            ->line('Name: ' . $data['name'])
            ->line('Help: ' . $data['help'])
            ->line('Medical Conditions: ' . $data['medical_conditions'])
            ->line('Contact Preference: ' . $data['contact_preference'])
            ->line('Email Address: ' . $data['email'])
//            ->line('Phone Number: ' . $data['phone'])
//            ->line('Best Time to Call: ' . $data['call_time'])
//            ->line('Query is Urgent: ' . ($data['urgent'] ? 'Yes' : 'No'))
            ->line('Thank you for your submission.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
