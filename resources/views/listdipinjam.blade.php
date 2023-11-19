@extends('base')

@section('container')
    <h1 style="text-align: center">Pinjaman Saya</h1>
    <br>

    @if (session()->has('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Tgl Pinjam</th>
                    <th scope="col">Tgl Kembali</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $peminjam)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ optional($peminjam->buku)->nama }}</td>
                        <td>{{ $peminjam->tgl_pinjam }}</td>
                        <td>{{ $peminjam->tgl_kembali }}</td>
                        <td>{{ $peminjam->status }}</td>
                        @if($peminjam->status == "dipinjam")
                            <td>
                                <a href="https://wa.link/abk8zs" class="btn btn-success">
                                    Kembalikan
                                </a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
