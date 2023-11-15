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
                    'nie_id' => $data[0]['nie_id'],
                    'nie_nib' => $data[0]['nie_nib'],
                    'nie_nama_usaha' => $data[0]['nie_nama_usaha'],
                    'nie_npwp' => $data[0]['nie_npwp'],
                    'nie_klasifikasi_izin' => $data[0]['nie_klasifikasi_izin'],
                    'nie_tgl_terbit' => $data[0]['nie_tgl_terbit'],
                    'nie_tgl_expire' => $data[0]['nie_tgl_expire'],
                    'nie_nama_produk' => $data[0]['nie_nama_produk'],
                    'nie_kategori' => $data[0]['nie_kategori'],
                    'nie_sub_kategori' => $data[0]['nie_sub_kategori'],
                    'nie_jenis_produk' => $data[0]['nie_jenis_produk'],
                    'nie_hscode' => $data[0]['nie_hscode'],
                    'nie_kelas' => $data[0]['nie_kelas'],
                    'nie_kelas_resiko' => $data[0]['nie_kelas_resiko'],
                    'nie_ukuran' => $data[0]['nie_ukuran'],
                    'nie_kemasan' => $data[0]['nie_kemasan'],
                    'nie_nama_pabrik' => $data[0]['nie_nama_pabrik'],
                    'nie_negara_pabrik' => $data[0]['nie_negara_pabrik'],
                    'nie_alamat_pabrik' => $data[0]['nie_alamat_pabrik'],
                    'nie_last_update' => $data[0]['nie_last_update'],
                    'no_suket_alkes' => $data[0]['no_suket_alkes'],
                    'kd_produk_kategori' => $data[0]['kd_produk_kategori'],
                    'active' => $data[0]['active'],
                    'created_date' => $data[0]['created_date'],
                    'modified_date' => $data[0]['modified_date'],
                    'status' => $data[0]['status'],
                    'status_tayang' => $data[0]['status_tayang'],
                    'apakah_dapat_dibeli' => $data[0]['apakah_dapat_dibeli'],
                    'nie' => $data[0]['nie'],
                    // Add more fields as needed
                ]);
                

                // Save the data to the database
                $epurchasingProduct->save();
            }
        }

        $this->info('Epurchasing details fetched and stored successfully!');
    }
}