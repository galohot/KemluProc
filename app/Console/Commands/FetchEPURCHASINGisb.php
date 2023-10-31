<?php

namespace App\Console\Commands;

use App\Models\BelaTokodaringRealisasi;
use App\Models\EcatPaketEpurchasing;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

use Exception;
use Illuminate\Support\Facades\Log;

class FetchEPURCHASINGisb extends Command
{
    protected $signature = 'fetch:data_epurchasing';
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
            $this->fetchDataFromApi('https://isb.lkpp.go.id/isb-2/api/31e857f3-a327-48a5-b3f8-5d43628e198b/json/5262/Ecat-PaketEPurchasing/tipe/4:12/parameter/2023:K17', EcatPaketEpurchasing::class);
            $this->fetchDataFromApi('https://isb.lkpp.go.id/isb-2/api/65638914-aba9-46b9-a8fe-0bef0b13c561/json/5284/Bela-TokoDaringRealisasi/tipe/12:4/parameter/K17:2023', BelaTokodaringRealisasi::class);
        } catch (Exception $e) {
            $this->error('Error occurred: ' . $e->getMessage());
        }

        $this->info('Data fetched and stored successfully.');
    }
}
