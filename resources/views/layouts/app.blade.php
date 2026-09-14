<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Laravel Student System')</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* =================================
   CUSTOM CURSOR
================================= */

        .cursor-dot {
    position: fixed;

    width: 7px;
    height: 7px;

    background: #2563eb;

    border-radius: 50%;

    pointer-events: none;

    z-index: 10001;

    transform: translate(-50%, -50%);

    left: 0;
    top: 0;
}

        .cursor-ring {
    position: fixed;

    width: 35px;
    height: 35px;

    border: 1px solid #111827;

    border-radius: 50%;

    pointer-events: none;

    z-index: 10000;

    transform: translate(-50%, -50%);

    left: 0;
    top: 0;

    transition:
        width 0.3s ease,
        height 0.3s ease,
        background 0.3s ease,
        border 0.3s ease;
}

/* ketika hover elemen interaktif */

.cursor-ring.active {
    width: 65px;
    height: 65px;

    background: rgba(37, 99, 235, 0.08);

    border-color: #2563eb;
}


/* =================================
   MOBILE
================================= */

@media (hover: none) {

    .cursor-dot,
    .cursor-ring {
        display: none;
    }

}
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f5f5;
            color: #111827;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
        }


        /* =================================
           PRELOADER
        ================================= */

        .preloader {
            position: fixed;
            inset: 0;

            background: #0b1220;
            color: white;

            z-index: 9999;

            display: flex;
            flex-direction: column;

            justify-content: center;
            align-items: center;
        }

        .loader-number {
            font-size: clamp(80px, 15vw, 180px);

            font-weight: 800;

            letter-spacing: -10px;

            line-height: 0.8;
        }

        .loader-text {
            margin-top: 30px;

            font-size: 11px;

            letter-spacing: 5px;

            color: #9ca3af;
        }

        .loader-line {
            position: absolute;

            bottom: 50px;
            left: 50px;
            right: 50px;

            height: 1px;

            background: #374151;
        }

        .loader-progress {
            position: absolute;

            bottom: 50px;
            left: 50px;

            height: 1px;

            width: 0%;

            background: white;
        }


        /* =================================
           NAVBAR
        ================================= */

        .navbar {
            height: 80px;

            display: flex;

            align-items: center;
            justify-content: space-between;

            padding: 0 50px;

            background: #0b1220;

            color: white;

            position: relative;

            z-index: 10;
        }

        .logo {
            font-size: 22px;

            font-weight: 800;

            letter-spacing: -1px;
        }

        .logo span {
            color: #60a5fa;
        }

        .nav-links {
            display: flex;

            gap: 30px;

            align-items: center;
        }

        .nav-links a {
            font-size: 14px;

            color: #9ca3af;

            transition: 0.3s ease;
        }

        .nav-links a:hover {
            color: white;
        }


        /* =================================
           CONTAINER
        ================================= */

        .container {
            max-width: 1200px;

            margin: auto;

            padding: 90px 30px;
        }


        /* =================================
           HERO
        ================================= */

        .hero {
            min-height: 65vh;

            display: flex;

            flex-direction: column;

            justify-content: center;

            position: relative;

            overflow: hidden;
        }

        .eyebrow {
            font-size: 11px;

            font-weight: 700;

            letter-spacing: 4px;

            color: #6b7280;

            margin-bottom: 25px;
        }

        .hero-title {
            font-size: clamp(55px, 10vw, 130px);

            line-height: 0.85;

            letter-spacing: -8px;

            font-weight: 800;

            max-width: 1000px;
        }

        .hero-title span {
            color: #2563eb;
        }

        .hero-description {
            max-width: 500px;

            margin-top: 35px;

            color: #6b7280;

            font-size: 16px;

            line-height: 1.7;
        }


        /* =================================
           HERO NUMBER
        ================================= */

        .hero-number {
            position: absolute;

            right: 0;

            bottom: 20px;

            font-size: clamp(100px, 20vw, 260px);

            font-weight: 800;

            line-height: 0.7;

            color: rgba(17, 24, 39, 0.04);

            pointer-events: none;

            user-select: none;
        }


        /* =================================
           BUTTON
        ================================= */

        .btn-add {
            display: inline-flex;

            width: fit-content;

            margin-top: 40px;

            background: #111827;

            color: white;

            padding: 16px 24px;

            border-radius: 50px;

            font-size: 13px;

            font-weight: 700;

            transition: transform 0.3s ease,
                        background 0.3s ease;
        }

        .btn-add:hover {
            background: #2563eb;

            transform: translateY(-5px);
        }


        /* =================================
           SECTION TITLE
        ================================= */

        .section-heading {
            margin-bottom: 35px;

            display: flex;

            align-items: flex-end;

            justify-content: space-between;
        }

        .section-heading h2 {
            font-size: clamp(40px, 7vw, 80px);

            line-height: 0.9;

            letter-spacing: -5px;
        }

        .section-heading p {
            color: #9ca3af;

            font-size: 12px;

            letter-spacing: 2px;
        }


        /* =================================
           TABLE
        ================================= */

        .table-wrapper {
            background: white;

            border-radius: 20px;

            overflow: hidden;

            box-shadow:
                0 20px 60px rgba(0, 0, 0, 0.06);
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

            font-size: 11px;

            text-transform: uppercase;

            letter-spacing: 2px;
        }

        td {
            padding: 20px;

            border-bottom: 1px solid #eeeeee;

            font-size: 14px;
        }

        tbody tr {
            transition: 0.4s ease;
        }

        tbody tr:hover {
            background: #f8fafc;

            transform: scale(1.005);
        }

        .nama {
            font-weight: 700;
        }


        /* =================================
           BADGE
        ================================= */

        .badge {
            display: inline-block;

            background: #eff6ff;

            color: #2563eb;

            padding: 7px 12px;

            border-radius: 50px;

            font-size: 12px;

            font-weight: 700;
        }


        /* =================================
           ACTION
        ================================= */

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


        /* =================================
           EMPTY
        ================================= */

        .empty {
            text-align: center;

            padding: 50px;

            color: #9ca3af;
        }


        /* =================================
           MOBILE
        ================================= */

        @media (max-width: 768px) {

            .navbar {
                padding: 0 20px;
            }

            .nav-links {
                gap: 15px;
            }

            .nav-links a {
                font-size: 12px;
            }

            .container {
                padding: 50px 20px;
            }

            .hero-title {
                letter-spacing: -5px;
            }

            .hero-number {
                right: -30px;
            }

            .table-wrapper {
                overflow-x: auto;
            }

            table {
                min-width: 700px;
            }
        }

    </style>

    @yield('style')
