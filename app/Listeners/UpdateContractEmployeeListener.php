<?php

namespace App\Listeners;

use App\Repositories\Contracts\ContractRepository;
use App\Events\UpdateContractEmployeeEvent;

class UpdateContractEmployeeListener
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
    public function handle(UpdateContractEmployeeEvent $event)
    {
        $this->contract->update($event->contracts['id'], $event->contracts);
    }
}
