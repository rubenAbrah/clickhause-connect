<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoicePaid extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected string $text = "";

    protected $formFill;
    protected $text_body;
    public function __construct($text)
    {
        $this->text = $text;
        // $this->formFill = $formFillInit;
        // $status = Status::find($this->formFill->status_id);

        // $status_name = $status->name;

        $formName = '$formEdit->form_title';
        // $form_edit_id = $this->formFill->form_edit_id;

        $link = "<a href='/formFills/create?form_edit_id=form_edit_id'><b class='text-success'>$formName</b></a>";
        $this->text_body = "Форма: $link, Статус Изменён: <b class='text-info'>status_name</b>";
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // return ['mail'];
        return  ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $text = json_encode($notifiable);
        return (new MailMessage)->subject('New message')
        ->markdown('vendor.notifications.myMailMarkdown')
        // ->greeting('Comment Upvoted!')
        // ->tag('upvote')
        ->line(json_encode($notifiable))
        ;

        // $url = url('/invoice/'.$this->form_fill->id);
        // return (new MailMessage)
        //         ->greeting('Hello!')
        //         ->line('One of your invoices has been paid!')
        //         ->lineIf($this->amount > 0, "Amount paid: {$this->amount}")
        //         ->action('View Invoice', $url)
        //         ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return
            [
                "data123" => $notifiable
            ];
    }
}
