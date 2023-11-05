@if($rupMasterSatker)
    <h1>Data for kd_satker: {{ $rupMasterSatker->kd_satker }}</h1>
    <h2>Nama Satker: {{ $rupMasterSatker->nama_satker }}</h2>
    <h3>Total Pagu Program:Rp. {{ number_format($totalPaguProgram) }}</h3>


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
    @endforeach

    <!-- Display data from PaketSwakelolaTerumumkan relationship -->
    @foreach($rupMasterSatker->paketSwakelolaTerumumkans as $paket)
        <h4>Paket Swakelola Terumumkan</h4>
        <p>Nama Paket: {{ $paket->nama_paket }}</p>
        <p>Pagu: {{ $paket->pagu }}</p>
        <!-- Add more fields as needed -->
    @endforeach

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
            <!-- Your existing code for programMasters, kegiatans, etc. -->
        </tbody>
    </table>
@endif

