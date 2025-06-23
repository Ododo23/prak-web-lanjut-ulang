<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #f5f5dc, #e8e2d0);
            padding: 40px;
            color: #4e3d2c;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: #fffaf0;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.06);
        }
        h2 {
            text-align: center;
            color: #5c4033;
            margin-bottom: 25px;
        }
        .btn {
            display: inline-block;
            padding: 8px 14px;
            background-color: #a1866f;
            color: white;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            margin-right: 5px;
        }
        .btn:hover {
            background-color: #8c6f58;
        }
        .btn-danger {
            background-color: #b84a4a;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fcf8ef;
            border-radius: 8px;
            overflow: hidden;
            margin-top: 20px;
        }
        th, td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #e0d8c2;
        }
        th {
            background-color: #d8c8b0;
            color: #3d2f24;
        }
        tr:hover {
            background-color: #f0eadb;
        }
        .photo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }
        .alert-success {
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>📋 Daftar Mahasiswa</h2>

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('user.create') }}" class="btn">+ Tambah Mahasiswa</a>

        <table>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>
                            @if ($user->foto)
                                <img src="{{ asset('storage/' . $user->foto) }}" alt="foto" class="photo">
                            @else
                                <span style="color: gray;">(belum ada)</span>
                            @endif
                        </td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->npm }}</td>
                        <td>{{ $user->kelas->nama_kelas }}</td>
                        <td>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn">Edit</a>

                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; color: gray;">Belum ada data mahasiswa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
