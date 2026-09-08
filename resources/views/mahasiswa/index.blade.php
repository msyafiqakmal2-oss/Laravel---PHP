@extends('layouts.app')

@section('title', 'Mahasiswa — Laravel')


@section('content')

<div class="container">

    {{-- ==========================================
         HERO
    =========================================== --}}

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

        <a href="/mahasiswa/create" class="btn-add magnetic-btn">
            <span>+ Tambah Mahasiswa</span>
        </a>

    </section>


    {{-- ==========================================
         DATA MAHASISWA
    =========================================== --}}

    <section>

        <div class="section-heading">

            <h2>
                Students<span>.</span>
            </h2>

            <p>
                TOTAL
                <span
                    class="student-counter"
                    data-count="{{ $mahasiswa->count() }}"
                >
                    0
                </span>
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

                        <tr class="student-row">

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


{{-- ==========================================
     PAGE STYLE
========================================== --}}

@section('style')

<style>

    .magnetic-btn {
        position: relative;
        overflow: hidden;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        will-change: transform;
    }

    .magnetic-btn span {
        position: relative;
        z-index: 2;
        pointer-events: none;
    }

</style>

@endsection


{{-- ==========================================
     PAGE JAVASCRIPT
========================================== --}}

@section('script')

<script>

    document.addEventListener("DOMContentLoaded", function () {


        // ==========================================
        // STUDENT COUNTER
        // ==========================================

        const counterElement =
            document.querySelector(".student-counter");


        if (counterElement && typeof gsap !== "undefined") {

            const target =
                Number(counterElement.dataset.count);

            const counter = {
                value: 0
            };


            gsap.to(counter, {

                value: target,

                duration: 1.8,

                ease: "power2.out",

                scrollTrigger: {

                    trigger: counterElement,

                    start: "top 85%",

                    once: true

                },

                onUpdate: function () {

                    counterElement.textContent =
                        Math.floor(counter.value);

                },

                onComplete: function () {

                    counterElement.textContent =
                        target;

                }

            });

        }


        // ==========================================
        // STUDENT ROW REVEAL
        // ==========================================

        if (typeof gsap !== "undefined") {

            gsap.utils
                .toArray(".student-row")
                .forEach((row, index) => {

                    gsap.from(row, {

                        y: 50,

                        opacity: 0,

                        duration: 0.8,

                        delay: index * 0.08,

                        ease: "power3.out",

                        scrollTrigger: {

                            trigger: row,

                            start: "top 90%",

                            once: true

                        }

                    });

                });

        }


        // ==========================================
        // MAGNETIC BUTTON
        // ==========================================

        if (typeof gsap !== "undefined") {

            const magneticButtons =
                document.querySelectorAll(".magnetic-btn");


            magneticButtons.forEach((button) => {

                const moveX =
                    gsap.quickTo(
                        button,
                        "x",
                        {
                            duration: 0.4,
                            ease: "power3.out"
                        }
                    );


                const moveY =
                    gsap.quickTo(
                        button,
                        "y",
                        {
                            duration: 0.4,
                            ease: "power3.out"
                        }
                    );


                button.addEventListener("mousemove", (e) => {

                    const rect =
                        button.getBoundingClientRect();


                    const x =
                        e.clientX -
                        (rect.left + rect.width / 2);


                    const y =
                        e.clientY -
                        (rect.top + rect.height / 2);


                    moveX(x * 0.25);

                    moveY(y * 0.25);

                });


                button.addEventListener("mouseleave", () => {

                    moveX(0);

                    moveY(0);

                });

            });

        }

    });

</script>

@endsection