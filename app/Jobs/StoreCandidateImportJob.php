<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\Candidates\CandidateRepository;

class StoreCandidateImportJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $results;
    /**
     * Create a new job instance.
     *
     * @param  Podcast  $podcast
     * @return void
     */
    public function __construct($results)
    {
        $this->results = $results;
    }

    /**
     * Execute the job.
     *
     * @param  AudioProcessor  $processor
     * @return void
     */
    public function handle()
    {
        foreach($this->results as $key => $value) {
            $insert[] = [
                'name'           => $value->name, 
                'email'          => $value->email,
                'phone'          => $value->phone,
                'source'         => $value->source,
                'date_apply'     => $value->date_apply,
                'time_interview' => $value->time_interview,
                'plan_id'        => $value->plan_id,
                'position_id'    => $value->position_id
            ];
        }
        app()->make(CandidateRepository::class)->storeArray($insert);
    }
}