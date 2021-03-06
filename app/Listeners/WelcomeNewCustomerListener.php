<?php

namespace App\Listeners;

use App\Mail\WelcomeNewUserMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class WelcomeNewCustomerListener implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        sleep(10);

        // Send Mail
        Mail::to($event->customer->email)->send(new WelcomeNewUserMail());
    }
}
