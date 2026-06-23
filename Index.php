<?php
// Memanggil file koneksi dan seluruh kelas anak
require_once 'koneksi.php';
require_once 'classes/KaryawanKontrak.php';
require_once 'classes/KaryawanTetap.php';
require_once 'classes/KaryawanMagang.php';

// Inisialisasi koneksi database
$db = new Database();
$conn = $db->getConnection();

// Mengambil seluruh data karyawan yang sudah dikelompokkan oleh Class
$semuaKaryawan = Karyawan::getSemuaKaryawan($conn);

// Menyiapkan daftar judul kategori untuk perulangan tabel
$kategoriJudul = [
    'kontrak' => 'Daftar Karyawan Kontrak',
    'tetap'   => 'Daftar Karyawan Tetap',
    'magang'  => 'Daftar Karyawan Magang'
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Slip Gaji Karyawan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; color: #333; }
        h1 { text-align: center; color: #2c3e50; }
        h2 { color: #e67e22; border-bottom: 2px solid #f39c12; padding-bottom: 5px; margin-top: 30px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #bdc3c7; padding: 10px; text-align: left; }
        th { background-color: #ecf0f1; }
        .gaji { font-weight: bold; color: #27ae60; }
    </style>
</head>
<body>

    <h1>Daftar Slip Gaji & Profil Karyawan</h1>

    <?php foreach ($kategoriJudul as $kunci => $judul) : ?>
        
        <h2><?= $judul ?></h2>
        
        <table>
            <tr>
                <th>ID</th>
                <th>Nama Karyawan</th>
                <th>Departemen</th>
                <th>Hari Kerja</th>
                <th>Gaji Dasar/Hari</th>
                <th>Profil Spesifik (Polimorfik)</th>
                <th>Gaji Bersih (Polimorfik)</th>
            </tr>
            
            <?php 
            // Mengecek apakah ada data di dalam kategori tersebut
            if (!empty($semuaKaryawan[$kunci])) : 
                // Looping isi data karyawan untuk kategori yang sedang aktif
                foreach ($semuaKaryawan[$kunci] as $item) : 
            ?>
            <tr>
                <td><?= $item['data']['id_karyawan'] ?></td>
                <td><?= $item['data']['nama_karyawan'] ?></td>
                <td><?= $item['data']['departemen'] ?></td>
                <td><?= $item['data']['hari_kerja_masuk'] ?> Hari</td>
                <td>Rp <?= number_format($item['data']['gaji_dasar_per_hari'], 0, ',', '.') ?></td>
                
                <td><?= $item['objek']->tampilkanProfilKaryawan() ?></td>
                <td class="gaji">Rp <?= number_format($item['objek']->hitungGajiBersih(), 0, ',', '.') ?></td>
            </tr>
            <?php 
                endforeach; 
            else : 
            ?>
            <tr>
                <td colspan="7" style="text-align: center;">Belum ada data karyawan.</td>
            </tr>
            <?php endif; ?>
            
        </table>

    <?php endforeach; ?>
    </body>
</html>