<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f5dc, #e7d8c9);
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 650px;
            margin: 50px auto;
            background: #fffaf0;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #5c4033;
            text-align: center;
            margin-bottom: 30px;
        }
        .profile-photo {
            display: block;
            margin: 0 auto 25px;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #d2b48c;
        }
        table {
            width: 100%;
            font-size: 18px;
            color: #4b3832;
            border-collapse: collapse;
        }
        td {
            padding: 12px 8px;
            vertical-align: top;
            text-align: left;
        }
        td:first-child {
            width: 25%;
            font-weight: bold;
        }
        td:nth-child(2) {
            width: 5%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Profil Mahasiswa</h1>
        <img src="{{ asset('images/achmad.jpg') }}" alt="Foto Profil" class="profile-photo">

        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $nama ?? 'Tidak tersedia' }}</td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>{{ $kelas ?? 'Tidak tersedia' }}</td>
            </tr>
            <tr>
                <td>NPM</td>
                <td>:</td>
                <td>{{ $npm ?? 'Tidak tersedia' }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
