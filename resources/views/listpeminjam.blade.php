@extends('base')

@section('container')
    <h1 style="text-align: center">List Peminjaman</h1>
    <br>

    @if (session()->has('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Peminjam</th>
                    <th scope="col">No.Hp Peminjam</th>
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
                        <td>{{ $peminjam->user->nama }}</td>
                        <td>{{ $peminjam->user->noHp }}</td>
                        <td>{{ optional($peminjam->buku)->nama }}</td>
                        <td>{{ $peminjam->tgl_pinjam }}</td>
                        <td>{{ $peminjam->tgl_kembali }}</td>
                        <td>{{ $peminjam->status }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $peminjam->id }}">
                                Edit
                            </button>
                        </td>
                    </tr>
                    <div class="modal fade" id="exampleModal{{ $peminjam->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Status</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="/status_pinjam/{{ $peminjam->id }}" method="post">
                                    @method('put')
                                    @csrf
                                    <div class="modal-body row">
                                        <select class="form-select" name="status" aria-label="Default select example">
                                            <option selected value=" ">Open this select menu</option>
                                            <option value="dipinjam">Dipinjam</option>
                                            <option value="dikembalikan">Dikembalikan</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
