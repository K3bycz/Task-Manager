<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use voku\helper\HtmlMin;

class Hello extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('pkapustka@edu.cdv.pl', 'Piotr Kapustka')
            ->subject('Test')
            ->view('mails.welcome');
    }

    public function getContent()
    {
        $content = $this->build()->render();

        // Usuwanie białych znaków, tabulatoróœ itp.
        // $htmlMin = new HtmlMin();
        // $compressedContent = $htmlMin->minify($content);

        $compressedContent = gzcompress($content);

        return $compressedContent;
    }
}
