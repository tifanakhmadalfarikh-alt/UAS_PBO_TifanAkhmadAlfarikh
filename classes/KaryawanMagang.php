<?php
require_once 'Karyawan.php';

class KaryawanMagang extends Karyawan {
    private $uangSakuBulanan;
    private $sertifikatKampusMerdeka;

    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari, $uangSakuBulanan, $sertifikatKampusMerdeka) {
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari);
        $this->uangSakuBulanan = $uangSakuBulanan;
        $this->sertifikatKampusMerdeka = $sertifikatKampusMerdeka;
    }

    // Mengimplementasikan Overriding
    public function hitungGajiBersih() {
        // Menerima potongan upah 20% (tersisa 80% dari plafon harian)
        $totalSementara = $this->hariKerjaMasuk * $this->gajiDasarPerHari;
        return $totalSementara * 0.80;
    }

    public function tampilkanProfilKaryawan() {
        $statusSertifikat = $this->sertifikatKampusMerdeka ? "Ya" : "Tidak";
        $uangSakuFormat = number_format($this->uangSakuBulanan, 0, ',', '.');
        
        return "Uang Saku: Rp {$uangSakuFormat} | Program Kampus Merdeka: {$statusSertifikat}";
    }
}
?>