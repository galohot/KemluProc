@if($tenderPengumumans->isNotEmpty())
    <h1>Tender Pengumumans</h1>
    <table>
        <thead>
            <tr>
                <th>Tahun Anggaran</th>
                <th>Nama Satker</th>
                <!-- Add more table headers as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($tenderPengumumans as $tenderPengumuman)
                <tr>
                    <td>{{ $tenderPengumuman->tahun_anggaran }}</td>
                    <td>{{ $tenderPengumuman->nama_satker }}</td>
                    <!-- Add more table data cells as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@if($tenderSelesais->isNotEmpty())
    <h1>Tender Selesais</h1>
    <table>
        <thead>
            <tr>
                <th>Tahun Anggaran</th>
                <th>Nama Satker</th>
                <!-- Add more table headers as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($tenderSelesais as $tenderSelesai)
                <tr>
                    <td>{{ $tenderSelesai->tahun_anggaran }}</td>
                    <td>{{ $tenderSelesai->nama_satker }}</td>
                    <!-- Add more table data cells as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@if($tenderSelesaiNilais->isNotEmpty())
    <h1>Tender Selesai Nilais</h1>
    <table>
        <thead>
            <tr>
                <th>Tahun Anggaran</th>
                <th>Nama Satker</th>
                <!-- Add more table headers as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($tenderSelesaiNilais as $tenderSelesaiNilai)
                <tr>
                    <td>{{ $tenderSelesaiNilai->tahun_anggaran }}</td>
                    <td>{{ $tenderSelesaiNilai->nama_satker }}</td>
                    <!-- Add more table data cells as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@if($pesertaTenders->isNotEmpty())
    <h1>Peserta Tenders</h1>
    <table>
        <thead>
            <tr>
                <th>Tahun Anggaran</th>
                <th>Nama Satker</th>
                <!-- Add more table headers as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($pesertaTenders as $pesertaTender)
                <tr>
                    <td>{{ $pesertaTender->tahun_anggaran }}</td>
                    <td>{{ $pesertaTender->nama_satker }}</td>
                    <!-- Add more table data cells as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@if($jadwalTahapans->isNotEmpty())
    <h1>Jadwal Tahapan Tenders</h1>
    <table>
        <thead>
            <tr>
                <th>Tahun Anggaran</th>
                <th>Nama Satker</th>
                <!-- Add more table headers as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($jadwalTahapans as $jadwalTahapan)
                <tr>
                    <td>{{ $jadwalTahapan->tahun_anggaran }}</td>
                    <td>{{ $jadwalTahapan->nama_satker }}</td>
                    <!-- Add more table data cells as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@if($tenderEkontrakBapbasts->isNotEmpty())
    <h1>Tender Ekontrak Bapbasts</h1>
    <table>
        <thead>
            <tr>
                <th>Tahun Anggaran</th>
                <th>Nama Satker</th>
                <!-- Add more table headers as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($tenderEkontrakBapbasts as $tenderEkontrakBapbast)
                <tr>
                    <td>{{ $tenderEkontrakBapbast->tahun_anggaran }}</td>
                    <td>{{ $tenderEkontrakBapbast->nama_satker }}</td>
                    <!-- Add more table data cells as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@if($tenderEkontrakKontraks->isNotEmpty())
    <h1>Tender Ekontrak Kontraks</h1>
    <table>
        <thead>
            <tr>
                <th>Tahun Anggaran</th>
                <th>Nama Satker</th>
                <!-- Add more table headers as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($tenderEkontrakKontraks as $tenderEkontrakKontrak)
                <tr>
                    <td>{{ $tenderEkontrakKontrak->tahun_anggaran }}</td>
                    <td>{{ $tenderEkontrakKontrak->nama_satker }}</td>
                    <!-- Add more table data cells as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@if($tenderEkontrakSpmkspps->isNotEmpty())
    <h1>Tender Ekontrak Spmkspps</h1>
    <table>
        <thead>
            <tr>
                <th>Tahun Anggaran</th>
                <th>Nama Satker</th>
                <!-- Add more table headers as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($tenderEkontrakSpmkspps as $tenderEkontrakSpmkspp)
                <tr>
                    <td>{{ $tenderEkontrakSpmkspp->tahun_anggaran }}</td>
                    <td>{{ $tenderEkontrakSpmkspp->nama_satker }}</td>
                    <!-- Add more table data cells as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@if($tenderEkontrakSppbjs->isNotEmpty())
    <h1>Tender Ekontrak Sppbjs</h1>
    <table>
        <thead>
            <tr>
                <th>Tahun Anggaran</th>
                <th>Nama Satker</th>
                <!-- Add more table headers as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($tenderEkontrakSppbjs as $tenderEkontrakSppbj)
                <tr>
                    <td>{{ $tenderEkontrakSppbj->tahun_anggaran }}</td>
                    <td>{{ $tenderEkontrakSppbj->nama_satker }}</td>
                    <!-- Add more table data cells as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
