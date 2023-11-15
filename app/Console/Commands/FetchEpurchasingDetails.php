<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\EcatPaketEpurchasing;
use App\Models\EpurchasingProducts;

class FetchEpurchasingDetails extends Command
{
    protected $signature = 'fetch:epurchasing-details';
    protected $description = 'Fetch and store Epurchasing details from API';

    public function handle()
    {
        // Truncate the EpurchasingProducts table once before the loop
        EpurchasingProducts::truncate();

        // Retrieve data from the API
        $kdProdukValues = EcatPaketEpurchasing::pluck('kd_produk')->toArray();

        foreach ($kdProdukValues as $kdProduk) {
            $url = "https://isb.lkpp.go.id/isb-2/api/fc90ab23-dea5-44d3-999e-18097e9162cc/json/5282/Ecat-ProdukDetail/tipe/4/parameter/{$kdProduk}";
            $response = Http::get($url);

            if ($response->successful()) {
                $data = $response->json();

                foreach ($data as $item) {
                    EpurchasingProducts::updateOrInsert(
                        ['kd_produk' => $item['kd_produk']],
                        $item
                    );
                }
            }
        }

        $this->info('Epurchasing details fetched and stored successfully!');
    }
}