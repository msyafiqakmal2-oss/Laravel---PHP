<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>

    <h1>Data Mahasiswa</h1>

    @foreach ($mahasiswa as $m)
        <p>Nama: {{ $m->nama }}</p>
        <p>NIM: {{ $m->nim }}</p>
        <p>Jurusan: {{ $m->jurusan }}</p>
        <hr>
    @endforeach

</body>
</html>