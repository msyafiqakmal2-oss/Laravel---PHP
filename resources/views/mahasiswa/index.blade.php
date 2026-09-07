@extends('layouts.app')

@section('title', 'Mahasiswa — Laravel')

@section('content')

<div class="container fade-up">

    <div class="hero">

        <div>
            <p class="eyebrow">STUDENT MANAGEMENT SYSTEM</p>

            <h1>
                Data Mahasiswa
                <span>.</span>
            </h1>

            <p class="description">
                Kelola data mahasiswa dengan sistem Laravel
                yang sederhana, modern, dan efisien.
            </p>
        </div>

        <a href="/mahasiswa/create" class="btn-add">
            + Tambah Mahasiswa
        </a>

    </div>


    <div class="table-wrapper">

        <table>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($mahasiswa as $m)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td class="nama">
                        {{ $m->nama }}
                    </td>

                    <td>
                        {{ $m->nim }}
                    </td>

                    <td>
                        <span class="badge">
                            {{ $m->jurusan }}
                        </span>
                    </td>

                    <td>

                        <a
                            href="/mahasiswa/{{ $m->id }}/edit"
                            class="btn-edit"
                        >
                            Edit
                        </a>

                        <form
                            action="/mahasiswa/{{ $m->id }}"
                            method="POST"
                            style="display:inline;"
                            onsubmit="return confirm('Yakin ingin menghapus data {{ $m->nama }}?');"
                        >

                            @csrf
                            @method('DELETE')

                            <button class="btn-delete">
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="5" class="empty">
                        Belum ada data mahasiswa.
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection


@section('style')

<style>

    .hero {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 30px;
        margin-bottom: 50px;
    }

    .eyebrow {
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 3px;
        color: #6b7280;
        margin-bottom: 15px;
    }

    h1 {
        font-size: clamp(45px, 7vw, 85px);
        line-height: 0.95;
        letter-spacing: -5px;
        font-weight: 800;
    }

    h1 span {
        color: #2563eb;
    }

    .description {
        max-width: 500px;
        margin-top: 25px;
        color: #6b7280;
        font-size: 16px;
        line-height: 1.7;
    }

    /* BUTTON */

    .btn-add {
        background: #111827;
        color: white;

        padding: 15px 22px;

        border-radius: 50px;

        font-size: 14px;
        font-weight: 700;

        transition: 0.3s ease;
        white-space: nowrap;
    }

    .btn-add:hover {
        background: #2563eb;
        transform: translateY(-4px);
    }

    /* TABLE */

    .table-wrapper {
        background: white;
        border-radius: 20px;
        overflow: hidden;

        box-shadow:
            0 10px 40px rgba(0, 0, 0, 0.06);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        text-align: left;

        background: #111827;
        color: white;

        padding: 20px;

        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    td {
        padding: 20px;

        border-bottom: 1px solid #eeeeee;

        font-size: 14px;
    }

    tbody tr {
        transition: 0.3s ease;
    }

    tbody tr:hover {
        background: #f8fafc;
        transform: scale(1.005);
    }

    .nama {
        font-weight: 700;
    }

    .badge {
        display: inline-block;

        background: #eff6ff;
        color: #2563eb;

        padding: 7px 12px;

        border-radius: 50px;

        font-size: 12px;
        font-weight: 700;
    }

    /* ACTION */

    .btn-edit {
        color: #2563eb;
        font-weight: 700;
        margin-right: 10px;
    }

    .btn-edit:hover {
        text-decoration: underline;
    }

    .btn-delete {
        border: none;

        background: #fee2e2;
        color: #dc2626;

        padding: 8px 13px;

        border-radius: 8px;

        font-size: 12px;
        font-weight: 700;

        cursor: pointer;

        transition: 0.3s ease;
    }

    .btn-delete:hover {
        background: #dc2626;
        color: white;
    }

    .empty {
        text-align: center;
        padding: 50px;
        color: #9ca3af;
    }


    /* MOBILE */

    @media (max-width: 768px) {

        .hero {
            flex-direction: column;
            align-items: flex-start;
        }

        h1 {
            letter-spacing: -3px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            min-width: 700px;
        }
    }

</style>

@endsection