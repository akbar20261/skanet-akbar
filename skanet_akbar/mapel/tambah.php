<?php
session_start();
if (!isset($_SESSION['status'])) {
    header("location:../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mapel - Sistem Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { 
            background: radial-gradient(circle at top right, rgba(25, 65, 100, .5), transparent 35%), linear-gradient(135deg, #1b1e22, #0c76f0); 
            min-height: 100vh; 
            display: flex; 
            align-items: center; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card { 
            border-radius: 18px; 
            border: none; 
            box-shadow: 0 15px 35px rgba(0,0,0,.25); 
            overflow: hidden;
            background: #ffffff;
        }
        .form-control:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 0 0.25rem rgba(106, 17, 203, 0.25);
        }
        .btn-primary-custom {
            background-color: #6a11cb;
            border-color: #6a11cb;
            color: #ffffff;
            font-weight: 600;
        }
        .btn-primary-custom:hover {
            background-color: #550db3;
            border-color: #550db3;
            color: #ffffff;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <!-- Header Card dengan Gradien -->
                <div class="card-header text-white py-3 px-4" style="background: linear-gradient(135deg, #6a11cb, #2575fc) !important;">
                    <h3 class="mb-0 fw-bold"><i class="bi bi-plus-circle-fill me-2"></i>Tambah Data Mapel</h3>
                </div>

                <div class="card-body p-4">
                    <!-- ACTION MENGARAH KE simpan.php -->
                    <form action="simpan.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary"><i class="bi bi-card-heading me-1"></i> ID Mapel</label>
                            <input type="text" name="id_mapel" class="form-control" placeholder="Masukkan..." required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary"><i class="bi bi-book-fill me-1"></i> Nama Mapel</label>
                            <input type="text" name="nama_mapel" class="form-control" placeholder="Masukkan..." required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary"><i class="bi bi-person-badge-fill me-1"></i> Guru Pengampu</label>
                            <input type="text" name="guru" class="form-control" placeholder="Masukkan..." required>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4 pt-2">
                            <a href="index.php" class="btn btn-secondary px-4 py-2" style="border-radius: 10px;">
                                <i class="bi bi-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary-custom px-4 py-2 shadow-sm" style="border-radius: 10px;">
                                <i class="bi bi-save-fill me-1"></i> Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>