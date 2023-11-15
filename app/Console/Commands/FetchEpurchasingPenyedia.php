<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\EcatPaketEpurchasing;
use App\Models\EpurchasingPenyedia;

class FetchEpurchasingPenyedia extends Command
{
    protected $signature = 'fetch:epurchasing_penyedia';
    protected $description = 'Fetch and store Epurchasing details from API';

    public function handle()
    {
        // Truncate the EpurchasingProducts table
        EpurchasingPenyedia::truncate();

        // Retrieve data from the API
        $kdPenyediaValues = EcatPaketEpurchasing::pluck('kd_penyedia')->toArray();
        
        foreach ($kdPenyediaValues as $kdPenyedia) {
            $url = "https://isb.lkpp.go.id/isb-2/api/fc90ab23-dea5-44d3-999e-18097e9162cc/json/5282/Ecat-ProdukDetail/tipe/4/parameter/{$kdPenyedia}";
            $response = Http::get($url);

            if ($response->successful()) {
                $data = $response->json();

                // Map the retrieved data to your EpurchasingProducts model
                $epurchasingPenyedia = new EpurchasingPenyedia([
                    'kd_penyedia' => $data[0]['kd_penyedia'],
                    'nama_penyedia' => $data[0]['nama_penyedia'],
                    'penyedia_ukm' => $data[0]['penyedia_ukm'],
                    'alamat_penyedia' => $data[0]['alamat_penyedia'],
                    'email_penyedia' => $data[0]['email_penyedia'],
                    'no_telp_penyedia' => $data[0]['no_telp_penyedia'],
                    'npwp_penyedia' => $data[0]['npwp_penyedia'],
                    'kbli2020_penyedia' => $data[0]['kbli2020_penyedia'],
                    // Add more fields as needed
                ]);
                

                // Save the data to the database
                $epurchasingPenyedia->save();
            }
        }

        $this->info('Epurchasing penyedia fetched and stored successfully!');
    }
}