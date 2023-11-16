<!-- resources/views/satker/index.blade.php -->


@if ($rupMasterSatker)
<h1>{{ $rupMasterSatker->nama_satker }}</h1>

<table>
    <tr>
        <th>Nama Satker</th>
        <th>Nama Paket</th>
        <th>Produk</th>
        <th>Komoditas</th>
        <th>Penyedia</th>
        <th>Penyedia Distributor</th>
    </tr>
    @foreach ($rupMasterSatker->paketPenyediaTerumumkans as $paketPenyediaTerumumkan)
        @foreach ($paketPenyediaTerumumkan->paketEcats as $paketEcats)
            <tr>
                <td>{{ $rupMasterSatker->nama_satker }}</td>
                <td>{{ $paketEcats->nama_paket }}</td>

                {{-- Check if epurchasingProduct relationship exists --}}
                @if ($paketEcats->epurchasingProduct)
                    {{-- Loop through epurchasingProduct --}}
                    @foreach ($paketEcats->epurchasingProduct as $product)
                        <td>{{ $product->nama_produk }}</td>
                    @endforeach
                @else
                    <td>No Products</td>
                @endif

                {{-- Check if epurchasingKomoditas relationship exists --}}
                @if ($paketEcats->epurchasingKomoditas)
                    {{-- Loop through epurchasingKomoditas --}}
                    @foreach ($paketEcats->epurchasingKomoditas as $komoditas)
                        <td>{{ $komoditas->nama_komoditas }}</td>
                    @endforeach
                @else
                    <td>No Komoditas</td>
                @endif

                {{-- Check if epurchasingPenyedia relationship exists --}}
                @if ($paketEcats->epurchasingPenyedia)
                    {{-- Loop through epurchasingPenyedia --}}
                    @foreach ($paketEcats->epurchasingPenyedia as $penyedia)
                        <td>{{ $penyedia->nama_penyedia }}</td>
                    @endforeach
                @else
                    <td>No Penyedia</td>
                @endif

                {{-- Check if epurchasingDistributor relationship exists --}}
                @if ($paketEcats->epurchasingDistributor)
                    {{-- Loop through epurchasingDistributor --}}
                    @foreach ($paketEcats->epurchasingDistributor as $distributor)
                        <td>{{ $distributor->nama_distributor }}</td>
                    @endforeach
                @else
                    <td>No Distributor</td>
                @endif

            </tr>
        @endforeach
    @endforeach
</table>

    {{-- <p>RupMasterSatker Information:</p>
    <pre>{{ print_r($rupMasterSatker->toArray(), true) }}</pre>

    <p>Total Pagu Program: {{ $totalPaguProgram }}</p> --}}

