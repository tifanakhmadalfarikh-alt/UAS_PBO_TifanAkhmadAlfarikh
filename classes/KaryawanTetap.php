<?php
require_once 'Karyawan.php';

class KaryawanTetap extends Karyawan {
    // Properti Spesifik
    private $tunjanganKesehatan;
    private $opsiSahamId;

    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari, $tunjanganKesehatan, $opsiSahamId) {
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari);
        $this->tunjanganKesehatan = $tunjanganKesehatan;
        $this->opsiSahamId = $opsiSahamId;
    }

    public function hitungGajiBersih() {
        return $this->hariKerjaMasuk * $this->gajiDasarPerHari;
    }

    public function tampilkanProfilKaryawan() {
        $infoSaham = $this->opsiSahamId ? $this->opsiSahamId : "Belum Tersedia";
        // Format angka untuk tunjangan agar tampil rapi sebagai mata uang
        $tunjanganFormat = number_format($this->tunjanganKesehatan, 0, ',', '.');
        
        return "Tunjangan Kesehatan: Rp {$tunjanganFormat} | Opsi Saham ID: {$infoSaham}";
    }
}
?>