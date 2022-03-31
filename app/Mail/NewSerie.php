<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewSerie extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $am_seasons;
    public $ep_season;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $am_seasons, $ep_season)
    {
        $this->name = $name;
        $this->am_seasons = $am_seasons;
        $this->ep_season = $ep_season;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.serie.new-serie');
    }
}
