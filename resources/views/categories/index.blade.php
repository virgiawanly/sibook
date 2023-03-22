@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables/buttons.bootstrap5.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/vendor/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/utils/ajax-modal.js') }}"></script>
    <script src="{{ asset('assets/js/pages/categories.js') }}"></script>
    <!-- Initialize DataTable -->
    {!! $table->scripts() !!}
@endpush

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Kategori/</span> List Kategori</h4>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">List Data Kategori Buku</h5>
                        <a href="{{ route('categories.create') }}" class="btn btn-primary">Tambah Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- DataTable -->
                    {!! $table->table(['class' => 'table table-striped w-100']) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
