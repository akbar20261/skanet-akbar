<?php
session_start();

if (!isset($_SESSION['status'])) {
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Menu Utama - Sistem Akademik</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;

            /* BACKGROUND SEPERTI GAMBAR */
            background:
                radial-gradient(circle at top right,
                rgba(6, 54, 126, 0.5),
                transparent 35%),
                linear-gradient(135deg, #1b1e22, #0c76f0);

            min-height: 100vh;
            color: #172033;
        }


        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            background: rgba(1, 74, 134, 0.97);
            padding: 14px 0;

            box-shadow:
                0 5px 20px rgba(7, 80, 23, 0.35);

            border-bottom: 1px solid rgba(156, 7, 131, 0.05);
        }

        .navbar-brand {
            color: white !important;
            font-size: 22px;
            font-weight: bold;
        }

        .navbar-brand i {
            color: #f0a500;
            margin-right: 8px;
        }

        .nav-link {
            color: #d8dee8 !important;
            font-weight: 600;
            padding: 9px 14px !important;
            margin: 0 2px;
            border-radius: 7px;
            transition: .25s;
        }

        .nav-link:hover {
            color: white !important;
            background: rgba(255,255,255,.08);
        }

        /* MENU AKTIF */

        .nav-link.active {
            background: #1264d9;
            color: white !important;
            box-shadow: 0 4px 12px rgba(18,100,217,.35);
        }


        /* LOGOUT */

        .btn-logout {
            background: #dc2635;
            color: white;
            border: none;
            border-radius: 7px;
            padding: 9px 16px;
            font-weight: bold;
            margin-left: 8px;
        }

        .btn-logout:hover {
            background: #b91d2a;
            color: white;
        }


        /* USER */

        .user-login {
            color: #dce3ec;
            margin-left: 12px;
            font-size: 14px;
        }

        .user-login i {
            color: #f0a500;
            font-size: 17px;
        }


        /* =========================
           CONTAINER UTAMA
        ========================= */

        .main-container {
            max-width: 1180px;
            margin: 40px auto;
            padding: 0 20px;
        }


        /* =========================
           CARD UTAMA
        ========================= */

        .main-card {
            background: #ffffff;

            border-radius: 22px;

            padding: 38px;

            box-shadow:
                0 20px 50px rgba(0,0,0,.35);

            min-height: 600px;
        }


        /* =========================
           HEADER
        ========================= */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 30px;
        }

        .page-title {
            font-size: 35px;
            font-weight: bold;
            color: #101827;
            margin: 0;
        }

        .page-title i {
            color: #f0a500;
            margin-right: 8px;
        }

        .yellow-line {
            width: 65px;
            height: 4px;
            background: #e9a400;
            border-radius: 5px;
            margin-top: 9px;
        }

        .page-description {
            color: #7d8794;
            margin-top: 12px;
        }


        /* =========================
           WELCOME
        ========================= */

        .welcome {
            position: relative;
            overflow: hidden;

            background:
                linear-gradient(
                    120deg,
                    #101827,
                    #17447b
                );

            border-radius: 17px;

            padding: 32px;

            color: white;

            margin-bottom: 28px;

            box-shadow:
                0 10px 25px rgba(10,30,60,.2);
        }

        .welcome-content {
            position: relative;
            z-index: 2;
        }

        .welcome h2 {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .welcome h4 {
            color: #f0b323;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .welcome p {
            color: #d7e1ef;
            max-width: 700px;
            margin-bottom: 20px;
        }

        .welcome-icon {
            position: absolute;

            right: 60px;
            bottom: -35px;

            font-size: 140px;

            color: rgba(255,255,255,.09);
        }


        /* DEKORASI WELCOME */

        .welcome::before {
            content: "";

            position: absolute;

            width: 220px;
            height: 220px;

            border-radius: 50%;

            background: rgba(255,255,255,.05);

            right: 130px;
            top: -130px;
        }

        .welcome::after {
            content: "";

            position: absolute;

            width: 140px;
            height: 140px;

            border-radius: 50%;

            background: rgba(240,165,0,.10);

            right: -40px;
            bottom: -60px;
        }


        /* BUTTON */

        .btn-kelola {
            background: #f0a500;
            color: #172033;

            border: none;

            border-radius: 8px;

            padding: 10px 20px;

            font-weight: bold;
        }

        .btn-kelola:hover {
            background: #ffb817;
            color: #172033;
        }


        /* =========================
           STATISTIK
        ========================= */

        .stat-card {
            background: #ffffff;

            border: 1px solid #e4e8ed;

            border-radius: 14px;

            padding: 22px 15px;

            text-align: center;

            height: 100%;

            transition: .3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);

            box-shadow:
                0 10px 25px rgba(0,0,0,.09);
        }

        .stat-icon {
            font-size: 31px;
            margin-bottom: 8px;
        }

        .stat-card h5 {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .stat-card p {
            color: #8b949e;
            font-size: 13px;
            margin: 0;
        }


        /* =========================
           MENU UTAMA
        ========================= */

        .menu-title {
            font-size: 24px;
            font-weight: bold;

            margin-top: 35px;
            margin-bottom: 20px;

            color: #182131;
        }

        .menu-title i {
            color: #f0a500;
        }


        /* =========================
           MENU CARD
        ========================= */

        .menu-card {
            background: white;

            border: 1px solid #e3e7eb;

            border-radius: 15px;

            padding: 24px;

            height: 100%;

            position: relative;

            overflow: hidden;

            transition: .3s;
        }

        .menu-card:hover {
            transform: translateY(-5px);

            box-shadow:
                0 12px 30px rgba(0,0,0,.10);
        }

        .menu-card::after {
            content: "";

            position: absolute;

            width: 100px;
            height: 100px;

            border-radius: 50%;

            right: -40px;
            top: -40px;

            background: rgba(18,100,217,.05);
        }


        /* ICON MENU */

        .menu-icon {
            width: 53px;
            height: 53px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 12px;

            font-size: 25px;

            margin-bottom: 15px;
        }

        .icon-siswa {
            background: #e3efff;
            color: #1264d9;
        }

        .icon-guru {
            background: #e4f7ed;
            color: #15945b;
        }

        .icon-mapel {
            background: #fff1d5;
            color: #d4950b;
        }

        .icon-nilai {
            background: #ffe5e7;
            color: #d82d3d;
        }


        .menu-card h5 {
            font-weight: bold;
            color: #182131;
        }

        .menu-card p {
            color: #7c858f;

            font-size: 14px;

            min-height: 43px;
        }


        /* BUTTON MENU */

        .btn-menu {
            border-radius: 7px;

            padding: 7px 16px;

            font-size: 13px;

            font-weight: 600;
        }


        /* =========================
           FOOTER
        ========================= */

        footer {
            text-align: center;

            color: #89919c;

            font-size: 13px;

            padding: 25px 0 0;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media(max-width: 991px) {

            .user-login {
                margin: 10px 0;
            }

            .btn-logout {
                margin-left: 0;
            }

        }


        @media(max-width: 768px) {

            .main-container {
                margin: 20px auto;
            }

            .main-card {
                padding: 22px;
            }

            .page-title {
                font-size: 28px;
            }

            .welcome {
                padding: 25px;
            }

            .welcome h2 {
                font-size: 25px;
            }

            .welcome-icon {
                display: none;
            }

        }

    </style>
</head>


<body>


<!-- =====================================================
     NAVBAR
===================================================== -->

<nav class="navbar navbar-expand-lg">

    <div class="container">


        <!-- LOGO -->

        <a class="navbar-brand" href="index.php">

            <i class="bi bi-mortarboard-fill"></i>

            Sistem Akademik

        </a>


        <!-- MOBILE BUTTON -->

        <button
            class="navbar-toggler bg-light"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#menuNav">

            <span class="navbar-toggler-icon"></span>

        </button>


        <!-- MENU -->

        <div class="collapse navbar-collapse" id="menuNav">


            <ul class="navbar-nav ms-4">


                <!-- DASHBOARD -->

                <li class="nav-item">

                    <a
                        class="nav-link active"
                        href="index.php">

                        <i class="bi bi-house-fill"></i>
                        Dashboard

                    </a>

                </li>


                <!-- SISWA -->

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="siswa">

                        <i class="bi bi-people-fill"></i>
                        Siswa

                    </a>

                </li>


                <!-- GURU -->

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="guru">

                        <i class="bi bi-person-badge-fill"></i>
                        Guru

                    </a>

                </li>


                <!-- MAPEL -->

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="mapel">

                        <i class="bi bi-book-fill"></i>
                        Mapel

                    </a>

                </li>


                <!-- NILAI -->

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="nilai">

                        <i class="bi bi-bar-chart-fill"></i>
                        Nilai

                    </a>

                </li>


            </ul>


            <!-- USER + LOGOUT -->

            <div class="ms-auto d-flex align-items-center">


                <div class="user-login">

                    <i class="bi bi-person-circle"></i>

                    <?= $_SESSION['username']; ?>

                </div>


                <a
                    href="logout.php"
                    class="btn btn-logout"
                    onclick="return confirm('Yakin ingin logout?')">

                    <i class="bi bi-box-arrow-right"></i>

                    Logout

                </a>


            </div>


        </div>

    </div>

</nav>


<!-- =====================================================
     MAIN
===================================================== -->

<div class="main-container">


    <div class="main-card">


        <!-- HEADER -->

        <div class="page-header">

            <div>

                <h1 class="page-title">

                    <i class="bi bi-speedometer2"></i>

                    Menu Utama

                </h1>

                <div class="yellow-line"></div>

                <p class="page-description">

                    Sistem informasi akademik sekolah

                </p>

            </div>

        </div>


        <!-- =================================================
             WELCOME
        ================================================== -->

        <div class="welcome">


            <div class="welcome-content">


                <h2>
                    Selamat Datang 👋
                </h2>


                <h4>
                    Sistem Akademik Sekolah
                </h4>


                <p>

                    Kelola data siswa, guru, mata pelajaran,
                    dan nilai dengan mudah melalui sistem
                    akademik sekolah.

                </p>


                <a
                    href="#menu"
                    class="btn btn-kelola">

                    <i class="bi bi-arrow-right-circle"></i>

                    Mulai Kelola Data

                </a>


            </div>


            <div class="welcome-icon">

                <i class="bi bi-mortarboard-fill"></i>

            </div>


        </div>


        <!-- =================================================
             STATISTIK
        ================================================== -->

        <div class="row g-3">


            <!-- SISWA -->

            <div class="col-6 col-md-3">

                <div class="stat-card">

                    <div class="stat-icon text-primary">

                        <i class="bi bi-people-fill"></i>

                    </div>

                    <h5>Siswa</h5>

                    <p>Data peserta didik</p>

                </div>

            </div>


            <!-- GURU -->

            <div class="col-6 col-md-3">

                <div class="stat-card">

                    <div class="stat-icon text-success">

                        <i class="bi bi-person-badge-fill"></i>

                    </div>

                    <h5>Guru</h5>

                    <p>Tenaga pengajar</p>

                </div>

            </div>


            <!-- MAPEL -->

            <div class="col-6 col-md-3">

                <div class="stat-card">

                    <div class="stat-icon text-warning">

                        <i class="bi bi-book-fill"></i>

                    </div>

                    <h5>Mapel</h5>

                    <p>Mata pelajaran</p>

                </div>

            </div>


            <!-- NILAI -->

            <div class="col-6 col-md-3">

                <div class="stat-card">

                    <div class="stat-icon text-danger">

                        <i class="bi bi-bar-chart-fill"></i>

                    </div>

                    <h5>Nilai</h5>

                    <p>Hasil belajar</p>

                </div>

            </div>


        </div>


        <!-- =================================================
             MENU
        ================================================== -->

        <div id="menu">


            <h3 class="menu-title">

                <i class="bi bi-stars"></i>

                Menu Utama

            </h3>


            <div class="row g-4">


                <!-- SISWA -->

                <div class="col-md-6">

                    <div class="menu-card">


                        <div class="menu-icon icon-siswa">

                            <i class="bi bi-people-fill"></i>

                        </div>


                        <h5>
                            Data Siswa
                        </h5>


                        <p>

                            Tambah, edit, hapus,
                            dan lihat data siswa sekolah.

                        </p>


                        <a
                            href="siswa"
                            class="btn btn-primary btn-menu">

                            <i class="bi bi-arrow-right"></i>

                            Masuk

                        </a>


                    </div>

                </div>


                <!-- GURU -->

                <div class="col-md-6">

                    <div class="menu-card">


                        <div class="menu-icon icon-guru">

                            <i class="bi bi-person-badge-fill"></i>

                        </div>


                        <h5>
                            Data Guru
                        </h5>


                        <p>

                            Mengelola informasi guru
                            dan tenaga pengajar sekolah.

                        </p>


                        <a
                            href="guru"
                            class="btn btn-success btn-menu">

                            <i class="bi bi-arrow-right"></i>

                            Masuk

                        </a>


                    </div>

                </div>


                <!-- MAPEL -->

                <div class="col-md-6">

                    <div class="menu-card">


                        <div class="menu-icon icon-mapel">

                            <i class="bi bi-book-fill"></i>

                        </div>


                        <h5>
                            Mata Pelajaran
                        </h5>


                        <p>

                            Mengelola daftar mata pelajaran
                            yang tersedia di sekolah.

                        </p>


                        <a
                            href="mapel"
                            class="btn btn-warning btn-menu">

                            <i class="bi bi-arrow-right"></i>

                            Masuk

                        </a>


                    </div>

                </div>


                <!-- NILAI -->

                <div class="col-md-6">

                    <div class="menu-card">


                        <div class="menu-icon icon-nilai">

                            <i class="bi bi-bar-chart-fill"></i>

                        </div>


                        <h5>
                            Data Nilai
                        </h5>


                        <p>

                            Mengelola dan melihat
                            hasil nilai belajar siswa.

                        </p>


                        <a
                            href="nilai"
                            class="btn btn-danger btn-menu">

                            <i class="bi bi-arrow-right"></i>

                            Masuk

                        </a>


                    </div>

                </div>


            </div>

        </div>


        <!-- FOOTER -->

        <footer>

            <i class="bi bi-shield-check"></i>

           @ Selamat Datang
        </footer>


    </div>

</div>


<!-- BOOTSTRAP JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>