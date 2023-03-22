@extends('layouts.app')

@push('scripts')
    <script src="{{ asset('assets/js/utils/ajax-modal.js') }}"></script>
    <script src="{{ asset('assets/js/pages/categories.detail.js') }}"></script>
@endpush

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Kategori/</span> Detail Kategori</h4>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Detail Kategori</h5>
        </div>
        <div class="card-body">
            <dl>
                <dt>Nama Kategori</dt>
                <dd>{{ $category->name }}</dd>
            </dl>
            <dl>
                <dt>Keterangan</dt>
                <dd>{{ $category->info }}</dd>
            </dl>
            <dl>
                <dt>Terakhir Diubah</dt>
                <dd>{{ $category->updated_at->format('d/m/Y H:i') }}</dd>
            </dl>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-secondary order-1" onclick="history.back()">
                Kembali
            </button>
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success">
                <i class="bx bx-pencil me-1"></i>
                <span>Edit</span>
            </a>
            <button type="reset" class="btn btn-danger delete-btn" data-delete-url="{{ route('categories.destroy', $category->id) }}"
                data-origin-url="{{ route('categories.index') }}">
                <i class="bx bx-trash me-1"></i>
                <span>Hapus</span>
            </button>
        </div>
    </div>
@endsection
