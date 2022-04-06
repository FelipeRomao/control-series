<?php

namespace App\Providers;

use App\Events\NewSerie;
use App\Events\SerieDeleted;
use App\Listeners\DeleteCoverSerie;
use App\Listeners\LogNewSerieRegistered;
use App\Listeners\SendEmailNewSerieRegistered;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewSerie::class => [
            SendEmailNewSerieRegistered::class,
            LogNewSerieRegistered::class,
        ],
        SerieDeleted::class => [
            DeleteCoverSerie::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
