<?php
abstract class Karyawan {
    protected $id_karyawan;
    protected $nama_karyawan;
    protected $departemen;
    protected $hariKerjaMasuk;
    protected $gajiDasarPerHari;

    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari) {
        $this->id_karyawan = $id_karyawan;
        $this->nama_karyawan = $nama_karyawan;
        $this->departemen = $departemen;
        $this->hariKerjaMasuk = $hariKerjaMasuk;
        $this->gajiDasarPerHari = $gajiDasarPerHari;
    }

    // --- TAMBAHAN BARU: Method Static untuk menangani Query & Instansiasi Objek ---
    public static function getSemuaKaryawan($conn) {
        $query = "SELECT * FROM tabel_karyawan ORDER BY jenis_karyawan ASC";
        $result = $conn->query($query);

        // Menyiapkan keranjang data
        $data = [
            'kontrak' => [],
            'tetap' => [],
            'magang' => []
        ];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['jenis_karyawan'] == 'Kontrak') {
                    $obj = new KaryawanKontrak($row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'], $row['durasi_kontrak_bulan'], $row['agensi_penyalur']);
                    $data['kontrak'][] = ['data' => $row, 'objek' => $obj];
                    
                } elseif ($row['jenis_karyawan'] == 'Tetap') {
                    $obj = new KaryawanTetap($row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'], $row['tunjangan_kesehatan'], $row['opsi_saham_id']);
                    $data['tetap'][] = ['data' => $row, 'objek' => $obj];
                    
                } elseif ($row['jenis_karyawan'] == 'Magang') {
                    $obj = new KaryawanMagang($row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'], $row['uang_saku_bulanan'], $row['sertifikat_kampus_merdeka']);
                    $data['magang'][] = ['data' => $row, 'objek' => $obj];
                }
            }
        }
        
        // Mengembalikan data yang sudah rapi
        return $data;
    }
    // -----------------------------------------------------------------------------

    abstract public function hitungGajiBersih();
    abstract public function tampilkanProfilKaryawan();
}
?>