<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPinjam</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            font-size: 12px;
            line-height: 1.5;
            background-image: url(https://cdn.pixabay.com/photo/2015/07/31/11/45/library-869061_1280.jpg);
            background-size: cover;
            color: #020101;
            text-shadow: 0 0 2px rgba(255, 255, 255, 0.5);
            margin: 0; /* Menghapus margin default pada body */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 600px;
            padding: 20px; /* Tambahkan padding agar konten tidak terlalu dekat dengan tepi container */
            background-color: rgba(255, 255, 255, 0.4); /* Warna latar belakang container */
            border-radius: 10px; /* Tambahkan border-radius untuk memberikan sudut melengkung pada container */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Tambahkan bayangan untuk memberikan efek terang-bayang */
        }

        h1 {
            font-size: 45px;
            font-weight: 700;
            text-align: center;
        }

        p {
            font-size: 20px;
            margin-top: 20px;
            text-align: center;
        }

        .button-container {
            text-align: center;
            margin-top: 20px; /* Jarak antara button dan teks di atasnya */
        }

        .button-container a {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #333232;
            color: #fff;
            border-radius: 5px;
            font-size: 18px;
            transition: background-color 0.3s ease; /* Efek transisi pada perubahan warna latar belakang */
        }

        .button-container a:hover {
            background-color: #575c61; /* Warna latar belakang yang berbeda pada hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>EduPinjam</h1>
        </header>
        <main>
            <p><strong>
                Selamat Datang di EduPinjam <br>
                Menyemai Pengetahuan, Mewujudkan Mimpi! <br>

                <br>
                Di sini, kami membuka pintu bagi mereka yang memiliki hasrat belajar namun terkendala secara finansial. <br>
                EduPinjam hadir untuk memberikan kesempatan kepada siswa yang tidak mampu untuk memiliki akses ke buku-buku sekolah yang diperlukan.
            </strong></p>
            <div class="button-container">
                <a href="/login">Login</a>
            </div>  
            <div class="button-container">
                <a href="/regis">Register</a>
            </div>    
        </main>
    </div>
</body>
</html>
