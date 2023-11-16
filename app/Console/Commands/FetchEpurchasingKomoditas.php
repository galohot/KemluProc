<?php

namespace App\Console\Commands;

use App\Models\EcatPaketEpurchasing;
use App\Models\EpurchasingKomoditas;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;


class FetchEpurchasingKomoditas extends Command
{
    protected $signature = 'fetch:epurchasing-komoditas';
    protected $description = 'Fetch and store Epurchasing details from API';

    public function handle()
    {
        // Truncate the EpurchasingProducts table once before the loop
        EpurchasingKomoditas::truncate();

        // Retrieve data from the API
        $kdKomoditasValues = EcatPaketEpurchasing::pluck('kd_komoditas')->toArray();

        foreach ($kdKomoditasValues as $kdKomoditas) {
            $url = "https://isb.lkpp.go.id/isb-2/api/7ec81709-1200-4923-8fb1-8b7988482967/json/5265/Ecat-KomoditasDetail/tipe/4/parameter/{$kdKomoditas}";
            $response = Http::get($url);

            if ($response->successful()) {
                $data = $response->json();

                foreach ($data as $item) {
                    EpurchasingKomoditas::updateOrInsert(
                        ['kd_komoditas' => $item['kd_komoditas']],
                        $item
                    );
                }
            }
        }

        $this->info('Epurchasing komoditas fetched and stored successfully!');
    }
}