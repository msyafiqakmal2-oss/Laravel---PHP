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
            background: #f1f5f9;
            color: #1e293b;
        }

        /* NAVBAR */
        .navbar {
            background: #1e293b;
            color: white;
            padding: 20px 50px;
        }

        .navbar h2 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .navbar p {
            color: #cbd5e1;
        }

        /* CONTAINER */
        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* HEADER */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-header h1 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .page-header p {
            color: #64748b;
        }

        /* BUTTON */
        .btn-tambah {
            background: #2563eb;
            color: white;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 8px;
            font-weight: bold;
        }

        .btn-tambah:hover {
            background: #1d4ed8;
        }

        /* CARD */
        .card {
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f8fafc;
            padding: 15px;
            text-align: left;
            color: #475569;
            border-bottom: 2px solid #e2e8f0;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #e2e8f0;
        }

        tr:hover {
            background: #f8fafc;
        }

        /* BADGE JURUSAN */
        .badge {
            display: inline-block;
            background: #dbeafe;
            color: #1d4ed8;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
        }

        /* EMPTY */
        .empty {
            text-align: center;
            padding: 30px;
            color: #64748b;
        }

        /* RESPONSIVE */
        @media (max-width: 700px) {

            .navbar {
                padding: 20px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .card {
                overflow-x: auto;
            }

            table {
                min-width: 600px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <div class="navbar">
        <h2>🎓 Belajar Laravel</h2>
        <p>Sistem Data Mahasiswa</p>
    </div>

    <!-- CONTENT -->
    <div class="container">

        <div class="page-header">

            <div>
                <h1>Data Mahasiswa</h1>
                <p>Daftar mahasiswa yang tersimpan di database.</p>
            </div>

            <a href="/mahasiswa/create" class="btn-tambah">
                + Tambah Mahasiswa
            </a>

        </div>

        <!-- TABLE CARD -->
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

                                <td>
                                    <strong>{{ $m->nama }}</strong>
                                </td>

                                <td>
                                    {{ $m->nim }}
                                </td>

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
</html>