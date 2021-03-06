<?php

namespace App\Listeners;

use App\Repositories\Contracts\ContractRepository;
use App\Events\StoreContractEmployeeEvent;

class StoreContractEmployeeListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(ContractRepository $contractRepo)
    {
        $this->contract = $contractRepo;
    }

    /**
     * Handle the event.
     *
     * @param  ExampleEvent  $event
     * @return void
     */
    public function handle(StoreContractEmployeeEvent $event) {
        $event->contracts['employee_id'] = $event->employee->id;
        $this->contract->store($event->contracts);
    }
}
