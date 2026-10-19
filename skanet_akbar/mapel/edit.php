<?php
include "../koneksi.php";

$id_mapel = $_GET['id_mapel'];

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM mapel WHERE id_mapel='$id_mapel'"
);

$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='index.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mapel - Sistem Akademik</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap Icons untuk ikon yang konsisten -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<!-- Background gelap elegan dengan gradasi biru-abu -->
<body class="min-h-screen bg-gradient-to-br from-black to-sky-800 flex items-center justify-center px-6 py-10">

    <div class="w-full max-w-lg">
        
        <!-- Card container dengan sudut melengkung dan shadow tebal -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">

            <!-- Header Card dengan Gradasi Biru Cerah -->
            <div class="bg-gradient-to-r from-cyan-500 to-blue-600 px-8 py-6 text-white">
                <h1 class="text-2xl font-bold flex items-center gap-3">
                    <i class="bi bi-pencil-square text-3xl"></i> Edit Data Mapel
                </h1>
            </div>

            <!-- Bagian Form -->
            <div class="p-8">
                <form action="update.php" method="POST">
                    
                    <!-- Input Hidden untuk Menyimpan ID Lama (sebagai acuan di update.php) -->
                    <input type="hidden" name="id_mapel_lama" value="<?= htmlspecialchars($data['id_mapel']); ?>">

                    <!-- ID Mapel (Bisa Diedit) -->
                    <div class="mb-5">
                        <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                            <i class="bi bi-card-text text-gray-500"></i> ID Mapel
                        </label>
                        <input 
                            type="text" 
                            name="id_mapel_baru" 
                            value="<?= htmlspecialchars($data['id_mapel']); ?>"
                            required
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition duration-300 bg-gray-50/50 text-gray-800"
                        >
                    </div>

                    <!-- Nama Mapel -->
                    <div class="mb-5">
                        <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                            <i class="bi bi-book text-gray-500"></i> Nama Mapel
                        </label>
                        <input 
                            type="text" 
                            name="nama_mapel" 
                            value="<?= htmlspecialchars($data['nama_mapel']); ?>"
                            required
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition duration-300 bg-gray-50/50 text-gray-800"
                        >
                    </div>

                    <!-- Guru Pengampu -->
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                            <i class="bi bi-person text-gray-500"></i> Guru Pengampu
                        </label>
                        <input 
                            type="text" 
                            name="guru" 
                            value="<?= htmlspecialchars($data['guru']); ?>"
                            required
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition duration-300 bg-gray-50/50 text-gray-800"
                        >
                    </div>

                    <!-- Tombol Aksi (Simpan & Kembali sejajar) -->
                    <div class="flex items-center justify-between pt-2">
                        <button 
                            type="submit" 
                            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-lg shadow-blue-500/30 transition duration-300 flex items-center gap-2"
                        >
                            <i class="bi bi-floppy"></i> Simpan Data
                        </button>

                        <a 
                            href="index.php" 
                            class="px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-xl shadow-lg transition duration-300 flex items-center gap-2"
                        >
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </div>

</body>
</html>