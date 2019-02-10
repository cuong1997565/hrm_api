<?php

namespace App\Events;

class ReadCandidateImportEvent extends Event
{
	public $pathFile;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($pathFile)
    {
        $this->pathFile = $pathFile;
    }
}
