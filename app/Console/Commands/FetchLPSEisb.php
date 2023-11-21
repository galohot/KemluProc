<?php

namespace App\Console\Commands;

use App\Models\SpseJadwalTahapanNontender;
use App\Models\SpseJadwalTahapanTender;
use App\Models\SpseNonTenderEkontrakSppbj;
use App\Models\SpseNontenderPengumuman;
use App\Models\SpseNontenderSelesai;
use App\Models\SpsePencatatanNonTender;
use App\Models\SpsePencatatanNonTenderRealisasi;
use App\Models\SpsePesertaTender;
use App\Models\SpseTenderEkontrakBapbast;
use App\Models\SpseTenderEkontrakKontrak;
use App\Models\SpseTenderEkontrakSpmkspp;
use App\Models\SpseTenderEkontrakSppbj;
use App\Models\SpseTenderPengumuman;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\SpseTenderSelesai;
use App\Models\SpseTenderSelesaiNilai;
use Exception;
use Illuminate\Support\Facades\Log;

class FetchLPSEisb extends Command
{
    protected $signature = 'fetch:data_lpse {year}';
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
                $this->fetchDataFromApi("https://isb.lkpp.go.id/isb-2/api/e797a465-d810-494d-9fa5-89c561f1f045/json/5269/SPSE-TenderSelesai/tipe/4:4/parameter/{$year}:136", SpseTenderSelesai::class);
                $this->fetchDataFromApi("https://isb.lkpp.go.id/isb-2/api/cb35665d-cc22-4955-8cef-4d8a90027845/json/5270/SPSE-TenderSelesaiNilai/tipe/4:4/parameter/{$year}:136", SpseTenderSelesaiNilai::class);
                $this->fetchDataFromApi("https://isb.lkpp.go.id/isb-2/api/a6dfb7a2-a9aa-4a4d-8ad2-3b2c6b427dbd/json/5268/SPSE-NonTenderPengumuman/tipe/4:4/parameter/{$year}:136", SpseNontenderPengumuman::class);
                $this->fetchDataFromApi("https://isb.lkpp.go.id/isb-2/api/5cf7d366-6229-4bc9-91a0-f5307c0bee43/json/5271/SPSE-NonTenderSelesai/tipe/4:4/parameter/{$year}:136", SpseNontenderSelesai::class);
                $this->fetchDataFromApi("https://isb.lkpp.go.id/isb-2/api/9710a693-957c-450d-b0a8-914676e63b0c/json/5272/SPSE-TenderPengumuman/tipe/4:4/parameter/{$year}:136", SpseTenderPengumuman::class);
                $this->fetchDataFromApi("https://isb.lkpp.go.id/isb-2/api/a06165b9-17e2-4ae9-9d67-d3dbb4ccdcbd/json/5283/SPSE-PencatatanNonTender/tipe/4:4/parameter/{$year}:136", SpsePencatatanNonTender::class);
                $this->fetchDataFromApi("https://isb.lkpp.go.id/isb-2/api/05a46f91-bfa6-41d2-9211-74dacfbb1188/json/5285/SPSE-PencatatanNonTenderRealisasi/tipe/4:4/parameter/{$year}:136", SpsePencatatanNonTenderRealisasi::class);
                $this->fetchDataFromApi("https://isb.lkpp.go.id/isb-2/api/27cd016d-f964-4ca1-929e-01807537e024/json/5292/SPSE-JadwalTahapanTender/tipe/4:4/parameter/{$year}:136", SpseJadwalTahapanTender::class);
                $this->fetchDataFromApi("https://isb.lkpp.go.id/isb-2/api/da34e9b8-2300-4dda-bcea-cfc0e273e57b/json/5293/SPSE-JadwalTahapanNonTender/tipe/4:4/parameter/{$year}:136", SpseJadwalTahapanNontender::class);
                $this->fetchDataFromApi("https://isb.lkpp.go.id/isb-2/api/1a48f38e-4a62-4d47-aa89-1d45527f82d1/json/5296/SPSE-PesertaTender/tipe/4:4/parameter/{$year}:136", SpsePesertaTender::class);
                $this->fetchDataFromApi("https://isb.lkpp.go.id/isb-2/api/d114959a-5a49-4cf8-8d76-70ab11a253f7/json/5524/SPSE-TenderEkontrak-Kontrak/tipe/4:4/parameter/{$year}:136", SpseTenderEkontrakKontrak::class);
                $this->fetchDataFromApi("https://isb.lkpp.go.id/isb-2/api/7b80558c-958b-448c-95e6-eab13a2d4b73/json/5875/SPSE-TenderEkontrak-SPPBJ/tipe/4:4/parameter/{$year}:136", SpseTenderEkontrakSppbj::class);
                $this->fetchDataFromApi("https://isb.lkpp.go.id/isb-2/api/5d4f2dd1-9b66-42a3-bc83-17b1707ff33b/json/5975/SPSE-TenderEkontrak-BAPBAST/tipe/4:4/parameter/{$year}:136", SpseTenderEkontrakBapbast::class);
                $this->fetchDataFromApi("https://isb.lkpp.go.id/isb-2/api/7ae9c051-e26e-4f6a-893a-b096eb08653e/json/6075/SPSE-TenderEkontrak-SPMKSPP/tipe/4:4/parameter/{$year}:136", SpseTenderEkontrakSpmkspp::class);
                $this->fetchDataFromApi("https://isb.lkpp.go.id/isb-2/api/44c7ccfd-b9d2-46b4-994e-b5ee7543eda6/json/6693/SPSE-NonTenderEkontrak-SPPBJ/tipe/4:4/parameter/{$year}:136", SpseNonTenderEkontrakSppbj::class);

            } catch (Exception $e) {
                $this->error("Error occurred for year {$year}: " . $e->getMessage());
            }
        }

        $this->info($year . 'LPSE Data fetched and stored successfully.');
    }
}