<?php

namespace App\Listeners;

use App\Events\DeadlinePublished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\DeadlineCreated;

class SendDeadlineCreatedNotification
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
     * @param  DeadlinePublished  $event
     * @return void
     */
    public function handle(DeadlinePublished $event)
    {
        \Mail::to($event->deadline->owner->email)-> send(
        new DeadlineCreated($event->deadline)
        );
    }
}
