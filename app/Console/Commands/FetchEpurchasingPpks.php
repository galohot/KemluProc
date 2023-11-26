<?php

namespace App\Console\Commands;


use App\Models\EcatPaketEpurchasing;
use App\Models\EpurchasingUserPpk;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchEpurchasingPpks extends Command
{
    protected $signature = 'fetch:epurchasing-ppks';
    protected $description = 'Fetch and store Epurchasing details from API';

    public function handle()
    {
        // Truncate the EpurchasingProducts table once before the loop
        EpurchasingUserPpk::truncate();

        // Retrieve data from the API
        $kdUsePpkValues = EcatPaketEpurchasing::pluck('kd_user_ppk')->toArray();

        foreach ($kdUsePpkValues as $kdUserPpk) {
            $url = "https://isb.lkpp.go.id/isb-2/api/387a1252-12c2-4e01-9af2-ce0e44eacca4/json/5263/Ecat-UserPegawai/tipe/12/parameter/{$kdUserPpk}";
            $response = Http::get($url);

            if ($response->successful()) {
                $data = $response->json();

                foreach ($data as $item) {
                    EpurchasingUserPpk::updateOrInsert(
                        ['kd_user_pegawai' => $item['kd_user_pegawai']],
                        $item
                    );
                }
            }
        }

        $this->info('Epurchasing user PPK fetched and stored successfully!');
    }
}
