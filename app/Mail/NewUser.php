<?php

namespace BullsEye\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class NewUser extends Mailable
{
    use Queueable, SerializesModels;
    protected $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($param)
    {
        //
        $this->name  =  $param['name'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.new_user')
            ->with('name', $this->name)
            ->subject('Thank you for Sign Up - Bulls Eye');
    }
}
