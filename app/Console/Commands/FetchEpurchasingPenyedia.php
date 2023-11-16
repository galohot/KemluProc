<?php

namespace App\Console\Commands;

use App\Models\EcatPaketEpurchasing;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\EpurchasingPenyedia;

class FetchEpurchasingPenyedia extends Command
{
    protected $signature = 'fetch:epurchasing-penyedias';
    protected $description = 'Fetch and store Epurchasing details from API';

    public function handle()
    {
        // Truncate the EpurchasingProducts table once before the loop
        EpurchasingPenyedia::truncate();

        // Retrieve data from the API
        $kdPenyediaValues = EcatPaketEpurchasing::pluck('kd_penyedia')->toArray();

        foreach ($kdPenyediaValues as $kdPenyedia) {
            $url = "https://isb.lkpp.go.id/isb-2/api/05d46ef0-ef23-4954-b4ac-b4d656d3cec0/json/5260/Ecat-PenyediaDetail/tipe/4/parameter/{$kdPenyedia}";
            $response = Http::get($url);

            if ($response->successful()) {
                $data = $response->json();

                foreach ($data as $item) {
                    EpurchasingPenyedia::updateOrInsert(
                        ['kd_penyedia' => $item['kd_penyedia']],
                        $item
                    );
                }
            }
        }

        $this->info('Epurchasing penyedia fetched and stored successfully!');
    }
}