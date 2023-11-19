@extends('base')

@section('container')
    <h1>Edit Buku</h1>

    <form action="/dashboard/buku/{{ $buku->id }}" method="POST" enctype="multipart/form-data" id="updateForm">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" aria-describedby="namaHelp" value="{{ $buku->nama }}">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" id="jumlah" aria-describedby="jHelp" value="{{ $buku->jumlah }}">
            @error('jumlah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="hidden" name="oldImage" value="{{ $buku->gambar }}">
            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" id="gambar" aria-describedby="gHelp">
            @error('gambar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmUpdateModal">
            Ubah Buku
        </button>
    </form>

    <hr>

    <form action="/dashboard/buku/{{ $buku->id }}" method="post" id="deleteForm">
        @method('delete')
        @csrf
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
            Hapus Buku
        </button>
    </form>

    <!-- Back Button -->
    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Kembali</a>

    <!-- Update Modal -->
    <div class="modal fade" id="confirmUpdateModal" tabindex="-1" aria-labelledby="confirmUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmUpdateModalLabel">Konfirmasi Update Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin melakukan pembaruan data buku ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" form="updateForm">Ubah</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus buku ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger" form="deleteForm">Hapus</button>
                </div>
            </div>
        </div>
    </div>
@endsection
