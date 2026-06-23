<?php
require_once 'Karyawan.php';

class KaryawanKontrak extends Karyawan {
    // Properti Spesifik
    private $durasiKontrakBulan;
    private $agensiPenyalur;

    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari, $durasiKontrakBulan, $agensiPenyalur) {
        // Memanggil constructor dari kelas induk
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari);
        $this->durasiKontrakBulan = $durasiKontrakBulan;
        $this->agensiPenyalur = $agensiPenyalur;
    }

    public function hitungGajiBersih() {
        // Gaji dasar sementara (akan di-override di Tahap 5 jika ada instruksi khusus)
        return $this->hariKerjaMasuk * $this->gajiDasarPerHari;
    }

    public function tampilkanProfilKaryawan() {
        $infoAgensi = $this->agensiPenyalur ? $this->agensiPenyalur : "Tidak Ada/Mandiri";
        return "Durasi Kontrak: {$this->durasiKontrakBulan} Bulan | Agensi: {$infoAgensi}";
    }
}
?>