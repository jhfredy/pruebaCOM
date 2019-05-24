@extends('backend.contenido.principal')
@section('body')
<div class="container-fluid mt--7">
        <!-- Table -->
        <div class="row">
          <div class="col">
              {{-- id para declarar vue --}}
              <div id="app">
                <users></users>
              </div>
          </div>
        </div>
        <!-- Footer -->
        @include('backend.contenido.footer')
      </div>
@endsection
@push('scripts')
    <script src="js/vueCompilado/appBackendVue.js"></script>
    <script src="js/toastr.min.js"></script>
    {{-- <script src="js/sweetalert2.all.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
@endpush
@push('styles')
  
  <link href="css/toastr.min.css" rel="stylesheet"/>
@endpush