{{-- @if ($rupMasterSatker->programMasters->isNotEmpty())
    <h2>Program Masters Information</h2>
    <ul>
        @foreach ($rupMasterSatker->programMasters as $programMaster)
            <li>{{ $programMaster->nama_program }}</li>
            <ul>
                @foreach ($programMaster->kegiatans as $kegiatan)
                    <li>{{ $kegiatan->nama_kegiatan }}</li>
                    <ul>
                        @foreach ($kegiatan->rupKros as $rupKro)
                            <li>{{ $rupKro->nama_kro }}</li>
                            <ul>
                                @foreach ($rupKro->rupRos as $rupRo)
                                    <li>{{ $rupRo->nama_ro }}</li>
                                    <ul>
                                        @foreach ($rupRo->komponens as $komponen)
                                            <li>{{ $komponen->nama_komponen }}</li>
                                            <ul>
                                                @foreach ($komponen->subkomponens as $subkomponen)
                                                    <li>{{ $subkomponen->nama_subkomponen }}</li>
                                                @endforeach
                                            </ul>
                                        @endforeach
                                    </ul>
                                @endforeach
                            </ul>
                        @endforeach
                    </ul>
                @endforeach
            </ul>
        @endforeach
    </ul>
@else
    <p>No Program Masters found.</p>
@endif --}}

    @if ($rupMasterSatker->paketPenyediaTerumumkans->isNotEmpty())


        <h2>PaketPenyediaTerumumkan Information</h2>
        <p>Paket Tender: {{ $countTender }}</p>
        <p>Paket Non Tender: {{ $countNotTender }}</p>
        <p>pencatatan: {{ $countKdRupTercatat }}</p>
        <p>Belum Tercatat: {{ $countNotTender - $countKdRupTercatat }}</p>
        <p>Total Paket: {{ $countTender + $countNotTender }}</p>

        <p>Sum of Pagu: {{ number_format($sumPagu) }}</p>
        <p>Sum of Total Realisasi: {{ number_format($sumTotalRealisasi) }}</p>
        <p>Sum of Nilai PDN Pct: {{ number_format($sumNilaiPdnPct) }}</p>
        <p>Sum of Nilai UMK Pct: {{ number_format($sumNilaiUmkPct) }}</p>
        <p>Persentase Realisasi Nontender Tercatat: {{ number_format($sumTotalRealisasi / $sumPagu * 100, 2) }}%</p>
        <p>Persentase Realisasi PDN Nontender Tercatat: {{ number_format($sumNilaiPdnPct / $sumPagu * 100, 2) }}%</p>
        <p>Persentase Realisasi UMK Nontender Tercatat: {{ number_format($sumNilaiUmkPct / $sumPagu * 100, 2) }}%</p>
        <table border="1">
            <thead>
                <tr>
                    <th>Nama Satker</th>
                    <th>Kode RUP</th>
                    <th>Nama Paket</th>
                    <th>Metode Pengadaan</th>
                    <td>Kode RUP</td>
                    <th>Kode LPSE</th>
                    <th>Kode Non-Tender PCT</th>
                    <th>Kode PKT DCE</th>
                    <th>Pagu</th>
                    <th>Total Realisasi</th>
                    <th>Nilai PDN PCT</th>
                    <th>Nilai UMK PCT</th>
                    <th>Status PencatatanNonTender</th> <!-- Existing column -->
                    <th>RealisasiNonTender PCT</th> <!-- Updated column for realisasiNonTender -->
                    <th>nilaiTender</th> <!-- Updated column for realisasiNonTender -->
                    <th>Ekatalog</th> <!-- Updated column for realisasiNonTender -->
                </tr>
            </thead>
            <tbody>
                @foreach ($rupMasterSatker->paketPenyediaTerumumkans as $paket)
                    <tr>
                        <td>{{ $paket->nama_satker }}</td>
                        <td>{{ $paket->kd_rup }}</td>
                        <td>{{ $paket->nama_paket }}</td>
                        <td>{{ $paket->metode_pengadaan }}</td>

                        @if ($paket->pencatatanNonTender)
                            <td>{{ $paket->pencatatanNonTender->kd_rup }}</td>
                            <td>{{ $paket->pencatatanNonTender->kd_lpse }}</td>
                            <td>{{ $paket->pencatatanNonTender->kd_nontender_pct }}</td>
                            <td>{{ $paket->pencatatanNonTender->kd_pkt_dce }}</td>
                            <td>{{ $paket->pencatatanNonTender->pagu }}</td>
                            <td>{{ $paket->pencatatanNonTender->total_realisasi }}</td>
                            <td>{{ $paket->pencatatanNonTender->nilai_pdn_pct }}</td>
                            <td>{{ $paket->pencatatanNonTender->nilai_umk_pct }}</td>
                            <td>Sudah Tercatat</td>
                            
                            @if ($paket->pencatatanNonTender->realisasiNonTenders->isNotEmpty())
                                <td>
                                    <ul>
                                        @foreach ($paket->pencatatanNonTender->realisasiNonTenders as $realisasi)
                                            <li>{{ $realisasi->kd_nontender_pct }}</li>
                                            <!-- Display other fields as needed -->
                                        @endforeach
                                    </ul>
                                </td>
                            @else
                                <td colspan="4">No kd nontender found</td>
                            @endif


                        @else
                            <td colspan="6">No PencatatanNonTender found for this Paket.</td>
                            <td colspan="7">Belum Tercatat</td> <!-- Updated colspan to include the new column -->
                        @endif

                        @if ($paket->tenderSelesai && $paket->tenderSelesai->tenderSelesaiNilais->isNotEmpty())
                            <td>
                                <ul>
                                    @foreach ($paket->tenderSelesai->tenderSelesaiNilais as $nilaiTender)
                                        <li>{{ $nilaiTender->pagu }}</li>
                                        <!-- Display other fields as needed -->
                                    @endforeach
                                </ul>
                            </td>
                        @else
                            <td colspan="4">No tender selesai found</td>
                        @endif

                        @if ($paket->paketEcats->isNotEmpty())
                            <td>
                                <ul>
                                    @foreach ($paket->paketEcats as $paketEcat)
                                        <li>{{ $paketEcat->kd_rup }}</li>
                                        <!-- Display other fields as needed -->
                                    @endforeach
                                </ul>
                            </td>
                        @else
                            <td colspan="4">No ekatalog</td>
                        @endif

                    </tr>
                @endforeach
            </tbody>
        </table>
        
        
        
    @else
        <p>No PaketPenyediaTerumumkan found.</p>
    @endif

    @if ($rupMasterSatker->paketSwakelolaTerumumkans->isNotEmpty()) 
    <h1>Swakelola</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Nama Satker</th>
                <th>Kode RUP</th>
                <th>Nama Paket</th>
                <th>Metode Pengadaan</th>
                <th>Kode RUP</th>
                <th>Kode LPSE</th>
                <th>Kode Non-Tender PCT</th>
                <th>Kode PKT DCE</th>
                <th>Pagu</th>
                <th>Total Realisasi</th>
                <th>Nilai PDN PCT</th>
                <th>Nilai UMK PCT</th>
                <th>Status PencatatanNonTender</th> <!-- Existing column -->
                <th>RealisasiNonTender PCT</th> <!-- Updated column for realisasiNonTender -->
                <th>nilaiTender</th> <!-- Updated column for realisasiNonTender -->
                <th>Ekatalog</th> <!-- Updated column for realisasiNonTender -->
            </tr>
        </thead>
        <tbody>
            @foreach ($rupMasterSatker->paketPenyediaTerumumkans as $paket)
            <tr>
                <td>{{ $paket->nama_satker }}</td>
                <td>{{ $paket->kd_rup }}</td>
                <td>{{ $paket->nama_paket }}</td>
                <td>{{ $paket->metode_pengadaan }}</td>
    
                @if ($paket->pencatatanNonTender)
                <td>{{ $paket->pencatatanNonTender->kd_rup }}</td>
                <td>{{ $paket->pencatatanNonTender->kd_lpse }}</td>
                <td>{{ $paket->pencatatanNonTender->kd_nontender_pct }}</td>
                <td>{{ $paket->pencatatanNonTender->kd_pkt_dce }}</td>
                <td>{{ $paket->pencatatanNonTender->pagu }}</td>
                <td>{{ $paket->pencatatanNonTender->total_realisasi }}</td>
                <td>{{ $paket->pencatatanNonTender->nilai_pdn_pct }}</td>
                <td>{{ $paket->pencatatanNonTender->nilai_umk_pct }}</td>
                <td>Sudah Tercatat</td>
    
                @if ($paket->pencatatanNonTender->realisasiNonTenders->isNotEmpty())
                <td>
                    <ul>
                        @foreach ($paket->pencatatanNonTender->realisasiNonTenders as $realisasi)
                        <li>{{ $realisasi->kd_nontender_pct }}</li>
                        <!-- Display other fields as needed -->
                        @endforeach
                    </ul>
                </td>
                @else
                <td colspan="4">No kd nontender found</td>
                @endif
    
                @else
                <td colspan="9">No PencatatanNonTender found for this Paket.</td>
                <td colspan="4">Belum Tercatat</td> <!-- Updated colspan to include the new column -->
                <td colspan="4"></td> <!-- Added empty columns to match the header structure -->
                @endif
    
                @if ($paket->tenderSelesai && $paket->tenderSelesai->tenderSelesaiNilais->isNotEmpty())
                <td>
                    <ul>
                        @foreach ($paket->tenderSelesai->tenderSelesaiNilais as $nilaiTender)
                        <li>{{ $nilaiTender->pagu }}</li>
                        <!-- Display other fields as needed -->
                        @endforeach
                    </ul>
                </td>
                @else
                <td colspan="4">No tender selesai found</td>
                <td colspan="4"></td> <!-- Added empty columns to match the header structure -->
                @endif
    
                @if ($paket->paketEcats->isNotEmpty())
                <td>
                    <ul>
                        @foreach ($paket->paketEcats as $paketEcat)
                        <li>{{ $paketEcat->kd_rup }}</li>
                        <!-- Display other fields as needed -->
                        @endforeach
                    </ul>
                </td>
                @else
                <td colspan="4">No ekatalog</td>
                <td colspan="4"></td> <!-- Added empty columns to match the header structure -->
                @endif
    
            </tr>
            @endforeach
        </tbody>
    </table>

    @endif
@else
    <p>RupMasterSatker not found.</p>
@endif
