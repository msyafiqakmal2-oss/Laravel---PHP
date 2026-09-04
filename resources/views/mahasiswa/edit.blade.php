<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
</head>
<body>

<h1>Edit Mahasiswa</h1>

<form action="/mahasiswa/{{ $mahasiswa->id }}" method="POST">

    @csrf
    @method('PUT')

    <p>Nama</p>
    <input type="text" name="nama" value="{{ $mahasiswa->nama }}">

    <p>NIM</p>
    <input type="text" name="nim" value="{{ $mahasiswa->nim }}">

    <p>Jurusan</p>
    <input type="text" name="jurusan" value="{{ $mahasiswa->jurusan }}">

    <br><br>

    <button>Simpan Perubahan</button>

</form>

</body>
</html>