<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderNoti extends Mailable
{
    use Queueable, SerializesModels;

    public $cus;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cus)
    {
        $this->cus = $cus;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.order.Noti');
    }
}
