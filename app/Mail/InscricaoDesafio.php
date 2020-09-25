<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InscricaoDesafio extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $desafio;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $desafio)
    {
        $this->user = $user;
        $this->desafio = $desafio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('desafio300dias@gmail.com')
        ->view('emails.inscricao_desafio')
        ->with([
            'user' => $this->user,
            'desafio' => $this->desafio,
        ]);
    }
}
