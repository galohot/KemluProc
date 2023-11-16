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
    <div class="col-12">
      <div class="row row-cards">
        <div class="col-sm-6 col-lg-6">
          <div class="card card-sm">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-auto">
                  <span class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" /></svg>
                  </span>
                </div>
                <div class="col">
                  <div class="font-weight-medium">
                    Paket Penyedia Terumumkan
                  </div>
                  <div class="text-secondary">
                    {{ $countPaketPenyedia }}
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
                  <span class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" /></svg>
                  </span>
                </div>
                <div class="col">
                  <div class="font-weight-medium">
                    Paket Swakelola Terumumkan
                  </div>
                  <div class="text-secondary">
                    {{ $countPaketSwakelola }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card card-sm">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-auto">
                  <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
                  </span>
                </div>
                <div class="col">
                  <div class="font-weight-medium">
                    Tender
                  </div>
                  <div class="text-secondary">
                    {{ $countTender }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card card-sm">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-auto">
                  <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
                  </span>
                </div>
                <div class="col">
                  <div class="font-weight-medium">
                    Non Tender
                  </div>
                  <div class="text-secondary">
                    {{ $countNotTender }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card card-sm">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-auto">
                  <span class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z" /></svg>
                  </span>
                </div>
                <div class="col">
                  <div class="font-weight-medium">
                    Epurchasing
                  </div>
                  <div class="text-secondary">
                    {{ $countEpurchasing }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="page-body">
        <div class="container-xl">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Base info</h3>
            </div>
            <div class="card-body">
              <div class="datagrid">
                <div class="datagrid-item">
                  <div class="datagrid-title">Registrar</div>
                  <div class="datagrid-content">Third Party</div>
                </div>
                <div class="datagrid-item">
                  <div class="datagrid-title">Nameservers</div>
                  <div class="datagrid-content">Third Party</div>
                </div>
                <div class="datagrid-item">
                  <div class="datagrid-title">Port number</div>
                  <div class="datagrid-content">3306</div>
                </div>
                <div class="datagrid-item">
                  <div class="datagrid-title">Expiration date</div>
                  <div class="datagrid-content">–</div>
                </div>
                <div class="datagrid-item">
                  <div class="datagrid-title">Creator</div>
                  <div class="datagrid-content">
                    <div class="d-flex align-items-center">
                      <span class="avatar avatar-xs me-2 rounded" style="background-image: url(./static/avatars/000m.jpg)"></span>
                      Paweł Kuna
                    </div>
                  </div>
                </div>
                <div class="datagrid-item">
                  <div class="datagrid-title">Age</div>
                  <div class="datagrid-content">15 days</div>
                </div>
                <div class="datagrid-item">
                  <div class="datagrid-title">Edge network</div>
                  <div class="datagrid-content">
                    <span class="status status-green">
                      Active
                    </span>
                  </div>
                </div>
                <div class="datagrid-item">
                  <div class="datagrid-title">Avatars list</div>
                  <div class="datagrid-content">
                    <div class="avatar-list avatar-list-stacked">
                      <span class="avatar avatar-xs rounded" style="background-image: url(./static/avatars/000m.jpg)"></span>
                      <span class="avatar avatar-xs rounded">JL</span>
                      <span class="avatar avatar-xs rounded" style="background-image: url(./static/avatars/002m.jpg)"></span>
                      <span class="avatar avatar-xs rounded" style="background-image: url(./static/avatars/003m.jpg)"></span>
                      <span class="avatar avatar-xs rounded" style="background-image: url(./static/avatars/000f.jpg)"></span>
                      <span class="avatar avatar-xs rounded">+3</span>
                    </div>
                  </div>
                </div>
                <div class="datagrid-item">
                  <div class="datagrid-title">Checkbox</div>
                  <div class="datagrid-content">
                    <label class="form-check">
                      <input class="form-check-input" type="checkbox" checked>
                      <span class="form-check-label">Click me</span>
                    </label>
                  </div>
                </div>
                <div class="datagrid-item">
                  <div class="datagrid-title">Icon</div>
                  <div class="datagrid-content">
                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                    Checked
                  </div>
                </div>
                <div class="datagrid-item">
                  <div class="datagrid-title">Form control</div>
                  <div class="datagrid-content">
                    <input type="text" class="form-control form-control-flush" placeholder="Input placeholder">
                  </div>
                </div>
                <div class="datagrid-item">
                  <div class="datagrid-title">Longer description</div>
                  <div class="datagrid-content">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
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