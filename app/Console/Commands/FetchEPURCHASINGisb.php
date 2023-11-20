<?php

namespace App\Console\Commands;

use App\Models\BelaTokodaringRealisasi;
use App\Models\EcatPaketEpurchasing;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class FetchEPURCHASINGisb extends Command
{
    protected $signature = 'fetch:data_epurchasing {year}';
    protected $description = 'Fetch data from the API and store it in the database';

    private function fetchDataFromApi($url, $model, $year, $retryCount = 3)
    {
        for ($attempt = 1; $attempt <= $retryCount; $attempt++) {
            try {
                $data = Http::get($url)->json();
                $modelInstance = new $model(); // Create an instance to check if 'tahun_anggaran' exists in the model
                $hasTahunAnggaran = in_array('tahun_anggaran', $modelInstance->getFillable());

                // Check if the 'tahun_anggaran' column exists in the database table
                $table = $modelInstance->getTable();
                $hasTahunAnggaranColumn = Schema::hasColumn($table, 'tahun_anggaran');

                if ($hasTahunAnggaranColumn) {
                    $model::where('tahun_anggaran', $year)->delete(); // Use delete instead of truncate for better performance
                }

                foreach ($data as $item) {
                    if ($hasTahunAnggaran) {
                        $item['tahun_anggaran'] = $year; // Add the year to the data only if 'tahun_anggaran' exists in the model
                    }
                    $model::create($item);
                }

                break; // Success, exit loop
            } catch (Exception $e) {
                if ($attempt < $retryCount) {
                    sleep(5); // Wait before retrying
                } else {
                    $this->error('Error fetching data from ' . $model . ' API after ' . $retryCount . ' attempts for year ' . $year . ': ' . $e->getMessage());
                    Log::error('Error occurred: ' . $e->getMessage());
                }
            }
        }
    }

    public function handle()
    {
        $year = $this->argument('year');

        try {
            $this->fetchDataFromApi('https://isb.lkpp.go.id/isb-2/api/31e857f3-a327-48a5-b3f8-5d43628e198b/json/5262/Ecat-PaketEPurchasing/tipe/4:12/parameter/' . $year . ':K17', EcatPaketEpurchasing::class, $year);
            $this->fetchDataFromApi('https://isb.lkpp.go.id/isb-2/api/65638914-aba9-46b9-a8fe-0bef0b13c561/json/5284/Bela-TokoDaringRealisasi/tipe/12:4/parameter/K17:' . $year, BelaTokodaringRealisasi::class, $year);
        } catch (Exception $e) {
            $this->error('Error occurred for year ' . $year . ': ' . $e->getMessage());
        }

        $this->info($year . ' Epurchasing Data fetched and stored successfully.');
    }
}