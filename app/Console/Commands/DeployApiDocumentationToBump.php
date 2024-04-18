<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class DeployApiDocumentationToBump extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:deploy-api-documentation-to-bump';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deploy the API documentation to Bump.sh.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::withToken(config('services.bump.key'))
            ->post('https://bump.sh/api/v1/versions', [
                'definition' => file_get_contents(storage_path('openapi.json')),
                'documentation' => config('services.bump.documentation'),
                'branch' => config('services.bump.branch'),
            ]);

        if (! $response->successful()) {
            return $this->components->error($response->json('message'));
        }

        return $this->components->info('API spec deployed to bump successfully.');
    }
}
