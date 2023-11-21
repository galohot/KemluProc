<?php

namespace App\Console\Commands;

use App\Models\KegiatanMaster;
use App\Models\KomponenMaster;
use App\Models\PaketAnggaranPenyedia;
use App\Models\PaketAnggaranSwakelola;
use App\Models\PaketPenyediaLokasi;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\RupKroMaster;
use App\Models\PaketPenyediaTerumumkan;
use App\Models\PaketSwakelolaLokasi;
use App\Models\PaketSwakelolaTerumumkan;
use App\Models\ProgramMaster;
use App\Models\RupMasterSatker;
use App\Models\RupRoMaster;
use App\Models\RupStrukturAnggaranKl;
use App\Models\SubkomponenMaster;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class FetchSiRUPisb extends Command
{
    protected $signature = 'fetch:data_sirup {year}';
    protected $description = 'Fetch data from the API and store it in the database';

    private function fetchDataFromApi($url, $model, $retryCount = 3)
    {
        for ($attempt = 1; $attempt <= $retryCount; $attempt++) {
            try {
                $data = Http::get($url)->json();
                $tahunAnggaranField = isset($data[0]['tahun_anggaran']) ? 'tahun_anggaran' : null;

                if (!$tahunAnggaranField) {
                    // Log a warning or handle accordingly if tahun_anggaran is not present in the data.
                }

                // Fetch only records where tahun_anggaran matches the specified year.
                $existingData = $model::where($tahunAnggaranField, $this->argument('year'))->get();

                if ($existingData->isEmpty()) {
                    foreach ($data as $item) {
                        // Check if tahun_anggaran matches before creating records.
                        if (!$tahunAnggaranField || $item[$tahunAnggaranField] == $this->argument('year')) {
                            $model::create($item);
                        }
                    }
                }
                break; // Success, exit loop
            } catch (Exception $e) {
                if ($attempt < $retryCount) {
                    sleep(5); // Wait before retrying
                } else {
                    $this->error("Error fetching data from {$model} API after {$retryCount} attempts for year {$this->argument('year')}: " . $e->getMessage());
                    Log::error('Error occurred: ' . $e->getMessage());
                }
            }
        }
    }

    public function handle()
    {
        $years = explode(',', $this->argument('year'));

        foreach ($years as $year) {
            try {
            $this->fetchDataFromApi('https://isb.lkpp.go.id/isb-2/api/ac8ff6a2-1131-4b70-b473-07c8fbeddcf2/json/5264/RUP-KROMaster/tipe/4:12/parameter/' . $year . ':K17', RupKroMaster::class, $year);
            $this->fetchDataFromApi('https://isb.lkpp.go.id/isb-2/api/72b866ae-f309-46df-a6a8-6c7b7113b83b/json/5274/RUP-PaketPenyedia-Terumumkan/tipe/4:12/parameter/' . $year . ':K17', PaketPenyediaTerumumkan::class, 2, $year);
            $this->fetchDataFromApi('https://isb.lkpp.go.id/isb-2/api/e4f166f8-34af-479b-a344-105b5c8d793d/json/5275/RUP-PaketSwakelola-Terumumkan/tipe/4:12/parameter/' . $year . ':K17', PaketSwakelolaTerumumkan::class, $year);
            $this->fetchDataFromApi('https://isb.lkpp.go.id/isb-2/api/c16810f6-2ba2-4558-933c-d2fef877a62b/json/5281/RUP-PaketSwakelolaLokasi/tipe/4:12/parameter/' . $year . ':K17', PaketSwakelolaLokasi::class, $year);
            $this->fetchDataFromApi('https://isb.lkpp.go.id/isb-2/api/ea05b533-1509-4b82-b63c-29c4b27f5950/json/5280/RUP-PaketPenyediaLokasi/tipe/4:12/parameter/' . $year . ':K17', PaketPenyediaLokasi::class, $year);
            $this->fetchDataFromApi('https://isb.lkpp.go.id/isb-2/api/16794a0b-fd46-4238-8571-c60ba94ee700/json/5279/RUP-ROMaster/tipe/4:12/parameter/' . $year . ':K17', RupRoMaster::class, $year);
            $this->fetchDataFromApi('https://isb.lkpp.go.id/isb-2/api/ff8eef3b-6327-4862-a2f8-f8dfb5c90816/json/5267/RUP-KomponenMaster/tipe/4:12/parameter/' . $year . ':K17', KomponenMaster::class, $year);
            $this->fetchDataFromApi('https://isb.lkpp.go.id/isb-2/api/2f3222d4-5236-4f42-9f48-a155cb29e54b/json/5277/RUP-PaketAnggaranPenyedia/tipe/4:12/parameter/' . $year . ':K17', PaketAnggaranPenyedia::class, $year);
            $this->fetchDataFromApi('https://isb.lkpp.go.id/isb-2/api/9a6d41c3-6e4e-4fdf-9642-bef6f43c14a3/json/5295/RUP-PaketAnggaranSwakelola/tipe/4:12/parameter/' . $year . ':K17', PaketAnggaranSwakelola::class, $year);
            $this->fetchDataFromApi('https://isb.lkpp.go.id/isb-2/api/3e71eeb0-c01e-4e6f-85dc-df363e6b9b7b/json/5294/RUP-SubKomponenMaster/tipe/4:12/parameter/' . $year . ':K17', SubkomponenMaster::class, $year);
            $this->fetchDataFromApi('https://isb.lkpp.go.id/isb-2/api/f666de37-1894-40e6-8cd5-ddd17705da35/json/5266/RUP-KegiatanMaster/tipe/4:12/parameter/' . $year . ':K17', KegiatanMaster::class, $year);
            $this->fetchDataFromApi('https://isb.lkpp.go.id/isb-2/api/9a89c31f-e6d3-4769-ae76-e3fe660ef780/json/5276/RUP-ProgramMaster/tipe/4:12/parameter/' . $year . ':K17', ProgramMaster::class, $year);
            $this->fetchDataFromApi('https://isb.lkpp.go.id/isb-2/api/cd2a5289-92a8-4b4e-9748-b13e0d663417/json/5291/RUP-StrukturAnggaranKL/tipe/4:12/parameter/' . $year . ':K17', RupStrukturAnggaranKl::class, $year);
        } catch (Exception $e) {
            $this->error("Error occurred for year {$year}: " . $e->getMessage());
        }
    }

    $this->info($year . 'SiRUP Data fetched and stored successfully.');
}
}