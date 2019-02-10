<?php

namespace App\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\StoreContractEmployeeEvent::class => [
            \App\Listeners\StoreContractEmployeeListener::class,
        ],
        \App\Events\UpdateContractEmployeeEvent::class => [
            \App\Listeners\UpdateContractEmployeeListener::class,
        ],
        \App\Events\StoreOrUpdateDepartmentEmployeeEvent::class => [
            \App\Listeners\StoreOrUpdateDepartmentEmployeeListener::class,
        ],
        \App\Events\StoreOrUpdateInterviewEvent::class => [
            \App\Listeners\StoreOrUpdateInterviewListener::class,
        ],
        \App\Events\StoreAccountForEmployeeEvent::class => [
            \App\Listeners\StoreAccountForEmployeeListener::class,
        ],
        \App\Events\SendEmailNotificationNewPlanEvent::class => [
            \App\Listeners\SendEmailNotificationNewPlanListener::class,
        ],
        \App\Events\StoreOrUpdatePlanDetailEvent::class => [
            \App\Listeners\StoreOrUpdatePlanDetailListener::class,
        ],    
        \App\Events\ReadCandidateImportEvent::class => [
            \App\Listeners\ReadCandidateImportListener::class,
        ],
    ];
}
