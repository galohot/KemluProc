<h1>{{ $program->nama_program }}</h1>

@foreach($program->kegiatans as $kegiatan)
    <h2>{{ $kegiatan->nama_kegiatan }}</h2>

    @foreach($kegiatan->rupKros as $rupKro)
        <h3>{{ $rupKro->nama_kro }}</h3>

        @foreach($rupKro->rupRos as $rupRo)
            <h4>{{ $rupRo->nama_ro }}</h4>

            @foreach($rupRo->komponens as $komponen)
                <h5>{{ $komponen->nama_komponen }}</h5>

                @foreach($komponen->subkomponens as $subkomponen)
                    <p>{{ $subkomponen->nama_subkomponen }}</p>
                @endforeach
            @endforeach
        @endforeach
    @endforeach
@endforeach
