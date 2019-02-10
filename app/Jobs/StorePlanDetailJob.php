<?php

namespace App\Jobs;

use App\Repositories\PlanDetails\PlanDetailRepository;

class StorePlanDetailJob
{
    protected $planId;
    protected $data;
    /**
     * Create a new job instance.
     *
     * @param  Podcast  $podcast
     * @return void
     */
    public function __construct($planId, $data)
    {
        $this->planId = $planId;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @param  AudioProcessor  $processor
     * @return void
     */
    public function handle()
    {
        $planId = $this->planId;
        $insertData = [];
        foreach ($this->data as $key => $value) {
            $insertData[] = [
                'plan_id' => $planId,
                'department_id' => $value['department_id'],
                'position_id' => $value['position_id'],
                'quantity' => $value['quantity']
            ];
        }
        app()->make(PlanDetailRepository::class)->storeArray($insertData);
    }
}