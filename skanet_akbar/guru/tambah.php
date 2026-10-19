<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['status'])) {
    header("location:../login.php");
    exit;
}

// Hubungkan ke database (jika nanti dibutuhkan untuk validasi tambahan)
include "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Guru - Sistem Akademik</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: radial-gradient(circle at top right, rgba(25, 65, 100, .5), transparent 35%), linear-gradient(135deg, #1b1e22, #0c76f0);
            min-height: 100vh;
            color: #172033;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 15px 35px rgba(0,0,0,.25);
            animation: fadeIn 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            background: #ffffff;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .form-control {
            border-radius: 10px;
            padding: 10px 15px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            border-color: #0d6efd;
        }

        .btn {
            transition: .3s;
            border-radius: 10px;
            padding: 9px 20px;
            font-weight: 600;
        }

        .btn:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header text-white py-3 px-4" style="background: linear-gradient(135deg, #121213, #f00d0d) !important; border-top-left-radius: 18px; border-top-right-radius: 18px;">
                    <h3 class="mb-0 fw-bold"><i class="bi bi-person-plus-fill me-2"></i> Tambah Data Guru</h3>
                </div>

                <div class="card-body p-4">
                    <form action="simpan.php" method="POST">

                        <div class="mb-3">
                            <label class="form-label fw-semibold"><i class="bi bi-card-text me-1"></i> NIP</label>
                            <input type="number" name="nip" class="form-control" placeholder="Masukkan NIP guru" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold"><i class="bi bi-person-fill me-1"></i> Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap guru" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold"><i class="bi bi-geo-alt-fill me-1"></i> Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn text-white shadow-sm" style="background-color: #70819c;">
                                <i class="bi bi-floppy-fill me-1"></i> Simpan Data
                            </button>

                            <a href="index.php" class="btn btn-secondary shadow-sm">
                                <i class="bi bi-arrow-left me-1"></i> Kembali
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>