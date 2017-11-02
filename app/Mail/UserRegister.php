<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegister extends Mailable
{
    use Queueable, SerializesModels;


    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    /**
     * Build the message.
     *
     * @return $this
     */

    
    public function build()
    {
     // dd( $this->user->name) ;
        return $this->from('iranroute@example.com')->view('emails.users.register')->with([
            'Name' => $this->user->name,
            'token'=>$this->user->code_verify,
        ]);
       
    }
}
