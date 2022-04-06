<?php

namespace App\Listeners;

use App\Events\SerieDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Storage;

class DeleteCoverSerie implements ShouldQueue
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
     * @param  SerieDeleted  $event
     * @return void
     */
    public function handle(SerieDeleted $event)
    {
        $serie = $event->serie;

        if($serie->cover) {
            Storage::delete($serie->cover);
        }
    }
}
