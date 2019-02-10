<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use App\Repositories\Candidates\CandidateRepository;
use App\Events\ReadCandidateImportEvent;
use Maatwebsite\Excel\Facades\Excel;
use App\Jobs\StoreCandidateImportJob;

class ReadCandidateImportListener implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;
    
    public $tries = 2;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(CandidateRepository $candidateRepo)
    {
        $this->candidate = $candidateRepo;
    }

    /**
     * Handle the event.
     *
     * @param  ExampleEvent  $event
     * @return void
     */
    public function handle(ReadCandidateImportEvent $event)
    {
        Excel::filter('chunk')->load('/storage/'.$event->pathFile)->chunk(250, function($results) {
              dispatch(new StoreCandidateImportJob($results));
        }, false);
        $this->candidate->removeFileImport($event->pathFile);
    }
}
