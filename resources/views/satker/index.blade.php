<!-- resources/views/satker/index.blade.php -->

<h1>RupMasterSatker Information</h1>

@if ($rupMasterSatker)
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
        <p>pencatatan: {{ $countPencatatanNonTender }}</p>
        <p>Total Paket: {{ $countTender + $countNotTender }}</p>
        <table border="1">
            <thead>
                <tr>
                    <th>Nama Satker</th>
                    <th>Kode RUP</th>
                    <th>Nama Paket</th>
                    <th>Metode Pemilihan</th>
                    <th>Kode LPSE</th>
                    <th>Kode Non-Tender PCT</th>
                    <th>Kode PKT DCE</th>
                    <th>Pagu</th>
                    <th>Total Realisasi</th>
                    <th>Nilai PDN PCT</th>
                    <th>Nilai UMK PCT</th>
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
                            <td>{{ $paket->pencatatanNonTender->kd_lpse }}</td>
                            <td>{{ $paket->pencatatanNonTender->kd_nontender_pct }}</td>
                            <td>{{ $paket->pencatatanNonTender->kd_pkt_dce }}</td>
                            <td>{{ $paket->pencatatanNonTender->pagu }}</td>
                            <td>{{ $paket->pencatatanNonTender->total_realisasi }}</td>
                            <td>{{ $paket->pencatatanNonTender->nilai_pdn_pct }}</td>
                            <td>{{ $paket->pencatatanNonTender->nilai_umk_pct }}</td>
                        @else
                            <td colspan="6">No PencatatanNonTender found for this Paket.</td>
                            <td colspan="4"></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No PaketPenyediaTerumumkan found.</p>
    @endif
@else
    <p>RupMasterSatker not found.</p>
@endif
