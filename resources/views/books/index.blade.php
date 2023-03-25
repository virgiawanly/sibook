@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables/buttons.bootstrap5.min.css') }}">
    <link href="{{ asset('assets/vendor/libs/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/select2.css') }}" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="{{ asset('assets/vendor/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/utils/ajax-modal.js') }}"></script>
    <script src="{{ asset('assets/js/utils/select2.js') }}"></script>
    <script src="{{ asset('assets/js/pages/books.js') }}"></script>
    <!-- Initialize DataTable -->
    {!! $table->scripts() !!}
@endpush

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Buku/</span> List Buku</h4>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">List Data Buku</h5>
                        <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row align-items-center mb-4">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="category" class="form-label">Kategori</label>
                                <select id="category" class="form-control select2 ajax-select2 w-full"
                                    data-resource-url="{{ route('categories.select2') }}" placeholder="-- pilih kategori --"
                                    data-empty-option="-- semua kategori --">
                                    <!--Select2 -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button id="filter-btn" class="btn btn-primary mt-md-4">
                                <i class="bx bx-filter"></i>
                                <span>Filter</span>
                            </button>
                        </div>
                    </div>

                    <!-- DataTable -->
                    {!! $table->table(['class' => 'table table-striped w-100']) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
