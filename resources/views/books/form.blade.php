@extends('layouts.app')
@section('title', isset($book) ? 'Edit Kategori' : 'Tambah Kategori')

@push('scripts')
    <script src="{{ asset('assets/js/pages/books.form.js') }}"></script>
@endpush

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Kategori /</span> {{ isset($book) ? 'Edit' : 'Tambah' }} Kategori</h4>

    <div class="row">
        <div class="col-12">
            <form action="{{ isset($book) ? route('books.update', $book) : route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($book))
                    @method('PUT')
                @endif
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Form {{ isset($book) ? 'Edit' : 'Tambah' }} Kategori</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label">Judul Buku <span class="text-danger">*</span></label>
                            <div class="col-md-10">
                                <input type="text" id="title" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title') ?? ($book->title ?? '') }}" name="title" placeholder="Nama Kategori" />
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label">Penulis <span class="text-danger">*</span></label>
                            <div class="col-md-10">
                                <input type="text" id="author" class="form-control @error('author') is-invalid @enderror"
                                    value="{{ old('author') ?? ($book->author ?? '') }}" name="author" placeholder="Penulis" />
                                @error('author')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label">Penerbit <span class="text-danger">*</span></label>
                            <div class="col-md-10">
                                <input type="text" id="publisher" class="form-control @error('publisher') is-invalid @enderror"
                                    value="{{ old('publisher') ?? ($book->publisher ?? '') }}" name="publisher" placeholder="Penerbit" />
                                @error('publisher')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label">ISBN <span class="text-danger">*</span></label>
                            <div class="col-md-10">
                                <input type="text" id="isbn" class="form-control @error('isbn') is-invalid @enderror"
                                    value="{{ old('isbn') ?? ($book->isbn ?? '') }}" name="isbn" placeholder="ISBN" />
                                @error('isbn')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label">Deskripsi</label>
                            <div class="col-md-10">
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description') ?? ($book->description ?? '') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label">Bahasa</label>
                            <div class="col-md-10">
                                <input type="text" id="language" class="form-control @error('language') is-invalid @enderror"
                                    value="{{ old('language') ?? ($book->language ?? '') }}" name="language" placeholder="Bahasa" />
                                @error('language')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label">Jumlah Halaman</label>
                            <div class="col-md-10">
                                <input type="number" id="pages" class="form-control @error('pages') is-invalid @enderror"
                                    value="{{ old('pages') ?? ($book->pages ?? '') }}" name="pages" placeholder="Jumlah Halaman" />
                                @error('pages')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label">Tahun Terbit</label>
                            <div class="col-md-10">
                                <input type="number" id="year" class="form-control @error('year') is-invalid @enderror"
                                    value="{{ old('year') ?? ($book->year ?? '') }}" name="year" placeholder="Tahun Terbit" />
                                @error('year')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label">Edisi</label>
                            <div class="col-md-10">
                                <input id="edition" class="form-control @error('edition') is-invalid @enderror"
                                    value="{{ old('edition') ?? ($book->edition ?? '') }}" name="edition" placeholder="Edisi Buku" />
                                @error('edition')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label">Ukuran</label>
                            <div class="col-md-10">
                                <input type="text" id="size" class="form-control @error('size') is-invalid @enderror"
                                    value="{{ old('size') ?? ($book->size ?? '') }}" name="size" placeholder="Ukuran" />
                                @error('size')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label">Berat</label>
                            <div class="col-md-10">
                                <input type="text" id="weight" class="form-control @error('weight') is-invalid @enderror"
                                    value="{{ old('weight') ?? ($book->weight ?? '') }}" name="weight" placeholder="Berat (cth 300gr)" />
                                @error('weight')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label">Stok</label>
                            <div class="col-md-10">
                                <input type="number" id="stock" class="form-control @error('stock') is-invalid @enderror"
                                    value="{{ old('stock') ?? ($book->stock ?? '') }}" name="stock" placeholder="Stok" />
                                @error('stock')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label">Harga</label>
                            <div class="col-md-10">
                                <input type="number" id="price" class="form-control @error('price') is-invalid @enderror"
                                    value="{{ old('price') ?? ($book->price ?? '') }}" name="price" placeholder="Harga" />
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label">Peminjaman?</label>
                            <div class="col-md-10">
                                <div class="form-check">
                                    <input type="radio" id="status-active" class="form-check-input @error('status') is-invalid @enderror"
                                        value="1" name="status"
                                        {{ old('status') === 1 || (isset($book) && $book->status == 1) ? 'checked' : 'checked' }} />
                                    <label for="status-active">Aktif</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="status-nonactive" class="form-check-input @error('status') is-invalid @enderror"
                                        value="0" name="status"
                                        {{ old('status') === 0 || (isset($book) && $book->status == 0) ? 'checked' : '' }} />
                                    <label for="status-nonactive">Nonaktif</label>
                                </div>
                                @error('status')
                                    <div class="text-danger form-text">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label">Cover</label>
                            <div class="col-md-10 pt-2">
                                <label for="book-image-uploader" class="d-block">
                                    <img id="book-image-preview" src="{{ $book->image_url ?? asset('assets/img/placeholder.svg') }}"
                                        class="d-block img-thumbnail rounded-3" style="width: 360px; height: 240px; object-fit: cover;">
                                </label>
                                <input type="file" class="mt-3 btn btn-light-secondary" id="book-image-uploader" accept="image/*" name="image">
                                @error('image')
                                    <div class="text-danger mt-1">
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
