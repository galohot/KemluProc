@foreach($tenderSelesai as $item)
<h1>{{ $item->nama_satker }}</h1>
@endforeach

@if($rupMasterSatker)
    <h1>Data for kd_satker: {{ $rupMasterSatker->kd_satker }}</h1>
    <h2>Nama Satker: {{ $rupMasterSatker->nama_satker }}</h2>
    <!-- ... (rest of your view) -->
@endif

@if(count($jadwalTahapanTender) > 0)
    <h2>Jadwal Tahapan Tender</h2>
    <table>
        <thead>
            <tr>
                <th>Tahun Anggaran</th>
                <th>Kode Tender</th>
                <th>Nama Tahapan</th>
                <th>Tanggal Awal</th>
                <th>Tanggal Akhir</th>
                <!-- Add other columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($jadwalTahapanTender as $item)
                <tr>
                    <td>{{ $item->tahun_anggaran }}</td>
                    <td>{{ $item->kd_tender }}</td>
                    <td>{{ $item->nama_tahapan }}</td>
                    <td>{{ $item->tgl_awal }}</td>
                    <td>{{ $item->tgl_akhir }}</td>
                    <!-- Add other columns as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif


@if(count($pesertaTender) > 0)
    <h2>Peserta Tender</h2>
    <table>
        <thead>
            <tr>
                <th>Tahun Anggaran</th>
                <th>Nama Penyedia</th>
                <!-- Add other columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($pesertaTender as $item)
                <tr>
                    <td>{{ $item->tahun_anggaran }}</td>
                    <td>{{ $item->nama_penyedia }}</td>
                    <!-- Add other columns as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@if(count($bapbast) > 0)
    <h2>Tender Ekontrak Bapbast</h2>
    <table>
        <thead>
            <tr>
                <th>Tahun Anggaran</th>
                <th>Nama Paket</th>
                <!-- Add other columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($bapbast as $item)
                <tr>
                    <td>{{ $item->tahun_anggaran }}</td>
                    <td>{{ $item->nama_paket }}</td>
                    <!-- Add other columns as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@if(count($kontrak) > 0)
    <h2>Tender Ekontrak Kontrak</h2>
    <table>
        <thead>
            <tr>
                <th>Tahun Anggaran</th>
                <th>Nama Paket</th>
                <!-- Add other columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($kontrak as $item)
                <tr>
                    <td>{{ $item->tahun_anggaran }}</td>
                    <td>{{ $item->nama_paket }}</td>
                    <!-- Add other columns as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@if(count($spmkspp) > 0)
    <h2>Tender Ekontrak Spmkspp</h2>
    <table>
        <thead>
            <tr>
                <th>Tahun Anggaran</th>
                <th>Nama Paket</th>
                <!-- Add other columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($spmkspp as $item)
                <tr>
                    <td>{{ $item->tahun_anggaran }}</td>
                    <td>{{ $item->nama_paket }}</td>
                    <!-- Add other columns as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@if(count($sppbj) > 0)
    <h2>Tender Ekontrak Sppbj</h2>
    <table>
        <thead>
            <tr>
                <th>Tahun Anggaran</th>
                <th>Nama Paket</th>
                <!-- Add other columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($sppbj as $item)
                <tr>
                    <td>{{ $item->tahun_anggaran }}</td>
                    <td>{{ $item->nama_paket }}</td>
                    <!-- Add other columns as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@if(count($pengumuman) > 0)
    <h2>Tender Pengumuman</h2>
    <table>
        <thead>
            <tr>
                <th>Tahun Anggaran</th>
                <th>Nama Paket</th>
                <!-- Add other columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($pengumuman as $item)
                <tr>
                    <td>{{ $item->tahun_anggaran }}</td>
                    <td>{{ $item->kd_klpd }}</td>
                    <td>{{ $item->nama_klpd }}</td>
                    <td>{{ $item->jenis_klpd }}</td>
                    <td>{{ $item->kd_satker }}</td>
                    <td>{{ $item->kd_satker_str }}</td>
                    <td>{{ $item->nama_satker }}</td>
                    <td>{{ $item->kd_lpse }}</td>
                    <td>{{ $item->nama_lpse }}</td>
                    <td>{{ $item->kd_tender }}</td>
                    <td>{{ $item->kd_pkt_dce }}</td>
                    <td>{{ $item->kd_rup }}</td>
                    <td>{{ $item->nama_paket }}</td>
                    <td>{{ $item->pagu }}</td>
                    <td>{{ $item->hps }}</td>
                    <td>{{ $item->sumber_dana }}</td>
                    <td>{{ $item->kualifikasi_paket }}</td>
                    <td>{{ $item->jenis_pengadaan }}</td>
                    <td>{{ $item->mtd_pemilihan }}</td>
                    <td>{{ $item->mtd_evaluasi }}</td>
                    <td>{{ $item->mtd_kualifikasi }}</td>
                    <td>{{ $item->kontrak_pembayaran }}</td>
                    <td>{{ $item->status_tender }}</td>
                    <td>{{ $item->tanggal_status }}</td>
                    <td>{{ $item->versi_tender }}</td>
                    <td>{{ $item->ket_ditutup }}</td>
                    <td>{{ $item->ket_diulang }}</td>
                    <td>{{ $item->tgl_buat_paket }}</td>
                    <td>{{ $item->tgl_kolektif_kolegial }}</td>
                    <td>{{ $item->tgl_pengumuman_tender }}</td>
                    <td>{{ $item->nip_ppk }}</td>
                    <td>{{ $item->nama_ppk }}</td>
                    <td>{{ $item->nip_pokja }}</td>
                    <td>{{ $item->nama_pokja }}</td>
                    <td>{{ $item->lokasi_pekerjaan }}</td>
                    <td>{{ $item->url_lpse }}</td>
                    
                    <!-- Add other columns as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@if(count($tenderSelesai) > 0)
    <h2>Tender Selesai</h2>
    <table>
        <thead>
            <tr>
                <th>Tahun Anggaran</th>
                <th>Nama Paket</th>
                <th>Nama Satker</th>
                <!-- Add other columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($tenderSelesai as $item)
                <tr>
                    <td>{{ $item->tahun_anggaran }}</td>
                    <td>{{ $item->nama_paket }}</td>
                    <td>{{ $item->nama_satker }}</td>
                    <!-- Add other columns as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@if(count($tenderSelesaiNilai) > 0)
    <h2>Tender Selesai Nilai</h2>
    <table>
        <thead>
            <tr>
                <th>Tahun Anggaran</th>
                <th>Nama Penyedia</th>
                <!-- Add other columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($tenderSelesaiNilai as $item)
                <tr>
                    <td>{{ $item->tahun_anggaran }}</td>
                    <td>{{ $item->nama_penyedia }}</td>
                    <!-- Add other columns as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
