<?php require(__DIR__ . '/ambil-jemaat.php'); ?>
<?php require(__DIR__ . '/edit-jemaat.php'); ?>
<?php require(__DIR__ . '/hapus-jemaat.php'); ?>
<?php require(__DIR__ . '/tambah-jemaat.php'); ?>


<?php
$semuaJemaatArray = ambilSemuaJemaat();
$semuaJemaatIddanNama = ambilJemaatIddanNama();
$jumlahSemuaJemaat = jumlahSemuaJemaat()[0];
//  mengahpus jemaat
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET["id_jemaat"])) {
        $idJemaat = (int)($_GET["id_jemaat"]);
        if (hapusJemaat($idJemaat)) {
            header("location:jemaat.php");
        } else {
            menampilkanPesan("Gagal menghapus data");
        }
    };
}
// menambahkan jemaat dan mengubah jemaat
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["nama"]) && isset($_POST["alamat"]) && isset($_POST["jemaat"]) && isset($_POST["kontak"]) && isset($_POST["id_jemaat"])) {
        $idJemaat = (int)($_POST["id_jemaat"]);
        $namaJemaat = $_POST["nama"];
        $alamatJemaat = $_POST["alamat"];
        $jemaat = $_POST["jemaat"];
        $kontakJemaat = $_POST["kontak"];
        if (editJemaat($idJemaat, $namaJemaat, $alamatJemaat, $jemaat, $kontakJemaat)) {
            unset($semuaJemaatArray);
            $semuaJemaatArray = ambilSemuaJemaat();
            menampilkanPesan("Berhasil Mengedit Data");
        } else {
            menampilkanPesan("Gagal Mengedit Data");
        }
    } else if (isset($_POST["nama"]) && isset($_POST["alamat"]) && isset($_POST["jemaat"]) && isset($_POST["kontak"])) {
        $namaJemaat = $_POST["nama"];
        $alamatJemaat = $_POST["alamat"];
        $jemaat = $_POST["jemaat"];
        $kontakJemaat = $_POST["kontak"];
        if (tambahJemaat($namaJemaat, $alamatJemaat, $jemaat, $kontakJemaat)) {
            unset($semuaJemaatArray);
            $semuaJemaatArray = ambilSemuaJemaat();
            menampilkanPesan("Berhasil Menambah Data");
        } else {
            menampilkanPesan("Gagal Menambah Data");
        }
    }
}