</head>

<body>
        {{-- CUSTOM CURSOR --}}
        <div class="cursor-dot"></div>
        <div class="cursor-ring"></div>

    {{-- =================================
         PRELOADER
    ================================= --}}

    <div class="preloader">

        <div class="loader-number">
            <span id="loaderCounter">0</span>%
        </div>

        <div class="loader-text">
            LOADING STUDENT SYSTEM
        </div>

        <div class="loader-line"></div>

        <div class="loader-progress" id="loaderProgress"></div>

    </div>


    {{-- =================================
         NAVBAR
    ================================= --}}

    <nav class="navbar">

        <a href="/mahasiswa" class="logo">
            LARAVEL<span>.</span>
        </a>

        <div class="nav-links">

            <a href="/mahasiswa">
                Mahasiswa
            </a>

            <a href="/mahasiswa/create">
                Tambah Data
            </a>

        </div>

    </nav>


    {{-- =================================
         CONTENT
    ================================= --}}

    <main>
        @yield('content')
    </main>


    {{-- GSAP --}}

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
    <script>
    
        gsap.registerPlugin(ScrollTrigger);
        window.addEventListener("load", function () {

            const counter = {
                value: 0
            };

            const tl = gsap.timeline();


            /*
            =================================
            PRELOADER COUNTER
            =================================
            */

            tl.to(counter, {

                value: 100,

                duration: 2.2,

                ease: "power2.inOut",

                onUpdate: function () {

                    document.getElementById("loaderCounter")
                        .textContent =
                        Math.floor(counter.value);

                    document.getElementById("loaderProgress")
                        .style.width =
                        counter.value + "%";
                }

            });


            /*
            =================================
            PRELOADER EXIT
            =================================
            */

            tl.to(".preloader", {

                yPercent: -100,

                duration: 1.2,

                ease: "power4.inOut"

            });


            /*
            =================================
            HERO ANIMATION
            =================================
            */

            tl.from(".navbar", {

                y: -40,

                opacity: 0,

                duration: 0.8,

                ease: "power3.out"

            }, "-=0.6");


            tl.from(".eyebrow", {

                y: 30,

                opacity: 0,

                duration: 0.7,

                ease: "power3.out"

            }, "-=0.4");


            tl.from(".hero-title", {

                y: 100,

                opacity: 0,

                duration: 1.1,

                ease: "power4.out"

            }, "-=0.5");


            tl.from(".hero-description", {

                y: 40,

                opacity: 0,

                duration: 0.8,

                ease: "power3.out"

            }, "-=0.7");


            tl.from(".btn-add", {

                y: 30,

                opacity: 0,

                duration: 0.7,

                ease: "power3.out"

            }, "-=0.5");


            tl.from(".hero-number", {

                scale: 1.3,

                opacity: 0,

                duration: 1.5,

                ease: "power3.out"

            }, "-=1");


        });

    </script>
    <script>

/* =================================
   CUSTOM CURSOR
================================= */

const cursorDot = document.querySelector(".cursor-dot");
const cursorRing = document.querySelector(".cursor-ring");

if (cursorDot && cursorRing) {

    const dotX = gsap.quickTo(
        cursorDot,
        "x",
        {
            duration: 0.15,
            ease: "power3"
        }
    );

    const dotY = gsap.quickTo(
        cursorDot,
        "y",
        {
            duration: 0.15,
            ease: "power3"
        }
    );


    const ringX = gsap.quickTo(
        cursorRing,
        "x",
        {
            duration: 0.45,
            ease: "power3"
        }
    );

    const ringY = gsap.quickTo(
        cursorRing,
        "y",
        {
            duration: 0.45,
            ease: "power3"
        }
    );


    window.addEventListener("mousemove", (e) => {

        dotX(e.clientX);
        dotY(e.clientY);

        ringX(e.clientX);
        ringY(e.clientY);

    });


    /*
    =================================
    HOVER INTERACTION
    =================================
    */

    const interactiveElements = document.querySelectorAll(
        "a, button, .badge"
    );


    interactiveElements.forEach((element) => {

        element.addEventListener("mouseenter", () => {

            cursorRing.classList.add("active");

        });


        element.addEventListener("mouseleave", () => {

            cursorRing.classList.remove("active");

        });

    });

}
</script>

@yield('script')

</body>
</html>