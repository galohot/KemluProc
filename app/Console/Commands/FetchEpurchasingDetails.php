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
        // Truncate the EpurchasingProducts table
        EpurchasingProducts::truncate();

        // Retrieve data from the API
        $kdProdukValues = EcatPaketEpurchasing::pluck('kd_produk')->toArray();
        
        foreach ($kdProdukValues as $kdProduk) {
            $url = "https://isb.lkpp.go.id/isb-2/api/fc90ab23-dea5-44d3-999e-18097e9162cc/json/5282/Ecat-ProdukDetail/tipe/4/parameter/{$kdProduk}";
            $response = Http::get($url);

            if ($response->successful()) {
                $data = $response->json();

                // Map the retrieved data to your EpurchasingProducts model
                $epurchasingProduct = new EpurchasingProducts([
                    'kd_produk' => $data[0]['kd_produk'],
                    'no_kontrak' => $data[0]['no_kontrak'],
                    'nama_penyedia' => $data[0]['nama_penyedia'],
                    'no_produk' => $data[0]['no_produk'],
                    'no_produk_penyedia' => $data[0]['no_produk_penyedia'],
                    'nama_manufaktur' => $data[0]['nama_manufaktur'],
                    'nama_produk' => $data[0]['nama_produk'],
                    'nama_kategori_terkecil' => $data[0]['nama_kategori_terkecil'],
                    'nama_sub_kategori_1' => $data[0]['nama_sub_kategori_1'],
                    'nama_sub_kategori_2' => $data[0]['nama_sub_kategori_2'],
                    'nama_sub_kategori_3' => $data[0]['nama_sub_kategori_3'],
                    'nama_sub_kategori_4' => $data[0]['nama_sub_kategori_4'],
                    'harga' => json_decode($data[0]['harga'], true), // Assuming 'harga' field contains JSON data
                    'nama_komoditas' => $data[0]['nama_komoditas'],
                    'jumlah_stok' => $data[0]['jumlah_stok'],
                    'setuju_tolak_tanggal' => $data[0]['setuju_tolak_tanggal'],
                    'berlaku_sampai' => $data[0]['berlaku_sampai'],
                    'unit_pengukuran' => $data[0]['unit_pengukuran'],
                    'jenis_produk' => $data[0]['jenis_produk'],
                    'kbki_id' => $data[0]['kbki_id'],
                    'nomor_tkdn' => $data[0]['nomor_tkdn'],
                    'nama_pemilik_sertifikat_tkdn' => $data[0]['nama_pemilik_sertifikat_tkdn'],
                    'tkdn_produk' => $data[0]['tkdn_produk'],
                    'nilai_bmp' => $data[0]['nilai_bmp'],
                    'masa_berlaku_kontrak' => $data[0]['masa_berlaku_kontrak'],
                    'tglkontrak_mulai' => $data[0]['tglkontrak_mulai'],
                    'tglkontrak_selesai' => $data[0]['tglkontrak_selesai'],
                    // Add more fields as needed
                ]);

                // Save the data to the database
                $epurchasingProduct->save();
            }
        }

        $this->info('Epurchasing details fetched and stored successfully!');
    }
}