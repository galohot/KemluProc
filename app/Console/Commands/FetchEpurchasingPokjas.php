<?php

namespace App\Console\Commands;

use App\Models\EpurchasingUserPokja;
use App\Models\EcatPaketEpurchasing;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;


class FetchEpurchasingPokjas extends Command
{
    protected $signature = 'fetch:epurchasing-pokjas';
    protected $description = 'Fetch and store Epurchasing details from API';

    public function handle()
    {
        // Truncate the EpurchasingProducts table once before the loop
        EpurchasingUserPokja::truncate();

        // Retrieve data from the API
        $kdUsePokjaValues = EcatPaketEpurchasing::pluck('kd_user_pokja')->toArray();

        foreach ($kdUsePokjaValues as $kdUserPokja) {
            $url = "https://isb.lkpp.go.id/isb-2/api/387a1252-12c2-4e01-9af2-ce0e44eacca4/json/5263/Ecat-UserPegawai/tipe/12/parameter/{$kdUserPokja}";
            $response = Http::get($url);

            if ($response->successful()) {
                $data = $response->json();

                foreach ($data as $item) {
                    EpurchasingUserPokja::updateOrInsert(
                        ['kd_user_pegawai' => $item['kd_user_pegawai']],
                        $item
                    );
                }
            }
        }

        $this->info('Epurchasing user pokjas fetched and stored successfully!');
    }
}
