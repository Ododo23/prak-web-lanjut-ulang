<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #f5f5dc, #e8e2d0);
            padding: 40px;
            color: #4e3d2c;
        }
        .container {
            max-width: 520px;
            margin: 40px auto;
            background: #fffaf0;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 0 14px rgba(0, 0, 0, 0.08);
        }
        h2 {
            text-align: center;
            color: #5c4033;
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        input[type="text"],
        select,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #cbbf9b;
            border-radius: 6px;
            background-color: #fcf8ef;
            font-size: 14px;
        }
        .btn {
            display: inline-block;
            width: auto;
            padding: 10px 16px;
            font-size: 14px;
            border: none;
            border-radius: 6px;
            margin-top: 20px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }
        .btn-submit {
            background-color: #a1866f;
            color: white;
        }
        .btn-submit:hover {
            background-color: #8c6f58;
        }
        .btn-back {
            background-color: #ccc;
            color: #333;
        }
        .btn-back:hover {
            background-color: #bbb;
        }
        .btn-group {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 25px;
        }
        img.preview {
            width: 80px;
            margin-top: 10px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>✏️ Edit Mahasiswa</h2>
    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" value="{{ old('nama', $user->nama) }}" required>

        <label for="npm">NPM</label>
        <input type="text" id="npm" name="npm" value="{{ old('npm', $user->npm) }}" required>

        <label for="kelas_id">Kelas</label>
        <select name="kelas_id" id="kelas_id" required>
            <option value="">-- Pilih Kelas --</option>
            @foreach ($kelas as $k)
                <option value="{{ $k->id }}" {{ $user->kelas_id == $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kelas }}
                </option>
            @endforeach
        </select>

        <label for="foto">Foto (biarkan kosong jika tidak diganti)</label>
        <input type="file" id="foto" name="foto" accept="image/*">

        @if ($user->foto)
            <p>Foto saat ini:</p>
            <img src="{{ asset('storage/' . $user->foto) }}" class="preview" alt="Foto">
        @endif

        <div class="btn-group">
            <button type="submit" class="btn btn-submit">💾 Simpan Perubahan</button>
            <a href="{{ url('/user') }}" class="btn btn-back">← Daftar Mahasiswa</a>
        </div>
    </form>
</div>
</body>
</html>
