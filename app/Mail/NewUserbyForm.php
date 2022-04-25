<?php

namespace BullsEye\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class NewUserbyForm extends Mailable
{
    use Queueable, SerializesModels;
    protected $name;
    protected $email;
    protected $pass;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($param)
    {
       // dd($param);
        $this->name = $param['name'];
        $this->email = $param['email'];
     /*   $this->pass = $param['pass'];*/
    }
    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->markdown('emails.new_user_byform')->with('name', $this->name)->with('email', $this->email)->subject('Welcome to Bulls Eye');
    }
}
