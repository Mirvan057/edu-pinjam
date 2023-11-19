@extends('base')

@section('container')
    <h1>Tambah Buku</h1><br>
    <form action="/dashboard/buku" method="POST" enctype="multipart/form-data" id="addBookForm">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" aria-describedby="namaHelp">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" id="jumlah" aria-describedby="jHelp">
                @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" id="gambar" aria-describedby="gHelp">
            @error('gambar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmAddModal">
            Tambah
        </button>

        <!-- Tombol Back -->
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
    </form>

    <!-- Konfirmasi Tambah Modal -->
    <div class="modal fade" id="confirmAddModal" tabindex="-1" aria-labelledby="confirmAddModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmAddModalLabel">Konfirmasi Tambah Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menambahkan buku ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" form="addBookForm">Tambah</button>
                </div>
            </div>
        </div>
    </div>
@endsection
