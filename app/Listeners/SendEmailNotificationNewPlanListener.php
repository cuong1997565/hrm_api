<?php

namespace App\Listeners;

use App\Events\SendEmailNotificationNewPlanEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailer;
use App\Mail\NotifyNewPlan;

class SendEmailNotificationNewPlanListener implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;

    public function __construct() 
    {
    }

    /**
     * Handle the event.
     *
     * @param  Event  $event
     * @return void
     */
    public function handle(SendEmailNotificationNewPlanEvent $event)
    {
        foreach ($event->emails as $key) {
            Mail::to($event->emails)->send(new NotifyNewPlan($event->plan));
        }
    }
}
