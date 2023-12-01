<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunAdditionalDataFetchCommands extends Command
{
    protected $signature = 'custom:epurchasing';
    protected $description = 'Run additional data fetch commands';

    public function handle()
    {
        // Specify the additional commands to be executed
        $additionalCommands = [
            'fetch:epurchasing-details',
            'fetch:epurchasing-penyedias',
            'fetch:epurchasing-distributors',
            'fetch:epurchasing-komoditas',
            'fetch:epurchasing-pokjas',
            'fetch:epurchasing-ppks',
        ];

        foreach ($additionalCommands as $command) {
            $this->call($command);
        }

        $this->info('All epruchasing details commands executed successfully.');
    }
}