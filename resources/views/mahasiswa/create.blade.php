@extends('layouts.app')

@section('title', 'Tambah Mahasiswa — Laravel')

@section('style')
<style>
    /* =================================
       CREATE PAGE
    ================================= */

    .create-page {
        min-height: calc(100vh - 80px);
        padding: 80px 6vw 100px;
        position: relative;
        overflow: hidden;
    }

    /* background grid */

    .create-page::before {
        content: "";
        position: absolute;
        inset: 0;
        pointer-events: none;
        opacity: 0.45;

        background-image:
            linear-gradient(to right, rgba(17, 24, 39, 0.05) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(17, 24, 39, 0.05) 1px, transparent 1px);

        background-size: 80px 80px;

        mask-image: linear-gradient(
            to bottom,
            black 0%,
            transparent 85%
        );
    }

    .create-inner {
        max-width: 1400px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    /* =================================
       TOP META
    ================================= */

    .create-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 55px;
        font-size: 11px;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #9ca3af;
    }

    .create-meta-left {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .meta-dot {
        width: 7px;
        height: 7px;
        background: #2563eb;
        border-radius: 50%;
    }

    /* =================================
       HEADING
    ================================= */

    .create-heading {
        max-width: 1000px;
        margin-bottom: 80px;
    }

    .create-eyebrow {
        font-size: 12px;
        letter-spacing: 4px;
        text-transform: uppercase;
        color: #2563eb;
        margin-bottom: 20px;
        font-weight: 700;
    }

    .create-title {
        margin: 0;
        font-size: clamp(70px, 11vw, 170px);
        line-height: 0.82;
        letter-spacing: -9px;
        font-weight: 800;
        color: #111827;
    }

    .create-title span {
        color: #2563eb;
    }

    .create-subtitle {
        max-width: 520px;
        margin-top: 35px;
        font-size: 16px;
        line-height: 1.7;
        color: #6b7280;
    }

    /* =================================
       FORM AREA
    ================================= */

    .form-layout {
        display: grid;
        grid-template-columns: 0.35fr 1fr;
        gap: 70px;
        align-items: start;
    }

    .form-side-number {
        font-size: 12px;
        letter-spacing: 3px;
        color: #9ca3af;
        padding-top: 12px;
    }

    .form-side-number strong {
        display: block;
        margin-bottom: 15px;
        font-size: 70px;
        line-height: 1;
        letter-spacing: -5px;
        color: #111827;
    }

    .form-side-number p {
        max-width: 180px;
        line-height: 1.6;
        letter-spacing: 0;
        text-transform: none;
        font-size: 13px;
        color: #9ca3af;
    }

    /* =================================
       FORM CARD
    ================================= */

    .student-form {
        background: rgba(255, 255, 255, 0.9);
        border: 1px solid #e5e7eb;
        padding: clamp(30px, 5vw, 70px);
        position: relative;
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.07);
        backdrop-filter: blur(10px);
    }

    .student-form::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: #111827;
    }

    /* =================================
       FORM GROUP
    ================================= */

    .form-group {
        position: relative;
        margin-bottom: 42px;
    }

    .form-group label {
        display: block;
        margin-bottom: 12px;
        font-size: 11px;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #6b7280;
        font-weight: 700;
    }

    .input-wrap {
        position: relative;
    }

    .input-number {
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        font-size: 12px;
        color: #9ca3af;
        font-weight: 700;
        pointer-events: none;
    }

    .student-input {
        width: 100%;
        border: none;
        border-bottom: 1px solid #d1d5db;
        padding: 14px 0 16px 32px;
        background: transparent;
        outline: none;

        font-family: inherit;
        font-size: clamp(20px, 2vw, 28px);
        color: #111827;

        transition:
            border-color 0.3s ease,
            padding-left 0.3s ease;
    }

    .student-input::placeholder {
        color: #d1d5db;
    }

    .student-input:focus {
        border-color: #2563eb;
        padding-left: 38px;
    }

    .input-line {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 0;
        height: 2px;
        background: #2563eb;
        transition: width 0.4s ease;
    }

    .student-input:focus ~ .input-line {
        width: 100%;
    }

    /* =================================
       ERROR
    ================================= */

    .form-error {
        margin-top: 10px;
        font-size: 12px;
        color: #dc2626;
    }

    /* =================================
       BUTTON AREA
    ================================= */

    .form-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-top: 60px;
        padding-top: 30px;
        border-top: 1px solid #e5e7eb;
    }

    .back-link {
        color: #6b7280;
        text-decoration: none;
        font-size: 12px;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: color 0.3s ease;
    }

    .back-link:hover {
        color: #111827;
    }

    .save-button {
        border: none;
        background: #111827;
        color: white;
        padding: 18px 30px;
        min-width: 180px;

        font-family: inherit;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;

        cursor: pointer;
        position: relative;
        overflow: hidden;

        transition:
            transform 0.3s ease,
            background 0.3s ease;
    }

    .save-button span {
        position: relative;
        z-index: 2;
    }

    .save-button::before {
        content: "";
        position: absolute;
        inset: 0;
        background: #2563eb;
        transform: translateX(-101%);
        transition: transform 0.4s ease;
    }

    .save-button:hover::before {
        transform: translateX(0);
    }

    .save-button:hover {
        transform: translateY(-4px);
    }

    /* =================================
       FOOT NOTE
    ================================= */

    .create-footer {
        display: flex;
        justify-content: space-between;
        margin-top: 50px;
        padding-top: 20px;
        border-top: 1px solid #e5e7eb;

        font-size: 10px;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #9ca3af;
    }

    /* =================================
       MOBILE
    ================================= */

    @media (max-width: 900px) {

        .create-page {
            padding: 60px 25px 80px;
        }

        .create-title {
            letter-spacing: -5px;
        }

        .form-layout {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .form-side-number {
            display: none;
        }

        .student-form {
            padding: 35px 25px;
        }
    }

    @media (max-width: 600px) {

        .create-meta {
            margin-bottom: 40px;
        }

        .create-title {
            font-size: 70px;
            letter-spacing: -5px;
        }

        .create-subtitle {
            font-size: 14px;
        }

        .form-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .save-button {
            width: 100%;
        }

        .back-link {
            text-align: center;
        }

        .create-footer {
            flex-direction: column;
            gap: 10px;
        }
    }
</style>
@endsection


@section('content')

<div class="create-page">

    <div class="create-inner">

        {{-- =================================
             META
        ================================= --}}

        <div class="create-meta reveal">

            <div class="create-meta-left">
                <span class="meta-dot"></span>
                Student Management System
            </div>

            <div>
                01 / 03
            </div>

        </div>


        {{-- =================================
             HEADING
        ================================= --}}

        <div class="create-heading">

            <div class="create-eyebrow reveal">
                New Student
            </div>

            <h1 class="create-title reveal">
                TAMBAH<br>
                DATA<span>.</span>
            </h1>

            <p class="create-subtitle reveal">
                Tambahkan mahasiswa baru ke dalam
                sistem pengelolaan data. Isi informasi
                dengan lengkap sebelum menyimpan.
            </p>

        </div>


        {{-- =================================
             FORM
        ================================= --}}

        <div class="form-layout">

            <div class="form-side-number reveal">

                <strong>01</strong>

                STUDENT<br>
                INFORMATION

                <p>
                    Data yang kamu masukkan
                    akan tersimpan ke database
                    mahasiswa.
                </p>

            </div>


            <form
                action="/mahasiswa"
                method="POST"
                class="student-form reveal"
            >

                @csrf


                {{-- NAMA --}}

                <div class="form-group">

                    <label for="nama">
                        Nama Mahasiswa
                    </label>

                    <div class="input-wrap">

                        <span class="input-number">
                            01
                        </span>

                        <input
                            type="text"
                            id="nama"
                            name="nama"
                            class="student-input"
                            placeholder="Masukkan nama..."
                            value="{{ old('nama') }}"
                            autocomplete="name"
                        >

                        <span class="input-line"></span>

                    </div>

                    @error('nama')
                        <div class="form-error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- NIM --}}

                <div class="form-group">

                    <label for="nim">
                        Nomor Induk Mahasiswa
                    </label>

                    <div class="input-wrap">

                        <span class="input-number">
                            02
                        </span>

                        <input
                            type="text"
                            id="nim"
                            name="nim"
                            class="student-input"
                            placeholder="Masukkan NIM..."
                            value="{{ old('nim') }}"
                            autocomplete="off"
                        >

                        <span class="input-line"></span>

                    </div>

                    @error('nim')
                        <div class="form-error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- JURUSAN --}}

                <div class="form-group">

                    <label for="jurusan">
                        Jurusan
                    </label>

                    <div class="input-wrap">

                        <span class="input-number">
                            03
                        </span>

                        <input
                            type="text"
                            id="jurusan"
                            name="jurusan"
                            class="student-input"
                            placeholder="Masukkan jurusan..."
                            value="{{ old('jurusan') }}"
                            autocomplete="off"
                        >

                        <span class="input-line"></span>

                    </div>

                    @error('jurusan')
                        <div class="form-error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- ACTION --}}

                <div class="form-actions">

                    <a
                        href="/mahasiswa"
                        class="back-link"
                    >
                        ← Kembali ke mahasiswa
                    </a>

                    <button
                        type="submit"
                        class="save-button"
                    >
                        <span>
                            Simpan Data →
                        </span>
                    </button>

                </div>

            </form>

        </div>


        {{-- =================================
             FOOTER
        ================================= --}}

        <div class="create-footer">

            <span>
                Laravel Student System
            </span>

            <span>
                Create / Student
            </span>

        </div>

    </div>

</div>

@endsection


@section('script')

<script>
    document.addEventListener("DOMContentLoaded", function () {

        if (typeof gsap === "undefined") {
            return;
        }

        /*
        =================================
        PAGE REVEAL
        =================================
        */

        gsap.from(".reveal", {
            y: 50,
            opacity: 0,
            duration: 1,
            stagger: 0.12,
            ease: "power4.out"
        });


        /*
        =================================
        INPUT FOCUS
        =================================
        */

        const inputs = document.querySelectorAll(".student-input");

        inputs.forEach((input) => {

            input.addEventListener("focus", () => {

                gsap.to(input, {
                    duration: 0.3,
                    ease: "power2.out"
                });

            });

        });


        /*
        =================================
        BUTTON MAGNETIC EFFECT
        =================================
        */

        const button = document.querySelector(".save-button");

        if (button) {

            const moveX = gsap.quickTo(button, "x", {
                duration: 0.4,
                ease: "power3.out"
            });

            const moveY = gsap.quickTo(button, "y", {
                duration: 0.4,
                ease: "power3.out"
            });

            button.addEventListener("mousemove", (e) => {

                const rect = button.getBoundingClientRect();

                const x =
                    e.clientX -
                    (rect.left + rect.width / 2);

                const y =
                    e.clientY -
                    (rect.top + rect.height / 2);

                moveX(x * 0.18);
                moveY(y * 0.18);

            });

            button.addEventListener("mouseleave", () => {

                moveX(0);
                moveY(0);

            });

        }

    });
</script>

@endsection