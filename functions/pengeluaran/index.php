<?php require(__DIR__ . '/ambil-pengeluaran.php'); ?>
<?php require(__DIR__ . '/edit-pengeluaran.php'); ?>
<?php require(__DIR__ . '/hapus-pengeluaran.php'); ?>
<?php require(__DIR__ . '/tambah-pengeluaran.php'); ?>

<?php
$semuaPengeluranArray = ambilSemuaPengeluaran();
$semuaPengeluranDenganNamaDepartemenArray = ambilSemuaPengeluaranDenganNamaDepartemen();
$semuaPengeluranHariIniHanyaJumlahArray = ambilSemuaPengeluaranHariIniHanyaJumlah();
$jumlahPengeluaranHariIni = 0;
$jumlahSemuaPengeluaran = 0;
foreach ($semuaPengeluranHariIniHanyaJumlahArray as $pengeluaranHariIni) {
    $jumlahPengeluaranHariIni += $pengeluaranHariIni['jumlah'];
}
foreach ($semuaPengeluranArray as $pengeluaran) {
    $jumlahSemuaPengeluaran += $pengeluaran['jumlah'];
}


// menghapus pengeluaran
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET["id_pengeluaran"])) {
        $idPengeluaran = (int)($_GET["id_pengeluaran"]);
        if (hapusPengeluaran($idPengeluaran)) {
            header("location:pengeluaran.php");
        } else {
            menampilkanPesan("Gagal menghapus data");
        }
    };
}


// menambahkan pengeluaran dan mengubah pengeluaran
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["id_departemen"])  && isset($_POST["jumlah"]) && isset($_POST["keterangan"])  && isset($_POST["id_pengeluaran"])) {
        $idDepartemen = (int)($_POST["id_departemen"]);
        $jumlah = (int)($_POST["jumlah"]);
        $keterangan = $_POST["keterangan"];
        $idPengeluaran = (int)($_POST["id_pengeluaran"]);
        if (editPengeluran($idPengeluaran, $jumlah, $keterangan, $idDepartemen)) {
            unset($semuaPengeluranArray);
            unset($semuaPengeluranDenganNamaDepartemenArray);
            $semuaPengeluranArray = ambilSemuaPengeluaran();
            $semuaPengeluranDenganNamaDepartemenArray = ambilSemuaPengeluaranDenganNamaDepartemen();
            menampilkanPesan("Berhasil Mengedit Data");
        } else {
            menampilkanPesan("Gagal Mengedit Data");
        }
    } else if (isset($_POST["id_departemen"])  && isset($_POST["jumlah"]) && isset($_POST["keterangan"])) {
        $idDepartemen = (int)($_POST["id_departemen"]);
        $jumlah = (int)($_POST["jumlah"]);
        $keterangan = $_POST["keterangan"];
        if (tambahPengeluaran($jumlah, $keterangan, $idDepartemen)) {
            unset($semuaPengeluranArray);
            unset($semuaPengeluranDenganNamaDepartemenArray);
            $semuaPengeluranArray = ambilSemuaPengeluaran();
            $semuaPengeluranDenganNamaDepartemenArray = ambilSemuaPengeluaranDenganNamaDepartemen();
            menampilkanPesan("Berhasil Menambah Data");
        } else {
            menampilkanPesan("Gagal Menambah Data");
        }
    }
}
?>