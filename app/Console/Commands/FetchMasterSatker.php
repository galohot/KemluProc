<?php

namespace App\Console\Commands;

use App\Models\RupMasterSatker;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

use Exception;
use Illuminate\Support\Facades\Log;

class FetchMasterSatker extends Command
{
    protected $signature = 'fetch:master_satker';
    protected $description = 'Fetch data from the API and store it in the database';

    private function fetchDataFromApi($url, $model, $retryCount = 3)
    {
        for ($attempt = 1; $attempt <= $retryCount; $attempt++) {
            try {
                $data = Http::get($url)->json();
                $model::truncate();
                foreach ($data as $item) {
                    $model::create($item);
                }
                break; // Success, exit loop
            } catch (Exception $e) {
                if ($attempt < $retryCount) {
                    sleep(5); // Wait before retrying
                } else {
                    $this->error('Error fetching data from ' . $model . ' API after ' . $retryCount . ' attempts: ' . $e->getMessage());
                    Log::error('Error occurred: ' . $e->getMessage());
                }
            }
        }
    }

    public function handle()
    {
        try {
            $this->fetchDataFromApi('https://isb.lkpp.go.id/isb-2/api/507de4f3-366e-4900-929a-19c9aea8b855/json/5278/RUP-MasterSatker/tipe/12:12/parameter/K17:2023', RupMasterSatker::class);

        } catch (Exception $e) {
            $this->error('Error occurred: ' . $e->getMessage());
        }

        $this->info('Master Satker fetched and stored successfully.');
    }
}