<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KirimEmailPelanggan extends Mailable
{
    use Queueable, SerializesModels;
    public $service_masuk;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($service_masuk)
    {
        $this->service_masuk = $service_masuk;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Pesanan sedang diperbaiki!')->view('dash.email.email_kirim_pelanggan');
    }
}
