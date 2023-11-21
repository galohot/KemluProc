<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunAllDataFetchCommands extends Command
{
    protected $signature = 'custom:run-all-commands';
    protected $description = 'Run all data fetch commands';

    public function handle()
    {
        // Execute each command one by one
        $this->call('fetch:data_sirup', ['year' => 2022]);
        $this->call('fetch:data_lpse', ['year' => 2022]);
        $this->call('fetch:data_epurchasing', ['year' => 2022]);
        $this->call('fetch:data_sirup', ['year' => 2023]);
        $this->call('fetch:data_lpse', ['year' => 2023]);
        $this->call('fetch:data_epurchasing', ['year' => 2023]);
        $this->call('fetch:epurchasing-details');
        $this->call('fetch:epurchasing-penyedias');
        $this->call('fetch:epurchasing-distributors');
        $this->call('fetch:epurchasing-komoditas');

        $this->info('All commands executed successfully.');
    }
}