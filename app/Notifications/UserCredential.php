<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserCredential extends Notification
{
    use Queueable;
    protected $name;
    protected $email;
    protected $password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($email_data)
    {
        $this->email = $email_data['email'];
        $this->name = $email_data['name'];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Account Credentials')
            ->from('noreply@roaster.com', 'CapitalFirst')
            ->view('emails.email', ['name' => $notifiable->name, 'email' => $notifiable->email]);


        // ->line('The introduction to the notification.')
        // ->action('Notification Action', url('/'))
        // ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}