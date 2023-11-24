@extends('dashboard-layout')
@section('content')

    <div class="container-xl mt-3">
        <div class="row g-2 align-items-center">
            <div class="col-md-6">
                <label for="tahun_anggaran">Tahun Anggaran:</label>
                <input type="text" class="form-control" id="search_tahun_anggaran" placeholder="Type Tahun Anggaran to filter" oninput="filterOptions('tahun_anggaran')">
                <select class="form-select mt-2" id="tahun_anggaran" name="tahun_anggaran" onchange="updateUrl()">
                    <option value="">-- Select Tahun Anggaran --</option>
                    @foreach ($tahunAnggaranList as $tahunAnggaranOption)
                        <option value="{{ $tahunAnggaranOption }}" {{ $tahunAnggaranOption == $selectedTahunAnggaran ? 'selected' : '' }}>
                            {{ $tahunAnggaranOption }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="kd_satker_str">Nama Satker:</label>
                <input type="text" class="form-control" id="search_kd_satker_str" placeholder="Type Nama Satker to filter" oninput="filterOptions('kd_satker_str')">
                <select class="form-select mt-2" id="kd_satker_str" name="kd_satker_str" onchange="updateUrl()">
                    <option value="">-- Select Nama Satker --</option>
                    @foreach ($kdSatkerStrList as $index => $kdSatkerOption)
                        <option value="{{ $kdSatkerOption }}" {{ $kdSatkerOption == $selectedKdSatkerStr ? 'selected' : '' }}>
                            {{ $namaSatkerList[$index] }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    @if ($rupMasterSatker)
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="card-title text-primary text-center">
                            {{ $rupMasterSatker->nama_satker }}
                        </h2>
                        <h2 class="card-title text-primary text-center">
                            {{ $tahunAnggaran }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="page-body">
            <div class="container-xl">
                

                @if ($rupMasterSatker->paketPenyediaTerumumkans->isNotEmpty())
            
                    <div class="col-12">
                        <div class="row row-cards">
                            <div class="col-sm-6 col-lg-6">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-red text-white avatar">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                                                    <svg fill="#000000" width="800px" height="800px" viewBox="0 -8 72 72"
                                                        id="Layer_1" data-name="Layer 1"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <title>briefcase</title>
                                                        <path
                                                            d="M63.87,45.73V20.44H8V45.73a2.09,2.09,0,0,0,2.09,2.09H61.78A2.1,2.1,0,0,0,63.87,45.73Z" />
                                                        <path
                                                            d="M63.87,13.54a2.1,2.1,0,0,0-2.09-2.09H50.48V6.09A2.09,2.09,0,0,0,48.39,4H23.48a2.08,2.08,0,0,0-2.09,2.09v5.36H10.09A2.09,2.09,0,0,0,8,13.54V18H63.87V13.54ZM46.3,11.45H25.57V8.18H46.29v3.27Z" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Paket Penyedia Terumumkan
                                                </div>
                                                <div class="font-weight-medium">
                                                    Rp. {{ number_format($sumPaguPenyediaTerumumkan) }} ,-
                                                </div>
                                                <div class="text-secondary">
                                                    {{ $countPaketPenyedia }} Paket
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-indigo text-white avatar">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                                                    <svg fill="#000000" width="800px" height="800px" viewBox="0 -8 72 72"
                                                        id="Layer_1" data-name="Layer 1"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <title>capitol</title>
                                                        <path
                                                            d="M49.06,30.05A101.71,101.71,0,0,0,36,29.26a102.35,102.35,0,0,0-13.06.79,2,2,0,0,0-1.45,1.81v6c.41-.05,1.16-.1,2.2-.16V33a1.52,1.52,0,0,1,1.44-1.44,1.25,1.25,0,0,1,1.39,1.23v4.67l4.39-.15v-4.9a1.38,1.38,0,0,1,1.45-1.32,1.33,1.33,0,0,1,1.44,1.27v4.89h4.4V32.39a1.33,1.33,0,0,1,1.44-1.27,1.45,1.45,0,0,1,1.45,1.32v4.9l4.39.15V32.82a1.25,1.25,0,0,1,1.39-1.23A1.52,1.52,0,0,1,48.31,33v4.62c1,.06,1.79.11,2.2.16v-6A1.8,1.8,0,0,0,49.06,30.05Z" />
                                                        <path
                                                            d="M36,38.61a142.46,142.46,0,0,0-20,1.28V52.22l1.5,0c10.23-.32,17.4-.38,18.5-.38s8.5.06,18.67.38l1.33,0V39.89A142.46,142.46,0,0,0,36,38.61ZM22.94,48.39a1.6,1.6,0,0,1-1.45,1.44,1.21,1.21,0,0,1-1.38-1.17V42.92a1.53,1.53,0,0,1,1.38-1.44,1.3,1.3,0,0,1,1.45,1.17ZM30.16,48a1.49,1.49,0,0,1-1.44,1.38,1.3,1.3,0,0,1-1.45-1.22V42.38A1.5,1.5,0,0,1,28.72,41a1.29,1.29,0,0,1,1.44,1.23Zm7.28-.11a1.35,1.35,0,0,1-1.38,1.28,1.38,1.38,0,0,1-1.45-1.28V42.12a1.42,1.42,0,0,1,1.45-1.33,1.32,1.32,0,0,1,1.38,1.33Zm7.29.27a1.3,1.3,0,0,1-1.45,1.22A1.46,1.46,0,0,1,41.84,48V42.23A1.29,1.29,0,0,1,43.28,41a1.47,1.47,0,0,1,1.45,1.38Zm7.16.53a1.24,1.24,0,0,1-1.38,1.17,1.5,1.5,0,0,1-1.39-1.44V42.65a1.21,1.21,0,0,1,1.39-1.17,1.53,1.53,0,0,1,1.38,1.44Z" />
                                                        <path
                                                            d="M49,28.56A12.52,12.52,0,0,0,36,16.23,12.45,12.45,0,0,0,23.05,28.56,104,104,0,0,1,49,28.56Z" />
                                                        <path
                                                            d="M40.16,14.11c0-1.39-1.34-5.47-2.64-5.7h0A10.11,10.11,0,0,0,36,3.78a10.57,10.57,0,0,0-1.45,4.65h0C32.7,8.69,32,12.78,32,14.11a6.09,6.09,0,0,1-.23,1.33,15.91,15.91,0,0,1,4.28-.54,18.13,18.13,0,0,1,4.27.54A6.29,6.29,0,0,1,40.16,14.11Z" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Paket Swakelola Terumumkan
                                                </div>
                                                <div class="font-weight-medium">
                                                    Rp. {{ number_format($sumPaguSwakelolaTerumumkan) }} ,-
                                                </div>
                                                <div class="text-secondary">
                                                    {{ $countPaketSwakelola }} Paket
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4" data-bs-toggle="modal" data-bs-target="#modal-tender">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-transparent text-white avatar">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                    <svg width="800px" height="800px" viewBox="0 -8 72 72" id="Layer_1"
                                                        data-name="Layer 1" xmlns="http://www.w3.org/2000/svg">
                                                        <defs>
                                                            <style>
                                                                .cls-1 {
                                                                    fill: #010002;
                                                                }
                                                            </style>
                                                        </defs>
                                                        <title>users</title>
                                                        <path class="cls-1"
                                                            d="M18.87,28.44c.2.21.41.4.63.6a10.59,10.59,0,0,0,14.15,0c.22-.2.43-.39.62-.6s.4-.43.58-.65a10.64,10.64,0,1,0-16.55,0C18.48,28,18.68,28.23,18.87,28.44Z" />
                                                        <path class="cls-1"
                                                            d="M41.63,25.76c.17.18.35.35.53.52a9,9,0,0,0,12.05,0c.19-.17.36-.34.53-.52a6.41,6.41,0,0,0,.49-.55,9,9,0,0,0-7-14.73,9,9,0,0,0-7,14.73C41.3,25.4,41.46,25.59,41.63,25.76Z" />
                                                        <path class="cls-1"
                                                            d="M9.49,45.52H43.66A1.57,1.57,0,0,0,44.83,45a1.24,1.24,0,0,0,.31-1,18.77,18.77,0,0,0-9.9-14.22,12.25,12.25,0,0,1-17.33,0A18.77,18.77,0,0,0,8,44a1.25,1.25,0,0,0,.31,1A1.57,1.57,0,0,0,9.49,45.52Z" />
                                                        <path class="cls-1"
                                                            d="M9.49,45.52H43.66A1.57,1.57,0,0,0,44.83,45a1.24,1.24,0,0,0,.31-1,18.77,18.77,0,0,0-9.9-14.22,12.25,12.25,0,0,1-17.33,0A18.77,18.77,0,0,0,8,44a1.25,1.25,0,0,0,.31,1A1.57,1.57,0,0,0,9.49,45.52Z" />
                                                        <path class="cls-1"
                                                            d="M64,39a16,16,0,0,0-8.42-12.11,10.41,10.41,0,0,1-14.76,0,16.59,16.59,0,0,0-3.13,2.16,18.81,18.81,0,0,1,8.26,11.24H62.73a1.33,1.33,0,0,0,1-.44A1.06,1.06,0,0,0,64,39Z" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Tender/Seleksi
                                                </div>
                                                <div class="font-weight-medium">
                                                    Rp. {{ number_format($sumPaguTenderSeleksi) }} ,-
                                                </div>
                                                <div class="text-secondary">
                                                    {{ $countTenderSeleksi }} Paket
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal modal-blur fade" id="modal-tender" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Tender Details</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th style="min-width: 300px;" class="text-nowrap">Metode Pengadaan</th>
                                                        <th class="text-nowrap">Paket</th>
                                                        <th class="text-nowrap">Pagu</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($countPaketTenderDetails as $result)
                                                        <tr>
                                                            <td>{{ $result->metode_pengadaan }}</td>
                                                            <td>{{ $result->count }}</td>
                                                            <td>Rp. {{ number_format($result->sum_pagu) }} ,-</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>
                                  </div>
                                </div>
                            </div>    
                            <div class="col-sm-6 col-lg-4" data-bs-toggle="modal" data-bs-target="#modal-nontender">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-transparent text-white avatar">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                                    <svg width="800px" height="800px" viewBox="0 -8 72 72" id="Layer_1"
                                                        data-name="Layer 1" xmlns="http://www.w3.org/2000/svg">
                                                        <defs>
                                                            <style>
                                                                .cls-1 {
                                                                    fill: #010002;
                                                                }
                                                            </style>
                                                        </defs>
                                                        <title>user</title>
                                                        <path class="cls-1"
                                                            d="M12.54,52.05H59.46a2.11,2.11,0,0,0,1.6-.7A1.73,1.73,0,0,0,61.49,50,25.8,25.8,0,0,0,47.9,30.45a16.8,16.8,0,0,1-23.8,0A25.8,25.8,0,0,0,10.51,50a1.75,1.75,0,0,0,.43,1.38A2.11,2.11,0,0,0,12.54,52.05Z" />
                                                        <path class="cls-1"
                                                            d="M25.43,28.6c.27.29.56.56.85.82a14.52,14.52,0,0,0,19.43,0,11.1,11.1,0,0,0,.86-.82c.27-.29.54-.58.79-.89a14.6,14.6,0,1,0-22.72,0C24.89,28,25.16,28.31,25.43,28.6Z" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Non Tender
                                                </div>
                                                <div class="font-weight-medium">
                                                    Rp. {{ number_format($sumPaguNonTender) }} ,-
                                                </div>
                                                <div class="text-secondary">
                                                    {{ $countPaketPenyedia - $countTenderSeleksi - $countEpurchasing }}
                                                    Paket
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal modal-blur fade" id="modal-nontender" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Non Tender Details</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-nowrap">Metode Pengadaan</th>
                                                        <th class="text-nowrap">Paket</th>
                                                        <th class="text-nowrap">Pagu</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($countPaketNontenderDetails as $result)
                                                        <tr>
                                                            <td>{{ $result->metode_pengadaan }}</td>
                                                            <td>{{ $result->count }}</td>
                                                            <td>Rp. {{ number_format($result->sum_pagu) }} ,-</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-4" data-bs-toggle="modal" data-bs-target="#modal-epurchasing">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-transparent text-white avatar">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                                    <svg fill="#000000" width="800px" height="800px"
                                                        viewBox="0 -8 72 72" id="Layer_1" data-name="Layer 1"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <title>computer</title>
                                                        <path
                                                            d="M57.43,8V7.94H14.55V8A2.84,2.84,0,0,0,12,10.55V38.73a2.75,2.75,0,0,0,.38,1.41,2.62,2.62,0,0,0,2.44,1.43H30.26v3.9H27.32a1.3,1.3,0,0,0,0,2.59H44.66a1.3,1.3,0,1,0,0-2.59H41.72v-3.9H57.19a2.63,2.63,0,0,0,2.45-1.43,2.91,2.91,0,0,0,.4-1.41V10.55A2.9,2.9,0,0,0,57.43,8Zm0,2.77V38.73c0,.16-.07.23-.24.23H14.78c-.16,0-.23-.07-.23-.23V10.55H57.43v.23Z" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Epurchasing
                                                </div>
                                                <div class="font-weight-medium">
                                                    Rp. {{ number_format($sumPaguEpurchasing) }} ,-
                                                </div>
                                                <div class="text-secondary">
                                                    {{ $countEpurchasing }} Paket
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal modal-blur fade" id="modal-epurchasing" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">E-Purchasing Details</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th style="min-width: 300px;" class="text-nowrap">Metode Pengadaan</th>
                                                        <th class="text-nowrap">Paket</th>
                                                        <th class="text-nowrap">Pagu</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($countPaketEpurchasingDetails as $result)
                                                        <tr>
                                                            <td>{{ $result->metode_pengadaan }}</td>
                                                            <td>{{ $result->count }}</td>
                                                            <td>Rp. {{ number_format($result->sum_pagu) }} ,-</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>
                                  </div>
                                </div>
                            </div> 
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-xl-6 my-3">
                            <div class="card">
                                <div class="card-body">
                                    <div id="chart-paket-penyedia"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6 my-3">
                            <div class="card">
                                <div class="card-body">
                                    <div id="chart-pagu-penyedia"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hr-text"></div>

                    <div class="row">
                        <!-- Pencatatan Non Tender (Pagu) -->
                        <div class="col-lg-6 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title mb-4 text-primary text-center">
                                        PENCATATAN NON TENDER
                                    </h3>
                                    <h3 class="card-title mb-4" data-bs-toggle="modal" data-bs-target="#modal-nontenderpct">
                                        <a href="#modal-nontenderpct" class="text-reset">Pencatatan Non Tender (Pagu)</a>
                                    </h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-secondary"><span style="color: #0054a6"><b>{{ $kdRupTercatatNonTender->sum('count') }}</b></span> dari <span style="color: #bd081c"><b>{{ $countPaketPenyedia - $countTenderSeleksi - $countEpurchasing }}</b></span> paket Non Tender Tercatat</p>
                                            <p class="text-secondary">Dengan nilai <span style="color: #0054a6"><b>Rp. {{ number_format($kdRupTercatatNonTender->sum('sum_pagu')) }} ,-</b></span> dari <span style="color: #bd081c"><b>Rp. {{ number_format($sumPaguNonTender) }} ,-</b></span></p>
                                            @if ($formattedUpdatedAt)
                                                <p class="text-secondary">Updated at <b>{{ $formattedUpdatedAt }}</b></p>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <div class="progress mt-3">
                                                @if($sumPaguNonTender != 0)
                                                    
                                                    <div class="progress-bar" style="width: {{ number_format(($sumPaguPencatatanNonTender / $sumPaguNonTender) * 100, 2) }}%"></div>
                                                @else
                                                    <div>Error: Pagu Non-Tender is 0</div>
                                                @endif
                                            </div>
                                            @if($sumPaguNonTender != 0)
                                                <p class="text-secondary mt-2">Persentase Pagu: <span style="color: #0054a6"><b>{{ number_format(($sumPaguPencatatanNonTender / $sumPaguNonTender) * 100, 2) }}%</b></span></p>
                                            @else
                                                <p class="text-secondary mt-2">Error: Persentase Pagu tidak dapat dihitung karena Pagu Non-Tender adalah 0</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="modal modal-blur fade" id="modal-nontenderpct" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title">Non-Tender Tercatat Details</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th style="min-width: 300px;" class="text-nowrap">Metode Pengadaan</th>
                                                                <th class="text-nowrap">Paket</th>
                                                                <th class="text-nowrap">Pagu</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($kdRupTercatatNonTender as $result)
                                                                <tr>
                                                                    <td>{{ $result->metode_pengadaan }}</td>
                                                                    <td>{{ $result->count }}</td>
                                                                    <td>Rp. {{ number_format($result->sum_pagu) }} ,-</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                
                                            </div>
                                          </div>
                                        </div>
                                    </div> 
                    
                                    <hr class="hr-text mt-4 mb-4">
                    
                                    <!-- Pagu PDN Non Tender Tercatat -->
                                    <h3 class="card-title mb-4" data-bs-toggle="modal" data-bs-target="#modal-nontenderpdn">
                                        <a href="#modal-nontenderpdn" class="text-reset">Pagu PDN Non Tender Tercatat</a>
                                    </h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-secondary"><span style="color: #0054a6"><b>{{ $pdnTercatat->sum('count') }}</b></span> dari <span style="color: #bd081c"><b>{{ $countPdn }}</b></span> paket Non Tender berstatus PDN sudah tercatat</p>
                                            <p class="text-secondary">Pagu PDN tercatat = <span style="color: #0054a6"><b>Rp. {{ number_format($pdnTercatat->sum('sum_pagu')) }} ,-</b></span> dari <span style="color: #bd081c"><b>Rp. {{ number_format($sumPaguPdn) }} ,-</b></span></p>
                                            @if ($formattedUpdatedAt)
                                                <p class="text-secondary">Updated at <b>{{ $formattedUpdatedAt }}</b></p>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <div class="progress mt-3">
                                                @if($sumPaguPdn != 0)
                                                    <div class="progress-bar" style="width: {{ number_format(($pdnTercatat->sum('sum_pagu') / $sumPaguPdn) * 100, 2) }}%"></div>
                                                @else
                                                    <div>Error: Pagu PDN is 0</div>
                                                @endif
                                            
                                            </div>
                                            @if($sumPaguPdn != 0)
                                                <p class="text-secondary mt-2">Persentase Pagu: <span style="color: #0054a6"><b>{{ number_format(($pdnTercatat->sum('sum_pagu') / $sumPaguPdn) * 100, 2) }}%</b></span></p>
                                            @else
                                                <p class="text-secondary mt-2">Error: Persentase Pagu tidak dapat dihitung karena Pagu PDN adalah 0</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="modal modal-blur fade" id="modal-nontenderpdn" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title">Non-Tender PDN Details</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th style="min-width: 300px;" class="text-nowrap">Metode Pengadaan</th>
                                                                <th class="text-nowrap">Paket</th>
                                                                <th class="text-nowrap">Pagu</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($pdnTercatat as $result)
                                                                <tr>
                                                                    <td>{{ $result->metode_pengadaan }}</td>
                                                                    <td>{{ $result->count }}</td>
                                                                    <td>Rp. {{ number_format($result->sum_pagu) }} ,-</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                
                                            </div>
                                          </div>
                                        </div>
                                    </div> 

                                    <hr class="hr-text mt-4 mb-4">
                    
                                    <!-- Pagu UKM Non Tender Tercatat -->
                                    <h3 class="card-title mb-4" data-bs-toggle="modal" data-bs-target="#modal-nontenderukm">
                                        <a href="#modal-nontenderukm" class="text-reset">Pagu UKM Non Tender Tercatat</a>
                                    </h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-secondary"><span style="color: #0054a6"><b>{{ $ukmTercatat->sum('count') }}</b></span> dari <span style="color: #bd081c"><b>{{ $countUkm }}</b></span> paket Non Tender berstatus UKM sudah tercatat</p>
                                            <p class="text-secondary">Pagu UKM tercatat = <span style="color: #0054a6"><b>Rp. {{ number_format($ukmTercatat->sum('sum_pagu')) }} ,-</b></span> dari <span style="color: #bd081c"><b>Rp. {{ number_format($sumPaguUkm) }} ,-</b></span></p>
                                            @if ($formattedUpdatedAt)
                                                <p class="text-secondary">Updated at <b>{{ $formattedUpdatedAt }}</b></p>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <div class="progress mt-3">
                                                @if($sumPaguUkm != 0)
                                                    <div class="progress-bar" style="width: {{ number_format(($ukmTercatat->sum('sum_pagu') / $sumPaguUkm) * 100, 2) }}%"></div>
                                                @else
                                                    <div>Error: Pagu UKM is 0</div>
                                                @endif
                                            </div>
                                            @if($sumPaguUkm != 0)
                                                <p class="text-secondary mt-2">Persentase Pagu: <span style="color: #0054a6"><b>{{ number_format(($ukmTercatat->sum('sum_pagu') / $sumPaguUkm) * 100, 2) }}%</b></span></p>
                                            @else
                                                <p class="text-secondary mt-2">Error: Persentase Pagu tidak dapat dihitung karena Pagu UKM adalah 0</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="modal modal-blur fade" id="modal-nontenderukm" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title">Non-Tender UKM Details</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th style="min-width: 300px;" class="text-nowrap">Metode Pengadaan</th>
                                                                <th class="text-nowrap">Paket</th>
                                                                <th class="text-nowrap">Pagu</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($ukmTercatat as $result)
                                                                <tr>
                                                                    <td>{{ $result->metode_pengadaan }}</td>
                                                                    <td>{{ $result->count }}</td>
                                                                    <td>Rp. {{ number_format($result->sum_pagu) }} ,-</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                
                                            </div>
                                          </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    
                        <!-- E-Purchasing Terproses -->
                        <div class="col-lg-6 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title mb-4 text-primary text-center">
                                        E-PURCHASING
                                    </h3>
                                    <h3 class="card-title mb-4" data-bs-toggle="modal" data-bs-target="#modal-epurchasingProses">
                                        <a href="#modal-epurchasingProses" class="text-reset">E-Purchasing Terproses</a>
                                    </h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-secondary"><span style="color: #0054a6"><b>{{ $countKdRupEpurchasing }}</b></span> dari <span style="color: #bd081c"><b>{{ $countEpurchasing }}</b></span> paket E-Purchasing terproses</p>
                                            <p class="text-secondary">Dengan nilai <span style="color: #0054a6"><b>Rp. {{ number_format($sumPaguEpurchasingProses) }} ,-</b></span> dari <span style="color: #bd081c"><b>Rp. {{ number_format($sumPaguEpurchasing) }} ,-</b></span></p>
                                            @if ($formattedEpurchasingUpdatedAt)
                                                <p class="text-secondary">Updated at <b>{{ $formattedEpurchasingUpdatedAt }}</b></p>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <div class="progress mt-3">
                                                @if($sumPaguEpurchasing != 0)
                                                    <div class="progress-bar" style="width: {{ number_format(($sumPaguEpurchasingProses / $sumPaguEpurchasing) * 100, 2) }}%"></div>
                                                @else
                                                    <div>Error: Pagu ePurchasing is 0</div>
                                                @endif
                                            </div>
                                            @if($sumPaguEpurchasing != 0)
                                                <p class="text-secondary mt-2">Persentase Pagu: <span style="color: #0054a6"><b>{{ number_format(($epurchasingProses->sum('sum_pagu') / $sumPaguEpurchasing) * 100, 2) }}%</b></span></p>
                                            @else
                                                <p class="text-secondary mt-2">Error: Persentase Pagu tidak dapat dihitung karena Pagu ePurchasing adalah 0</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="modal modal-blur fade" id="modal-epurchasingProses" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title">Status E-Purchasing Details</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th style="min-width: 300px;" class="text-nowrap">Metode Pengadaan</th>
                                                                <th class="text-nowrap">Paket</th>
                                                                <th class="text-nowrap">Pagu</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($epurchasingProses as $result)
                                                                <tr>
                                                                    <td>{{ $result->status_paket }}</td>
                                                                    <td>{{ $result->count }}</td>
                                                                    <td>Rp. {{ number_format($result->sum_pagu) }} ,-</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                
                                            </div>
                                          </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    
                        <!-- Additional E-Purchasing Cards -->
                        <!-- Repeat the above structure for additional E-Purchasing cards -->
                    
                    </div>
                    
                    
                @endif

            </div>
        </div>

        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            E-PURCHASING {{ $rupMasterSatker->nama_satker }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="card-body">
                        <div id="table-default" class="table-responsive">
                            <table id="your-table-id" class="table">
                                <thead>
                                    <tr>
                                        <th>Tahun Anggaran</th>
                                        <th>Nama Paket</th>
                                        <th>Kuantitas</th>
                                        <th>Total Harga</th>
                                        <th>Status Paket</th>
                                        <th>Nama Penyedia</th>
                                        <th>Nama Produk</th>
                                        <th>Nilai TKDN</th>
                                        <th>Nama Pemeliki Seritifkat TKDN</th>
                                        <th>Nomor TKDN</th>
                                        <th>Nilai BMP</th>
                                        <th>Nama Komoditas</th>
                                        <!-- Add more table headers as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rupMasterSatker->paketPenyediaTerumumkans as $paket)
                                        @foreach ($paket->paketEcats as $paketEcat)
                                            <tr>
                                                <td>
                                                    @if ($paketEcat->tahun_anggaran)
                                                        {{ $paketEcat->tahun_anggaran }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($paketEcat->nama_paket)
                                                        {{ $paketEcat->nama_paket }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($paketEcat->kuantitas)
                                                        {{ $paketEcat->kuantitas }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($paketEcat->total_harga)
                                                        Rp. {{ number_format($paketEcat->total_harga) }} ,-
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($paketEcat->status_paket)
                                                        {{ $paketEcat->status_paket }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($paketEcat->epurchasingPenyedia && $paketEcat->epurchasingPenyedia->nama_penyedia)
                                                        {{ $paketEcat->epurchasingPenyedia->nama_penyedia }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($paketEcat->epurchasingProduct && $paketEcat->epurchasingProduct->nama_produk)
                                                        {{ $paketEcat->epurchasingProduct->nama_produk }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($paketEcat->epurchasingProduct && $paketEcat->epurchasingProduct->tkdn_produk)
                                                        {{ number_format($paketEcat->epurchasingProduct->tkdn_produk, 2, ',', '.') }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                
                                                <td>
                                                    @if ($paketEcat->epurchasingProduct && $paketEcat->epurchasingProduct->nama_pemilik_sertifikat_tkdn)
                                                        {{ $paketEcat->epurchasingProduct->nama_pemilik_sertifikat_tkdn }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($paketEcat->epurchasingProduct && $paketEcat->epurchasingProduct->nomor_tkdn)
                                                        {{ $paketEcat->epurchasingProduct->nomor_tkdn }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($paketEcat->epurchasingProduct && $paketEcat->epurchasingProduct->nilai_bmp)
                                                        {{ $paketEcat->epurchasingProduct->nilai_bmp }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($paketEcat->epurchasingKomoditas && $paketEcat->epurchasingKomoditas->nama_komoditas)
                                                        {{ $paketEcat->epurchasingKomoditas->nama_komoditas }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
        
                        <!-- Your other content -->
                    </div>
                </div>
            </div>
        </div>

    @endif

    <script>
        const satkerRoute = "{{ route('satker.show', ['tahun_anggaran' => ':tahun_anggaran', 'kd_satker_str' => ':kd_satker_str']) }}";
    
        function updateUrl() {
            // Get selected values
            var tahunAnggaran = document.getElementById("tahun_anggaran").value;
            var kdSatkerStr = document.getElementById("kd_satker_str").value;
    
            // Check if both values are selected
            if (tahunAnggaran && kdSatkerStr) {
                // Construct the URL using Laravel route
                var url = satkerRoute.replace(':tahun_anggaran', tahunAnggaran).replace(':kd_satker_str', kdSatkerStr);
    
                // Redirect to the constructed URL
                window.location.href = url;
            }
        }
    
        function filterOptions(dropdownId) {
            var input, filter, options, i;
            input = document.getElementById("search_" + dropdownId);
            filter = input.value.toUpperCase();
            options = document.getElementById(dropdownId).getElementsByTagName("option");
    
            for (i = 0; i < options.length; i++) {
                if (options[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    options[i].style.display = "";
                } else {
                    options[i].style.display = "none";
                }
            }
        }
    </script>
    
    <script>
        $(document).ready(function () {
            // Initialize DataTable with options
            var table = $('#your-table-id').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": false,
                "lengthChange": true,
                "lengthMenu": [5, 10, 20],
                "columnDefs": [
                    { "type": "numeric", targets: 6 } // Treat 7th column as numeric
                ],
                // Add any other DataTables options you need
            });

            // Add a select dropdown for the "Tahun Anggaran" column
            table.columns(0).every(function () {
                var column = this;

                var select = $('<select><option value=""></option></select>')
                    .appendTo($(column.header()))
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                    });

                column.data().unique().sort().each(function (d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
            table.columns(4).every(function () {
                var column = this;

                var select = $('<select><option value=""></option></select>')
                    .appendTo($(column.header()))
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                    });

                column.data().unique().sort().each(function (d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
        });

    </script>
    


@endsection