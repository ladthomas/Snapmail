<?php

// app/Mail/MessageNotification.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $photoPath;
    
    public function __construct($token, $photoPath)
    {
        $this->token = $token;
        $this->photoPath = $photoPath;
    }
    
    public function build()
    {
        return $this->view('emails.notification')->with([
            'token' => $this->token,
            'photoPath' => $this->photoPath,
        ]);
    }
    
}

