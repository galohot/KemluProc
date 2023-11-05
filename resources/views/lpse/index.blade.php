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
                <td>{{ $tenderPengumuman->kd_klpd }}</td>
                <td>{{ $tenderPengumuman->nama_klpd }}</td>
                <td>{{ $tenderPengumuman->jenis_klpd }}</td>
                <td>{{ $tenderPengumuman->kd_satker }}</td>
                <td>{{ $tenderPengumuman->kd_satker_str }}</td>
                <td>{{ $tenderPengumuman->nama_satker }}</td>
                <td>{{ $tenderPengumuman->kd_lpse }}</td>
                <td>{{ $tenderPengumuman->nama_lpse }}</td>
                <td>{{ $tenderPengumuman->kd_tender }}</td>
                <td>{{ $tenderPengumuman->kd_pkt_dce }}</td>
                <td>{{ $tenderPengumuman->kd_rup }}</td>
                <td>{{ $tenderPengumuman->nama_paket }}</td>
                <td>{{ $tenderPengumuman->pagu }}</td>
                <td>{{ $tenderPengumuman->hps }}</td>
                <td>{{ $tenderPengumuman->sumber_dana }}</td>
                <td>{{ $tenderPengumuman->kualifikasi_paket }}</td>
                <td>{{ $tenderPengumuman->jenis_pengadaan }}</td>
                <td>{{ $tenderPengumuman->mtd_pemilihan }}</td>
                <td>{{ $tenderPengumuman->mtd_evaluasi }}</td>
                <td>{{ $tenderPengumuman->mtd_kualifikasi }}</td>
                <td>{{ $tenderPengumuman->kontrak_pembayaran }}</td>
                <td>{{ $tenderPengumuman->status_tender }}</td>
                <td>{{ $tenderPengumuman->tanggal_status }}</td>
                <td>{{ $tenderPengumuman->versi_tender }}</td>
                <td>{{ $tenderPengumuman->ket_ditutup }}</td>
                <td>{{ $tenderPengumuman->ket_diulang }}</td>
                <td>{{ $tenderPengumuman->tgl_buat_paket }}</td>
                <td>{{ $tenderPengumuman->tgl_kolektif_kolegial }}</td>
                <td>{{ $tenderPengumuman->tgl_pengumuman_tender }}</td>
                <td>{{ $tenderPengumuman->nip_ppk }}</td>
                <td>{{ $tenderPengumuman->nama_ppk }}</td>
                <td>{{ $tenderPengumuman->nip_pokja }}</td>
                <td>{{ $tenderPengumuman->nama_pokja }}</td>
                <td>{{ $tenderPengumuman->lokasi_pekerjaan }}</td>
                <td>{{ $tenderPengumuman->url_lpse }}</td>
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
                <td>{{ $tenderSelesai->kd_klpd }}</td>
                <td>{{ $tenderSelesai->nama_klpd }}</td>
                <td>{{ $tenderSelesai->jenis_klpd }}</td>
                <td>{{ $tenderSelesai->kd_satker }}</td>
                <td>{{ $tenderSelesai->kd_satker_str }}</td>
                <td>{{ $tenderSelesai->nama_satker }}</td>
                <td>{{ $tenderSelesai->kd_lpse }}</td>
                <td>{{ $tenderSelesai->nama_lpse }}</td>
                <td>{{ $tenderSelesai->kd_tender }}</td>
                <td>{{ $tenderSelesai->kd_pkt_dce }}</td>
                <td>{{ $tenderSelesai->kd_rup }}</td>
                <td>{{ $tenderSelesai->nama_paket }}</td>
                <td>{{ $tenderSelesai->pagu }}</td>
                <td>{{ $tenderSelesai->hps }}</td>
                <td>{{ $tenderSelesai->sumber_dana }}</td>
                <td>{{ $tenderSelesai->mak }}</td>
                <td>{{ $tenderSelesai->kualifikasi_paket }}</td>
                <td>{{ $tenderSelesai->jenis_pengadaan }}</td>
                <td>{{ $tenderSelesai->mtd_pemilihan }}</td>
                <td>{{ $tenderSelesai->mtd_evaluasi }}</td>
                <td>{{ $tenderSelesai->mtd_kualifikasi }}</td>
                <td>{{ $tenderSelesai->kontrak_pembayaran }}</td>
                <td>{{ $tenderSelesai->status_tender }}</td>
                <td>{{ $tenderSelesai->tgl_pengumuman_tender }}</td>
                <td>{{ $tenderSelesai->tgl_penetapan_pemenang }}</td>
                <td>{{ $tenderSelesai->url_lpse }}</td>
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
