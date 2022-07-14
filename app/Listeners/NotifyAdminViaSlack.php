<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Providers\NewCustomerHasRegisteredEvent;

class NotifyAdminViaSlack
{
    /**
     * Handle the event.
     *
     * @param  NewCustomerHasRegisteredEvent  $event
     * @return void
     */
    public function handle(NewCustomerHasRegisteredEvent $event)
    {
        // Slack notification to Admin
        dump('Slack Message Here....');
    }
}
