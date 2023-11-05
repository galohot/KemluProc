@if($rupMasterSatker)
    <h1>Data for kd_satker: {{ $rupMasterSatker->kd_satker }}</h1>
    <h2>Nama Satker: {{ $rupMasterSatker->nama_satker }}</h2>
    <h3>Total Pagu Program:Rp. {{ number_format($totalPaguProgram) }}</h3>
    
    <table>
        <thead>
            <tr>
                <th>Kode Tender</th>
                <td>Nama Paket</td>
                <th>Nama Penyedia</th>
            </tr>
        </thead>
        <tbody>
            @php
                $prevKdTender = null;
                $prevNamaPaket = null;
            @endphp
            @foreach($rupMasterSatker->paketPenyediaTerumumkans as $paketPenyediaTerumumkan)
                @foreach($paketPenyediaTerumumkan->tenderPengumumans as $tenderPengumuman)
                    @foreach($tenderPengumuman->pesertaTender as $pesertaTender)
                        <tr>
                            <td>
                                @if($prevKdTender !== $pesertaTender->kd_tender)
                                    {{ $pesertaTender->kd_tender }}
                                    @php $prevKdTender = $pesertaTender->kd_tender; @endphp
                                @endif
                            </td>
                            <td>
                                @if($prevNamaPaket !== $tenderPengumuman->nama_paket)
                                    {{ $tenderPengumuman->nama_paket }}
                                    @php $prevNamaPaket = $tenderPengumuman->nama_paket; @endphp
                                @endif
                            </td>
                            <td>{{ $pesertaTender->nama_penyedia }}</td>
                        </tr>
                    @endforeach
                @endforeach
            @endforeach
        </tbody>
    </table>
    
    



    <table>
        <thead>
            <tr>
                <th>Program</th>
                <th>Kegiatan</th>
                <th>Rup Kro</th>
                <th>Rup Ro</th>
                <th>Komponen</th>
                <th>Subkomponen</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rupMasterSatker->programMasters as $programMaster)
                @foreach($programMaster->kegiatans as $kegiatanMaster)
                    @foreach($kegiatanMaster->rupKros as $rupKroMaster)
                        @foreach($rupKroMaster->rupRos as $rupRoMaster)
                            @foreach($rupRoMaster->komponens as $komponenMaster)
                                @foreach($komponenMaster->subkomponens as $subkomponenMaster)
                                    <tr>
                                        <td>{{ $programMaster->nama_program }}</td>
                                        <td>{{ $kegiatanMaster->nama_kegiatan }}</td>
                                        <td>{{ $rupKroMaster->nama_kro }}</td>
                                        <td>{{ $rupRoMaster->nama_ro }}</td>
                                        <td>{{ $komponenMaster->nama_komponen }}</td>
                                        <td>{{ $subkomponenMaster->nama_subkomponen }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
            @endforeach
        </tbody>
    </table>
@endif

@if($rupMasterSatker)
    <h1>Data for kd_satker: {{ $rupMasterSatker->kd_satker }}</h1>
    <h2>Nama Satker: {{ $rupMasterSatker->nama_satker }}</h2>
    <h3>Total Pagu Program: Rp. {{ number_format($totalPaguProgram) }}</h3>

    <!-- Display data from PaketPenyediaTerumumkan relationship -->
    @foreach($rupMasterSatker->paketPenyediaTerumumkans as $paket)
        <h4>Paket Penyedia Terumumkan</h4>
        <p>Nama Paket: {{ $paket->nama_paket }}</p>
        <p>Pagu: {{ $paket->pagu }}</p>
        <!-- Add more fields as needed -->
        @foreach ($paket->penyediaLokasis as $lokasi)
            <p>lokasi: {{ $lokasi->detail_lokasi }}</p>
            <p>lokasi: {{ $lokasi->provinsi }}</p>
            <p>lokasi: {{ $lokasi->kab_kota }}</p>
            
        @endforeach
    @endforeach

    <!-- Display data from PaketSwakelolaTerumumkan relationship -->
    @foreach($rupMasterSatker->paketSwakelolaTerumumkans as $paket)
        <h4>Paket Swakelola Terumumkan</h4>
        <p>Nama Paket: {{ $paket->nama_paket }}</p>
        <p>Pagu: {{ $paket->pagu }}</p>
        <!-- Add more fields as needed -->
    @endforeach


@endif

