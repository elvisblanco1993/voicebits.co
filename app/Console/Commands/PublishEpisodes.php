<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\ReleaseScheduledEpisodes;

class PublishEpisodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'episodes:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publishes any due scheduled episodes within all podcasts.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        ReleaseScheduledEpisodes::dispatch();
    }
}
