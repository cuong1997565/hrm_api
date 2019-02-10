<?php

namespace App\Events;

use App\Repositories\Plans\Plan;

class SendEmailNotificationNewPlanEvent
{
    public $plan;
    public $emails;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Plan $plan, $emails)
    {
        $this->plan = $plan;
        $this->emails = $emails;
    }
}
