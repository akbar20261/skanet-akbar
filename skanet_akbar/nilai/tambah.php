<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Nilai - Sistem Akademik</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Tambahan Custom CSS */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.4s ease-out forwards;
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-300 via-gray-400 to-gray-500 flex items-center justify-center px-4 py-10">

    <div class="w-full max-w-lg animate-fade-in">
        <!-- Card Utama -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100">

            <!-- Header Biru Gelap Gradasi -->
            <div class="bg-gradient-to-r from-blue-900 to-indigo-950 px-6 py-4 flex items-center text-white shadow-md">
                <span class="bg-white/20 p-2 rounded-lg me-3 flex items-center justify-center">
                    ➕
                </span>
                <h1 class="text-xl font-bold tracking-wide">Tambah Data Nilai</h1>
            </div>

            <!-- Form Body -->
            <div class="p-6">
                <form action="simpan.php" method="POST">

                    <!-- ID Nilai -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2 flex items-center gap-2">
                            <span>🆔</span> ID Nilai
                        </label>
                        <input 
                            type="number" 
                            name="id_nilai" 
                            placeholder="Masukkan..." 
                            required 
                            class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 text-gray-700 bg-gray-50/50 transition duration-200"
                        >
                    </div>

                    <!-- Nama Siswa -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2 flex items-center gap-2">
                            <span>🎓</span> Nama Siswa
                        </label>
                        <select 
                            name="nis" 
                            required 
                            class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 text-gray-700 bg-gray-50/50 transition duration-200"
                        >
                            <option value="" selected disabled>Masukkan...</option>
                            <?php
                            $query_siswa = mysqli_query($koneksi, "SELECT * FROM siswa");
                            while($data = mysqli_fetch_array($query_siswa)){
                            ?>
                                <option value="<?php echo $data['nis']; ?>"><?php echo $data['nama']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Guru Pengampu -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2 flex items-center gap-2">
                            <span>📖</span> Guru Pengampu
                        </label>
                        <select 
                            name="nip" 
                            required 
                            class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 text-gray-700 bg-gray-50/50 transition duration-200"
                        >
                            <option value="" selected disabled>Masukkan...</option>
                            <?php
                            $query_guru = mysqli_query($koneksi, "SELECT * FROM guru");
                            while($data = mysqli_fetch_array($query_guru)){
                            ?>
                                <option value="<?php echo $data['nip']; ?>"><?php echo $data['nama']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Mata Pelajaran -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2 flex items-center gap-2">
                            <span>📚</span> Mata Pelajaran
                        </label>
                        <select 
                            name="id_mapel" 
                            required 
                            class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 text-gray-700 bg-gray-50/50 transition duration-200"
                        >
                            <option value="" selected disabled>Masukkan...</option>
                            <?php
                            $query_mapel = mysqli_query($koneksi, "SELECT * FROM mapel");
                            while($data = mysqli_fetch_array($query_mapel)){
                            ?>
                                <option value="<?php echo $data['id_mapel']; ?>"><?php echo $data['nama_mapel']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Nilai -->
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2 flex items-center gap-2">
                            <span>💯</span> Nilai
                        </label>
                        <input 
                            type="number" 
                            name="nilai" 
                            placeholder="Masukkan..." 
                            required 
                            class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 text-gray-700 bg-gray-50/50 transition duration-200"
                        >
                    </div>

                    <!-- Tombol Aksi (Kembali & Simpan Data) -->
                    <div class="flex items-center justify-between gap-4 pt-2">
                        <a 
                            href="index.php" 
                            class="px-5 py-2.5 bg-gray-600 hover:bg-gray-700 text-white text-sm font-semibold rounded-lg shadow transition duration-200 flex items-center gap-2"
                        >
                            ← Kembali
                        </a>
                        <button 
                            type="submit" 
                            class="px-5 py-2.5 bg-blue-900 hover:bg-blue-950 text-white text-sm font-semibold rounded-lg shadow transition duration-200 flex items-center gap-2"
                        >
                            📥 Simpan Data
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>

</body>
</html>