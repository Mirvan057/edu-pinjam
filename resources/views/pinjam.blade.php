@extends('base')

@section('container')
<h1 style="text-align: center">Daftar Buku</h1><br>

@if (session()->has('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>Jangan lupa dikembalikan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<form action="/dashboard/pinjam" method="get">
  <div class="input-group mb-3">
    <input type="text" class="form-control" name="searching" placeholder="Masukan judul buku yang ingin dicari!" aria-label="Cari" aria-describedby="button-addon2">
    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
  </div>
</form>

@if($bukus->count())
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($bukus as $buku)
    <div class="col">
      <div class="card h-100">
        <img src="{{ asset('storage/' . $buku->gambar) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $buku->nama }}</h5>
            <p>{{ $buku->jumlah }}</p>
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary @if($buku->jumlah == 0) disabled @endif" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $buku->id }}">
  Pinjam Buku
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $buku->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Waktu Peminjaman</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/pinjam/{{ $buku->id }}" method="post">
        @csrf
      <div class="modal-body row" >
        
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Tgl Pinjam</label>
          <input type="date" name="tgl_pinjam" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Tgl Kembali</label>
          <input type="date" name="tgl_kembali" class="form-control" id="inputPassword4">
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Pinjam</button>
      </div>
    </form>
    </div>
  </div>
</div>
            {{-- <form action="/pinjam/{{ $buku->id }}" method="post">
                @csrf
                <button type="submit" class="rounded-0 btn btn-primary @if($buku->jumlah == 0) disabled @endif">
                    Pinjam</button>
            </form> --}}

        </div>
      </div>
    </div>
    @endforeach
  </div>
@endif
@endsection