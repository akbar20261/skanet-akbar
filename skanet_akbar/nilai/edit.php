<?php
include "koneksi.php";

// Cek apakah ada parameter id_nilai di URL (Artinya mode Edit)
$is_edit = isset($_GET['id_nilai']);
$data_nilai = [
    'id_nilai' => '',
    'nis' => '',
    'nip' => '',
    'id_mapel' => '',
    'nilai' => ''
];

if ($is_edit) {
    $id_nilai = $_GET['id_nilai'];
    $query = mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_nilai = '$id_nilai'");
    $data_nilai = mysqli_fetch_array($query);

    if (!$data_nilai) {
        echo "<script>alert('Data tidak ditemukan!'); window.location='index.php?page=nilai/index';</script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $is_edit ? 'Edit Data Nilai' : 'Tambah Data Nilai'; ?></title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-950 via-zinc-900 to-stone-900 flex items-center justify-center px-4 py-10 text-gray-100">

<div class="w-full max-w-lg">
    <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100 text-gray-700">
        
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 px-6 py-4 flex items-center text-white shadow-md">
            <span class="bg-white/20 p-2 rounded-lg me-3 flex items-center justify-center">
                <i class="bi <?php echo $is_edit ? 'bi-pencil-square' : 'bi-plus-circle'; ?>"></i>
            </span>
            <h3 class="text-xl font-bold tracking-wide mb-0">
                <?php echo $is_edit ? 'Edit Data Nilai' : 'Tambah Data Nilai'; ?>
            </h3>
        </div>

        <!-- Form Body -->
        <div class="p-6">
            <form action="index.php?page=nilai/<?php echo $is_edit ? 'update' : 'simpan'; ?>" method="POST">
                
                <!-- Jika mode edit, kita simpan id_nilai lama sebagai hidden untuk acuan query WHERE di file update -->
                <?php if ($is_edit): ?>
                    <input type="hidden" name="id_nilai_lama" value="<?php echo $data_nilai['id_nilai']; ?>">
                <?php endif; ?>

                <!-- Input ID Nilai -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">ID Nilai</label>
                    <input 
                        type="text" 
                        name="id_nilai" 
                        class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 bg-gray-50/50 transition duration-200" 
                        value="<?php echo $data_nilai['id_nilai']; ?>" 
                        required 
                        placeholder="Masukkan ID Nilai"
                    >
                </div>
                
                <!-- Nama Siswa -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nama Siswa</label>
                    <select name="nis" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 bg-gray-50/50 transition duration-200" required>
                        <option value="" disabled selected>-- Pilih Siswa --</option>
                        <?php
                        $q_siswa = mysqli_query($koneksi, "SELECT * FROM siswa");
                        while ($d_siswa = mysqli_fetch_array($q_siswa)) {
                            $selected = ($d_siswa['nis'] == $data_nilai['nis']) ? "selected" : "";
                            echo "<option value='".$d_siswa['nis']."' $selected>".$d_siswa['nama']."</option>";
                        } ?>
                    </select>
                </div>
                
                <!-- Guru -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Guru</label>
                    <select name="nip" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 bg-gray-50/50 transition duration-200" required>
                        <option value="" disabled selected>-- Pilih Guru --</option>
                        <?php
                        $q_guru = mysqli_query($koneksi, "SELECT * FROM guru");
                        while ($d_guru = mysqli_fetch_array($q_guru)) {
                            $selected = ($d_guru['nip'] == $data_nilai['nip']) ? "selected" : "";
                            echo "<option value='".$d_guru['nip']."' $selected>".$d_guru['nama']."</option>";
                        } ?>
                    </select>
                </div>

                <!-- Mata Pelajaran -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Mata Pelajaran</label>
                    <select name="id_mapel" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 bg-gray-50/50 transition duration-200" required>
                        <option value="" disabled selected>-- Pilih Mapel --</option>
                        <?php
                        $q_mapel = mysqli_query($koneksi, "SELECT * FROM mapel");
                        while ($d_mapel = mysqli_fetch_array($q_mapel)) {
                            $selected = ($d_mapel['id_mapel'] == $data_nilai['id_mapel']) ? "selected" : "";
                            echo "<option value='".$d_mapel['id_mapel']."' $selected>".$d_mapel['nama_mapel']."</option>";
                        } ?>
                    </select>
                </div>
                
                <!-- Nilai -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nilai</label>
                    <input 
                        type="number" 
                        name="nilai" 
                        class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 bg-gray-50/50 transition duration-200" 
                        value="<?php echo $data_nilai['nilai']; ?>" 
                        required 
                        placeholder="0-100"
                    >
                </div>

                <div class="flex items-center justify-between gap-4 pt-2">
                    <a href="index.php?page=nilai/index" class="px-5 py-2.5 bg-gray-600 hover:bg-gray-700 text-white text-sm font-semibold rounded-lg shadow transition duration-200">Kembali</a>
                    <button type="submit" class="px-5 py-2.5 bg-purple-600 hover:bg-purple-700 text-white text-sm font-semibold rounded-lg shadow transition duration-200">
                        <?php echo $is_edit ? 'Simpan Perubahan' : 'Simpan Data'; ?>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

</body>
</html>