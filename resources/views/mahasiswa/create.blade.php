<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Mahasiswa</title>
</head>

<body>

    <h1>Tambah Mahasiswa</h1>

    <form action="/mahasiswa" method="POST">

        @csrf

        <div>
            <label>Nama</label>
            <br>
            <input type="text" name="nama">
        </div>

        <br>

        <div>
            <label>NIM</label>
            <br>
            <input type="text" name="nim">
        </div>

        <br>

        <div>
            <label>Jurusan</label>
            <br>
            <input type="text" name="jurusan">
        </div>

        <br>

        <button type="submit">
            Simpan Data
        </button>

    </form>

</body>
</html>
