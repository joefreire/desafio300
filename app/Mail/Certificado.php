<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Certificado extends Mailable
{
    use Queueable, SerializesModels;
    public $userDesafio;
    public $nome;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userDesafio, $nome)
    {
        $this->userDesafio = $userDesafio;
        $this->nome = $nome;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('desafio300dias@gmail.com')
        ->view('emails.certificado')
        ->with([
            'userDesafio' => $this->userDesafio,
            'nome' => $this->nome,
        ]);
    }
}
