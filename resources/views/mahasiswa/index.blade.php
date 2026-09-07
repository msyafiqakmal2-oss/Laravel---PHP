@extends('layouts.app')

@section('title', 'Mahasiswa — Laravel')

@section('content')

<div class="container">


    {{-- HERO --}}

    <section class="hero">

        <div class="hero-number">
            {{ $mahasiswa->count() }}
        </div>


        <p class="eyebrow">
            STUDENT MANAGEMENT SYSTEM
        </p>


        <h1 class="hero-title">

            DATA<br>

            MAHASISWA<span>.</span>

        </h1>


        <p class="hero-description">

            Kelola data mahasiswa dengan Laravel.
            Sistem sederhana yang sekarang kita
            upgrade menjadi lebih interaktif dan modern.

        </p>


        <a href="/mahasiswa/create" class="btn-add">

            + Tambah Mahasiswa

        </a>

    </section>



    {{-- DATA SECTION --}}

    <section>

        <div class="section-heading">

            <h2>
                Students<span>.</span>
            </h2>

            <p>
                TOTAL {{ $mahasiswa->count() }}
            </p>

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

                                onsubmit="return confirm(
                                    'Yakin ingin menghapus data {{ $m->nama }}?'
                                );"
                            >

                                @csrf

                                @method('DELETE')


                                <button
                                    type="submit"
                                    class="btn-delete"
                                >

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>


                    @empty

                    <tr>

                        <td
                            colspan="5"
                            class="empty"
                        >

                            Belum ada data mahasiswa.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </section>

</div>

@endsection