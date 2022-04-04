<?php

namespace App\Listeners;

use App\Events\NewSerie;
use App\User;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailNewSerieRegistered implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewSerie  $event
     * @return void
     */
    public function handle(NewSerie $event)
    {
        $users = User::all();
        foreach($users as $index => $user) {
            $multiplier = $index + 1;

            $email = new \App\Mail\NewSerie($event->name, $event->am_seasons, $event->ep_season);
            $email->subject('New serie registered');

            $when = now()->addSecond($multiplier * 10);
            Mail::to($user)->later($when, $email);
        }
    }
}
