<?php

namespace App\Console\Commands;

use Database\State\EnsureQuotesArePresent;
use Illuminate\Console\Command;

class EnsureProductionDatabaseState extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:ensure-production-database-state';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ensure production database is seeded.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        collect([
            new EnsureQuotesArePresent,
        ])->each->__invoke();
    }
}
