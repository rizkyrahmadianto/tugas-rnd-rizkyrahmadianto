@extends('layouts.app')

@push('after-style')
@endpush

@section('title')
  Home
@endsection

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-12 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title text-primary">Hai {{ Auth::user()->name }}! 🎉</h5>
                <p class="mb-4">
                  Selamat datang, selamat bertugas!
                </p>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img src="{{ asset('admin-assets/assets/img/illustrations/man-with-laptop-light.png') }}" height="140"
                  alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                  data-app-light-img="illustrations/man-with-laptop-light.png" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('after-script')
  <!-- Menghubungkan dengan pustaka Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.0/dist/chart.min.js"></script>

  <script>
    $(document).ready(function() {

    });
  </script>
@endpush
