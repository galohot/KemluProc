
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
                    <td>{{ $item->nama_paket }}</td>
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
                <!-- Add other columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($tenderSelesai as $item)
                <tr>
                    <td>{{ $item->tahun_anggaran }}</td>
                    <td>{{ $item->nama_paket }}</td>
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
