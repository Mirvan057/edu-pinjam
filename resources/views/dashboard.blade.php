@extends('base')

@section('container')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h1>Selamat datang di Dashboard</h1>
            </div>
            <div class="col-md-4 text-end">
                <button type="button" class="btn btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#confirmLogoutModal">
                    Logout
                </button>
            </div>
        </div>
        
        <!-- Tambahkan konten dashboard Anda di sini -->
        <div class="mt-4">
            <!-- Contoh: Tabel atau grafik dapat ditambahkan di sini -->
            <!-- <table class="table">
                ...
            </table> -->
        </div>

        <!-- Konfirmasi Logout Modal -->
        <div class="modal fade" id="confirmLogoutModal" tabindex="-1" aria-labelledby="confirmLogoutModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmLogoutModalLabel">Konfirmasi Logout</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin logout?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="/logout" method="post" id="logout">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
