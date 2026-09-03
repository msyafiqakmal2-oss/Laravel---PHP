<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Mahasiswa</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #333;
        }

        .navbar {
            background: #1e293b;
            color: white;
            padding: 20px 40px;
        }

        .navbar h2 {
            margin-bottom: 5px;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .header p {
            color: #64748b;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f1f5f9;
            text-align: left;
            padding: 15px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #e2e8f0;
        }

        tr:hover {
            background: #f8fafc;
        }

        .badge {
            background: #dbeafe;
            color: #1d4ed8;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #64748b;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2>Belajar Laravel</h2>
        <p>Sistem Data Mahasiswa</p>
    </div>

    <div class="container">

        <div class="header">
            <h1>Data Mahasiswa</h1>
            <p>Daftar mahasiswa yang tersimpan di database.</p>
        </div>

        <div class="card">

            @if ($mahasiswa->count() > 0)

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Jurusan</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($mahasiswa as $index => $m)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $m->nama }}</td>
                                <td>{{ $m->nim }}</td>
                                <td>
                                    <span class="badge">
                                        {{ $m->jurusan }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @else

                <div class="empty">
                    Belum ada data mahasiswa.
                </div>

            @endif

        </div>

    </div>

</body>
</html>=