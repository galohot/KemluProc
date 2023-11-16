<?php

namespace App\Console\Commands;

use App\Models\EpurchasingDistributor;
use App\Models\EcatPaketEpurchasing;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;


class FetchEpurchasingDistributor extends Command
{
    protected $signature = 'fetch:epurchasing-distributors';
    protected $description = 'Fetch and store Epurchasing details from API';

    public function handle()
    {
        // Truncate the EpurchasingProducts table once before the loop
        EpurchasingDistributor::truncate();

        // Retrieve data from the API
        $kdDistributorValues = EcatPaketEpurchasing::pluck('kd_penyedia_distributor')->toArray();

        foreach ($kdDistributorValues as $kdPDistributor) {
            $url = "https://isb.lkpp.go.id/isb-2/api/1c61c3f4-3382-4ae1-adae-0e01b549e449/json/5259/Ecat-PenyediaDistributorDetail/tipe/12/parameter/{$kdPDistributor}";
            $response = Http::get($url);

            if ($response->successful()) {
                $data = $response->json();

                foreach ($data as $item) {
                    EpurchasingDistributor::updateOrInsert(
                        ['kd_penyedia_distributor' => $item['kd_penyedia_distributor']],
                        $item
                    );
                }
            }
        }

        $this->info('Epurchasing penyedia distributor fetched and stored successfully!');
    }
}