<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduPinjam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-image: url(https://cdn.pixabay.com/photo/2015/07/31/11/45/library-869061_1280.jpg); /* Ganti 'url_gambar_anda.jpg' dengan path atau URL gambar yang Anda inginkan */
            /* background-size: cover;  */
        }

        nav.navbar {
            background-color: #343a40 !important; /* Ganti dengan warna navbar yang Anda inginkan */
        }

        .navbar-brand, .navbar-nav a {
            color: #ffffff !important; /* Ganti dengan warna teks navbar yang Anda inginkan */
            transition: color 0.3s ease; /* Efek transisi untuk perubahan warna teks */
        }

        .navbar-nav a:hover {
            color: #5f4b4b !important; /* Ganti dengan warna teks navbar pada hover yang Anda inginkan */
        }

        .navbar-toggler-icon {
            background-color: #ffffff; /* Ganti dengan warna ikon toggle yang Anda inginkan */
        }

        .navbar-toggler {
            border-color: #ffffff; /* Ganti dengan warna border toggle yang Anda inginkan */
        }

        .navbar-toggler:hover {
            background-color: #ffffff; /* Ganti dengan warna background toggle pada hover yang Anda inginkan */
        }

        .active {
            color: #007bff !important; /* Ganti dengan warna teks link aktif yang Anda inginkan */
        }

        .container {
            background-color: #ffffff; /* Ganti dengan warna latar belakang konten utama yang Anda inginkan */
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Tambahkan gaya khusus untuk konten dashboard di sini */

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">EduPinjam</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">Home</a>
              </li>
              @if(auth()->user()->role == 'admin')
              <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/buku*') ? 'active' : '' }}" aria-current="page" href="/dashboard/buku">Buku</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/bukupinjam*') ? 'active' : '' }}" aria-current="page" href="/dashboard/bukupinjam">Peminjaman</a>
              </li>
              @endif
              @if(auth()->user()->role == 'peminjam')
              <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/pinjam*') ? 'active' : '' }}" aria-current="page" href="/dashboard/pinjam">Buku</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/pinjaman_saya*') ? 'active' : '' }}" aria-current="page" href="/dashboard/pinjaman_saya">Pinjaman Saya</a>
              </li>
              @endif
            </ul>
          </div>
        </div>
      </nav>
    <div class="container">
        @yield('container')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
