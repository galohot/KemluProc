@extends('dashboard-layout')
@section('content')

    @if ($rupMasterSatker)
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            {{ $rupMasterSatker->nama_satker }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-body">
            <div class="container-xl">

                @if ($rupMasterSatker->paketPenyediaTerumumkans->isNotEmpty())
                    <div class="hr-text"></div>
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
                            <div class="col-sm-6 col-lg-4">
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
                            <div class="col-sm-6 col-lg-4">
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
                            <div class="col-sm-6 col-lg-4">
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
                        <div class="col-lg-6 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="card-title mb-1">
                                                <a href="#" class="text-reset">Pencatatan Non Tender (Pagu)</a>
                                            </h3>
                                            <div class="text-secondary">
                                                {{ $countKdRupTercatat }} dari
                                                {{ $countPaketPenyedia - $countTenderSeleksi - $countEpurchasing }} paket
                                                Non Tender Tercatat
                                            </div>
                                            <div class="text-secondary">
                                                Dengan nilai Rp. {{ number_format($sumPaguPencatatanNonTender) }} ,- dari
                                                Rp. {{ number_format($sumPaguNonTender) }} ,-
                                            </div>
                                            <div class="text-secondary">
                                                @if ($formattedUpdatedAt)
                                                    Updated at {{ $formattedUpdatedAt }}
                                                @endif

                                            </div>
                                            <div class="mt-3">
                                                <div class="row g-2 align-items-center">
                                                    <div class="text-secondary">Persentase Pagu</div>
                                                    <div class="col-auto">
                                                        {{ number_format(($sumPaguPencatatanNonTender / $sumPaguNonTender) * 100, 2) }}%
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar"
                                                                style="width: {{ number_format(($sumPaguPencatatanNonTender / $sumPaguNonTender) * 100, 2) }}%"
                                                                role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100" aria-label="25% Complete">
                                                                <span
                                                                    class="visually-hidden">{{ number_format(($sumPaguPencatatanNonTender / $sumPaguNonTender) * 100, 2) }}%
                                                                    Complete</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="hr-text"></div>

                                            <h3 class="card-title mb-1">
                                                <a href="#" class="text-reset">Pagu PDN Non Tender Tercatat</a>
                                            </h3>
                                            <div class="text-secondary">
                                                {{ $countPdnTercatat }} dari {{ $countPdn }} paket Non Tender
                                                berstatus PDN sudah tercatat
                                            </div>
                                            <div class="text-secondary">
                                                Pagu PDN tercatat = Rp. {{ number_format($sumPaguPdnNonTender) }} ,- dari
                                                Rp. {{ number_format($sumPaguPdn) }} ,-
                                            </div>
                                            <div class="text-secondary">
                                                @if ($formattedUpdatedAt)
                                                    Updated at {{ $formattedUpdatedAt }}
                                                @endif
                                            </div>
                                            <div class="mt-3">
                                                <div class="row g-2 align-items-center">
                                                    <div class="text-secondary">Persentase Pagu</div>
                                                    <div class="col-auto">
                                                        {{ number_format(($sumPaguPdnNonTender / $sumPaguPdn) * 100, 2) }}%
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar"
                                                                style="width: {{ number_format(($sumPaguPdnNonTender / $sumPaguPdn) * 100, 2) }}%"
                                                                role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100" aria-label="25% Complete">
                                                                <span
                                                                    class="visually-hidden">{{ number_format(($sumPaguPdnNonTender / $sumPaguPdn) * 100, 2) }}%
                                                                    Complete</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hr-text"></div>

                                            <h3 class="card-title mb-1">
                                                <a href="#" class="text-reset">Pagu UKM Non Tender Tercatat</a>
                                            </h3>
                                            <div class="text-secondary">
                                                {{ $countUkmTercatat }} dari {{ $countUkm }} paket Non Tender
                                                berstatus UKM sudah tercatat
                                            </div>
                                            <div class="text-secondary">
                                                Pagu UKM tercatat = Rp. {{ number_format($sumPaguUkmNonTender) }} ,- dari
                                                Rp. {{ number_format($sumPaguUkm) }} ,-
                                            </div>
                                            <div class="text-secondary">
                                                @if ($formattedUpdatedAt)
                                                    Updated at {{ $formattedUpdatedAt }}
                                                @endif
                                            </div>
                                            <div class="mt-3">
                                                <div class="row g-2 align-items-center">
                                                    <div class="text-secondary">Persentase Pagu</div>
                                                    <div class="col-auto">
                                                        {{ number_format(($sumPaguUkmNonTender / $sumPaguUkm) * 100, 2) }}%
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar"
                                                                style="width: {{ number_format(($sumPaguUkmNonTender / $sumPaguUkm) * 100, 2) }}%"
                                                                role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100" aria-label="25% Complete">
                                                                <span
                                                                    class="visually-hidden">{{ number_format(($sumPaguUkmNonTender / $sumPaguUkm) * 100, 2) }}%
                                                                    Complete</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="card-title mb-1">
                                                <a href="#" class="text-reset">E-Purchasing Terproses</a>
                                            </h3>
                                            <div class="text-secondary">
                                                {{ $countKdRupEpurchasing }} dari {{ $countEpurchasing }} paket
                                                E-Purchasing terproses
                                            </div>
                                            <div class="text-secondary">
                                                Dengan nilai Rp. {{ number_format($sumPaguEpurchasingProses) }} ,- dari Rp.
                                                {{ number_format($sumPaguEpurchasing) }} ,-
                                            </div>
                                            <div class="text-secondary">
                                                @if ($formattedEpurchasingUpdatedAt)
                                                    Updated at {{ $formattedEpurchasingUpdatedAt }}
                                                @endif

                                            </div>
                                            <div class="mt-3">
                                                <div class="row g-2 align-items-center">
                                                    <div class="text-secondary">Persentase Pagu</div>
                                                    <div class="col-auto">
                                                        {{ number_format(($sumPaguEpurchasingProses / $sumPaguEpurchasing) * 100, 2) }}%
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar"
                                                                style="width: {{ number_format(($sumPaguEpurchasingProses / $sumPaguEpurchasing) * 100, 2) }}%"
                                                                role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100" aria-label="25% Complete">
                                                                <span
                                                                    class="visually-hidden">{{ number_format(($sumPaguEpurchasingProses / $sumPaguEpurchasing) * 100, 2) }}%
                                                                    Complete</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="hr-text"></div>
                                            <h3 class="card-title mb-1">
                                                <a href="#" class="text-reset">E-Purchasing Terproses</a>
                                            </h3>
                                            <div class="text-secondary">
                                                {{ $countKdRupEpurchasing }} dari {{ $countEpurchasing }} paket
                                                E-Purchasing terproses
                                            </div>
                                            <div class="text-secondary">
                                                Dengan nilai Rp. {{ number_format($sumPaguEpurchasingProses) }} ,- dari Rp.
                                                {{ number_format($sumPaguEpurchasing) }} ,-
                                            </div>
                                            <div class="text-secondary">
                                                @if ($formattedEpurchasingUpdatedAt)
                                                    Updated at {{ $formattedEpurchasingUpdatedAt }}
                                                @endif

                                            </div>
                                            <div class="mt-3">
                                                <div class="row g-2 align-items-center">
                                                    <div class="text-secondary">Persentase Pagu</div>
                                                    <div class="col-auto">
                                                        {{ number_format(($sumPaguEpurchasingProses / $sumPaguEpurchasing) * 100, 2) }}%
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar"
                                                                style="width: {{ number_format(($sumPaguEpurchasingProses / $sumPaguEpurchasing) * 100, 2) }}%"
                                                                role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100" aria-label="25% Complete">
                                                                <span
                                                                    class="visually-hidden">{{ number_format(($sumPaguEpurchasingProses / $sumPaguEpurchasing) * 100, 2) }}%
                                                                    Complete</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hr-text"></div>
                                            <h3 class="card-title mb-1">
                                                <a href="#" class="text-reset">E-Purchasing Terproses</a>
                                            </h3>
                                            <div class="text-secondary">
                                                {{ $countKdRupEpurchasing }} dari {{ $countEpurchasing }} paket
                                                E-Purchasing terproses
                                            </div>
                                            <div class="text-secondary">
                                                Dengan nilai Rp. {{ number_format($sumPaguEpurchasingProses) }} ,- dari Rp.
                                                {{ number_format($sumPaguEpurchasing) }} ,-
                                            </div>
                                            <div class="text-secondary">
                                                @if ($formattedEpurchasingUpdatedAt)
                                                    Updated at {{ $formattedEpurchasingUpdatedAt }}
                                                @endif

                                            </div>
                                            <div class="mt-3">
                                                <div class="row g-2 align-items-center">
                                                    <div class="text-secondary">Persentase Pagu</div>
                                                    <div class="col-auto">
                                                        {{ number_format(($sumPaguEpurchasingProses / $sumPaguEpurchasing) * 100, 2) }}%
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar"
                                                                style="width: {{ number_format(($sumPaguEpurchasingProses / $sumPaguEpurchasing) * 100, 2) }}%"
                                                                role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100" aria-label="25% Complete">
                                                                <span
                                                                    class="visually-hidden">{{ number_format(($sumPaguEpurchasingProses / $sumPaguEpurchasing) * 100, 2) }}%
                                                                    Complete</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>

    @endif



@endsection