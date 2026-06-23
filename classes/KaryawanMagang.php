<?php
require_once 'Karyawan.php';

class KaryawanMagang extends Karyawan {
    // Properti Spesifik
    private $uangSakuBulanan;
    private $sertifikatKampusMerdeka;

    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari, $uangSakuBulanan, $sertifikatKampusMerdeka) {
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari);
        $this->uangSakuBulanan = $uangSakuBulanan;
        $this->sertifikatKampusMerdeka = $sertifikatKampusMerdeka;
    }

    public function hitungGajiBersih() {
        return $this->hariKerjaMasuk * $this->gajiDasarPerHari;
    }

    public function tampilkanProfilKaryawan() {
        // Mengubah nilai boolean dari database menjadi teks yang mudah dibaca
        $statusSertifikat = $this->sertifikatKampusMerdeka ? "Ya" : "Tidak";
        $uangSakuFormat = number_format($this->uangSakuBulanan, 0, ',', '.');
        
        return "Uang Saku: Rp {$uangSakuFormat} | Program Kampus Merdeka: {$statusSertifikat}";
    }
}
?>