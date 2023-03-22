@extends('layouts.app')
@section('title', isset($category) ? 'Edit Kategori' : 'Tambah Kategori')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Kategori /</span> {{ isset($category) ? 'Edit' : 'Tambah' }} Kategori</h4>

    <div class="row">
        <div class="col-12">
            <form action="{{ isset($category) ? route('categories.update', $category) : route('categories.store') }}" method="POST">
                @csrf
                @if (isset($category))
                    @method('PUT')
                @endif
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Form {{ isset($category) ? 'Edit' : 'Tambah' }} Kategori</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label">Nama Kategori <span class="text-danger">*</span></label>
                            <div class="col-md-10">
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') ?? ($category->name ?? '') }}" name="fname" placeholder="Nama Kategori" />
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label">Keterangan</label>
                            <div class="col-md-10">
                                <textarea name="info" id="info" name="info" class="form-control @error('info') is-invalid @enderror"
                                    style="resize: none; min-height: 100px;" placeholder="Keterangan (Opsional)">{{ old('info') ?? ($category->info ?? '') }}</textarea>
                                @error('info')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <div class="order-2">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                                <button type="reset" class="btn btn-secondary">
                                    Reset
                                </button>
                            </div>
                            <button type="button" class="btn btn-secondary order-1" onclick="history.back()">
                                Kembali
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
