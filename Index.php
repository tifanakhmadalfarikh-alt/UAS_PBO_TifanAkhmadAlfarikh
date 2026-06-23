<?php
// Memanggil file koneksi dan seluruh kelas anak
require_once 'koneksi.php';
require_once 'classes/KaryawanKontrak.php';
require_once 'classes/KaryawanTetap.php';
require_once 'classes/KaryawanMagang.php';

// Inisialisasi koneksi database
$db = new Database();
$conn = $db->getConnection();

// Mengambil seluruh data dari tabel_karyawan
$query = "SELECT * FROM tabel_karyawan ORDER BY jenis_karyawan ASC";
$result = $conn->query($query);

// Menyiapkan array untuk mengelompokkan data berdasarkan jenis karyawan
$karyawanKontrak = [];
$karyawanTetap = [];
$karyawanMagang = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Implementasi Polimorfisme: Instansiasi objek berdasarkan jenis karyawan
        if ($row['jenis_karyawan'] == 'Kontrak') {
            $obj = new KaryawanKontrak($row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'], $row['durasi_kontrak_bulan'], $row['agensi_penyalur']);
            $karyawanKontrak[] = ['data' => $row, 'objek' => $obj];
            
        } elseif ($row['jenis_karyawan'] == 'Tetap') {
            $obj = new KaryawanTetap($row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'], $row['tunjangan_kesehatan'], $row['opsi_saham_id']);
            $karyawanTetap[] = ['data' => $row, 'objek' => $obj];
            
        } elseif ($row['jenis_karyawan'] == 'Magang') {
            $obj = new KaryawanMagang($row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'], $row['uang_saku_bulanan'], $row['sertifikat_kampus_merdeka']);
            $karyawanMagang[] = ['data' => $row, 'objek' => $obj];
        }
    }
}
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

    <h2>Daftar Karyawan Kontrak</h2>
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
        <?php foreach ($karyawanKontrak as $item): ?>
        <tr>
            <td><?= $item['data']['id_karyawan'] ?></td>
            <td><?= $item['data']['nama_karyawan'] ?></td>
            <td><?= $item['data']['departemen'] ?></td>
            <td><?= $item['data']['hari_kerja_masuk'] ?> Hari</td>
            <td>Rp <?= number_format($item['data']['gaji_dasar_per_hari'], 0, ',', '.') ?></td>
            <td><?= $item['objek']->tampilkanProfilKaryawan() ?></td>
            <td class="gaji">Rp <?= number_format($item['objek']->hitungGajiBersih(), 0, ',', '.') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Daftar Karyawan Tetap</h2>
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
        <?php foreach ($karyawanTetap as $item): ?>
        <tr>
            <td><?= $item['data']['id_karyawan'] ?></td>
            <td><?= $item['data']['nama_karyawan'] ?></td>
            <td><?= $item['data']['departemen'] ?></td>
            <td><?= $item['data']['hari_kerja_masuk'] ?> Hari</td>
            <td>Rp <?= number_format($item['data']['gaji_dasar_per_hari'], 0, ',', '.') ?></td>
            <td><?= $item['objek']->tampilkanProfilKaryawan() ?></td>
            <td class="gaji">Rp <?= number_format($item['objek']->hitungGajiBersih(), 0, ',', '.') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Daftar Karyawan Magang</h2>
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
        <?php foreach ($karyawanMagang as $item): ?>
        <tr>
            <td><?= $item['data']['id_karyawan'] ?></td>
            <td><?= $item['data']['nama_karyawan'] ?></td>
            <td><?= $item['data']['departemen'] ?></td>
            <td><?= $item['data']['hari_kerja_masuk'] ?> Hari</td>
            <td>Rp <?= number_format($item['data']['gaji_dasar_per_hari'], 0, ',', '.') ?></td>
            <td><?= $item['objek']->tampilkanProfilKaryawan() ?></td>
            <td class="gaji">Rp <?= number_format($item['objek']->hitungGajiBersih(), 0, ',', '.') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>