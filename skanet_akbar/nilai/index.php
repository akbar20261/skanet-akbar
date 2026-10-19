<?php
session_start();

// Cek apakah user sudah login (opsional, sesuaikan jika ada session)
if (!isset($_SESSION['status'])) {
    // header("location:../login.php");
}

// Hubungkan ke database
include "koneksi.php";

$query = mysqli_query($koneksi, "
    SELECT 
        nilai.id_nilai,
        siswa.nama AS namasiswa,
        guru.nama AS namaguru,
        mapel.nama_mapel,
        nilai.nilai
    FROM nilai
    INNER JOIN siswa ON nilai.nis = siswa.nis
    INNER JOIN guru ON nilai.nip = guru.nip
    INNER JOIN mapel ON nilai.id_mapel = mapel.id_mapel
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai - Sistem Akademik</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body { 
            margin: 0; 
            font-family: 'Segoe UI', sans-serif; 
            background: radial-gradient(circle at top right, rgba(25, 65, 100, .5), transparent 35%), linear-gradient(135deg, #1b1e22, #0c76f0); 
            min-height: 100vh; 
            color: #172033; 
            display: flex; 
            flex-direction: column; 
        }
        .content-wrapper { flex: 1; }
        
        /* Navbar Style */
        .navbar {
            background: rgba(1, 74, 134, 0.97);
            padding: 14px 0;

            box-shadow:
                0 5px 20px rgba(7, 80, 23, 0.35);

            border-bottom: 1px solid rgba(156, 7, 131, 0.05);
        }
        .navbar-brand { color: white !important; font-size: 22px; font-weight: bold; }
        .nav-link { color: #d8dee8 !important; font-weight: 600; padding: 9px 14px !important; border-radius: 7px; }
        .nav-link:hover { color: white !important; background: rgba(255,255,255,.08); }
        .nav-link.active { background: #1264d9; color: white !important; }

        /* Card Style */
        .card { 
            border: none; 
            border-radius: 18px; 
            box-shadow: 0 15px 35px rgba(0,0,0,.25); 
            background: #ffffff; 
            animation: fadeIn 0.8s cubic-bezier(0.16, 1, 0.3, 1); 
        }
        @keyframes fadeIn { 
            from { opacity: 0; transform: translateY(-30px) scale(0.95); } 
            to { opacity: 1; transform: translateY(0) scale(1); } 
        }

        /* Table & Hover */
        .table tbody tr:hover { background: #f1f7ff; }
        .table th { background-color: #212529 !important; color: white !important; text-align: center; }
        .table td { vertical-align: middle; }

        .btn { transition: .3s; border-radius: 10px; }
        .btn:hover { transform: translateY(-2px); }
        
        footer { 
            text-align: center; 
            color: #89919c; 
            font-size: 13px; 
            padding: 25px 0; 
            margin-top: auto; 
            border-top: 1px solid rgba(255,255,255,.05); 
        }
    </style>
</head>
<body>

<div class="content-wrapper">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="../index.php"><i class="bi bi-mortarboard-fill text-warning me-1"></i> Sistem Akademik</a>
            
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link" href="../index.php"><i class="bi bi-house-fill me-1"></i> Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="../siswa"><i class="bi bi-people-fill me-1"></i> Siswa</a></li>
                    <li class="nav-item"><a class="nav-link" href="../guru"><i class="bi bi-person-badge-fill me-1"></i> Guru</a></li>
                    <li class="nav-item"><a class="nav-link" href="../mapel"><i class="bi bi-book-fill me-1"></i> Mapel</a></li>
                    <li class="nav-item"><a class="nav-link active" href="../nilai"><i class="bi bi-bar-chart-fill me-1"></i> Nilai</a></li>
                    <li class="nav-item ms-lg-3 d-flex align-items-center mt-2 mt-lg-0">
                        <span class="text-white me-3 fw-semibold"><i class="bi bi-person-circle text-warning me-1"></i> akbar</span>
                        <a class="btn btn-danger btn-sm px-3 py-2 text-white fw-bold" href="../logout.php" onclick="return confirm('Yakin ingin logout?')">
                            <i class="bi bi-box-arrow-right me-1"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-5">
        <div class="card shadow-lg">
            <!-- Header Kartu Berwarna Ungu Sesuai Gambar -->
            <div class="card-header text-white d-flex justify-content-between align-items-center py-3 px-4" style="background: linear-gradient(135deg, #6a11cb, #2575fc) !important; border-top-left-radius: 18px; border-top-right-radius: 18px;">
                <h3 class="mb-0 fw-bold"><i class="bi bi-bar-chart-fill me-2"></i> Data Nilai Siswa</h3>
                <a href="tambah.php" class="btn btn-light fw-bold text-primary shadow-sm">
                    <i class="bi bi-plus-circle-fill me-1"></i> Tambah Data
                </a>
            </div>

            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th width="60">No</th>
                                <th width="100">ID Nilai</th>
                                <th>Nama Siswa</th>
                                <th>Mata Pelajaran</th>
                                <th>Nama Guru</th>
                                <th width="80">Nilai</th>
                                <th width="170">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if ($query && mysqli_num_rows($query) > 0) {
                                while($data = mysqli_fetch_array($query)){
                            ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center fw-semibold"><?= htmlspecialchars($data['id_nilai']); ?></td>
                                <td><?= htmlspecialchars($data['namasiswa']); ?></td>
                                <td><?= htmlspecialchars($data['nama_mapel']); ?></td>
                                <td><?= htmlspecialchars($data['namaguru']); ?></td>
                                <td class="text-center"><span class="badge bg-primary px-3 py-2"><?= htmlspecialchars($data['nilai']); ?></span></td>
                                <td class="text-center">
                                   
                                    <a href="hapus.php?id_nilai=<?= $data['id_nilai']; ?>" class="btn btn-danger btn-sm px-2 py-1" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <i class="bi bi-trash-fill"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php 
                                }
                            } else {
                                echo "<tr><td colspan='7' class='text-center text-muted py-4'>Belum ada data nilai.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    <div class="container"><i class="bi bi-shield-check"></i> Sistem Akademik</div>
</footer>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>