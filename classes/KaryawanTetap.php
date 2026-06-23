<?php
require_once 'Karyawan.php';

class KaryawanTetap extends Karyawan {
    private $tunjanganKesehatan;
    private $opsiSahamId;

    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari, $tunjanganKesehatan, $opsiSahamId) {
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari);
        $this->tunjanganKesehatan = $tunjanganKesehatan;
        $this->opsiSahamId = $opsiSahamId;
    }

    // Mengimplementasikan Overriding
    public function hitungGajiBersih() {
        // Mendapat tambahan tunjangan kesehatan/keluarga
        $gajiPokok = $this->hariKerjaMasuk * $this->gajiDasarPerHari;
        return $gajiPokok + $this->tunjanganKesehatan;
    }

    public function tampilkanProfilKaryawan() {
        $infoSaham = $this->opsiSahamId ? $this->opsiSahamId : "Belum Tersedia";
        $tunjanganFormat = number_format($this->tunjanganKesehatan, 0, ',', '.');
        
        return "Tunjangan Kesehatan: Rp {$tunjanganFormat} | Opsi Saham ID: {$infoSaham}";
    }
}
?>