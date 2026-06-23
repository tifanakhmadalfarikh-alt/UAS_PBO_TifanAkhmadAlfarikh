<?php
require_once 'Karyawan.php';

class KaryawanKontrak extends Karyawan {
    private $durasiKontrakBulan;
    private $agensiPenyalur;

    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari, $durasiKontrakBulan, $agensiPenyalur) {
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari);
        $this->durasiKontrakBulan = $durasiKontrakBulan;
        $this->agensiPenyalur = $agensiPenyalur;
    }

    // Mengimplementasikan Overriding
    public function hitungGajiBersih() {
        // Sistem penggajian murni berdasarkan jumlah hari kehadiran
        return $this->hariKerjaMasuk * $this->gajiDasarPerHari;
    }

    public function tampilkanProfilKaryawan() {
        $infoAgensi = $this->agensiPenyalur ? $this->agensiPenyalur : "Tidak Ada/Mandiri";
        return "Durasi Kontrak: {$this->durasiKontrakBulan} Bulan | Agensi: {$infoAgensi}";
    }
}
?>