@extends('layouts.app')

@push('scripts')
    <script src="{{ asset('assets/js/utils/ajax-modal.js') }}"></script>
    <script src="{{ asset('assets/js/pages/books.detail.js') }}"></script>
@endpush

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Buku/</span> Detail Buku</h4>

    <div class="d-flex gap-2 mb-3">
        <button class="btn btn-block btn-primary text-uppercase">
            <i class="bx bx-detail me-1"></i>
            <span>Detail Buku</span>
        </button>
        <button class="btn text-uppercase">
            <i class="bx bx-detail me-1"></i>
            <span>Riwayat Pinjaman</span>
        </button>
        <button class="btn text-uppercase">
            <i class="bx bx-detail me-1"></i>
            <span>Riwayat Stok</span>
        </button>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Detail Buku</h5>
                </div>
                <div class="card-body">
                    <dl>
                        <dt>Judul</dt>
                        <dd>{{ $book->title ?? '-' }}</dd>
                    </dl>
                    <dl>
                        <dt>Pengarang/Penulis</dt>
                        <dd>{{ $book->author ?? '-' }}</dd>
                    </dl>
                    <dl>
                        <dt>Penerbit</dt>
                        <dd>{{ $book->publisher ?? '-' }}</dd>
                    </dl>
                    <dl>
                        <dt>ISBN</dt>
                        <dd>{{ $book->isbn ?? '-' }}</dd>
                    </dl>
                    <dl>
                        <dt>Deskripsi</dt>
                        <dd>{{ $book->description ?? '-' }}</dd>
                    </dl>
                    <dl>
                        <dt>Peminjaman?</dt>
                        <dd>
                            @if ($book->status)
                                <div class="badge px-3 py-2 mt-1 bg-success">Aktif</div>
                            @else
                                <div class="badge px-3 py-2 mt-1 bg-danger">Nonaktif</div>
                            @endif
                        </dd>
                    </dl>
                    <dl>
                        <dt>Detail Buku</dt>
                        <dd>
                            <table class="table table-sm table-bordered table-striped mt-2">
                                <tr>
                                    <th width="20%">Bahasa</th>
                                    <td width="30%">{{ $book->language ?? '-' }}</td>
                                    <th width="20%">Ukuran</th>
                                    <td width="30%">{{ $book->size ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th width="20%">Jumlah Halaman</th>
                                    <td width="30%">{{ $book->pages ?? '-' }}</td>
                                    <th width="20%">Berat</th>
                                    <td width="30%">{{ $book->weight ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th width="20%">Tahun Terbit</th>
                                    <td width="30%">{{ $book->year ?? '-' }}</td>
                                    <th width="20%">Harga</th>
                                    <td width="30%">{{ $book->price ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th width="20%">Edisi</th>
                                    <td width="30%">{{ $book->edition ?? '-' }}</td>
                                    <th width="20%">Stok</th>
                                    <td width="30%">{{ $book->stock ?? '-' }}</td>
                                </tr>
                            </table>
                        </dd>
                    </dl>
                </div>
                <div class="card-footer">
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-secondary" onclick="history.back()">
                            <i class="bx bx-fw bx-chevron-left"></i>
                            <span>Kembali</span>
                        </button>
                        <button class="btn btn-primary">
                            <div class="bx bx-fw bx-book-reader"></div>
                            <span>Pinjam Buku</span>
                        </button>
                        <button class="btn btn-info">
                            <div class="bx bx-fw bx-package"></div>
                            <span>Sesuaikan Stok</span>
                        </button>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-success">
                            <div class="bx bx-fw bx-edit"></div>
                            <span>Edit</span>
                        </a>
                        <button type="reset" class="btn btn-danger delete-btn" data-delete-url="{{ route('books.destroy', $book->id) }}"
                            data-origin-url="{{ route('books.index') }}">
                            <i class="bx bx-trash me-1"></i>
                            <span>Hapus</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <img src="{{ $book->image_url ?? asset('img/placeholder.svg') }}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection
