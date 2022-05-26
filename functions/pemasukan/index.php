<?php require(__DIR__ . '/ambil-pemasukan.php'); ?>
<?php require(__DIR__ . '/edit-pemasukan.php'); ?>
<?php require(__DIR__ . '/hapus-pemasukan.php'); ?>
<?php require(__DIR__ . '/tambah-pemasukan.php'); ?>

<?php
$semuaPemasukanArray = ambilSemuaPemasukan();
$semuaPemasukanDenganNamaJemaat = ambilPemasukanDenganNamaJemaat();

$semuaPemasukanHariIni = ambilPemasukanHariIni();
$jumlahPemasukanHariIni = 0;
$jumlahSemuaPemasukan = 0;
foreach ($semuaPemasukanHariIni as $pemasukanHariIni) {
    $jumlahPemasukanHariIni += $pemasukanHariIni['jumlah'];
}

foreach ($semuaPemasukanArray as $pemasukan) {
    $jumlahSemuaPemasukan += $pemasukan['jumlah'];
}



// menghapus pemasukan
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET["id_pemasukan"])) {
        $idPemasukan = (int)($_GET["id_pemasukan"]);
        if (hapusPemasukan($idPemasukan)) {
            header("location:pemasukan.php");
        } else {
            menampilkanPesan("Gagal menghapus data");
        }
    };
}


// menambahkan pemasukan dan mengubah pemasukan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["id_jemaat"])  && isset($_POST["perpuluhan"]) && isset($_POST["syukur"]) && isset($_POST["persembahan"]) && isset($_POST["keterangan"]) && isset($_POST["jenis"]) && isset($_POST["id_pemasukan"])) {
        $idPemasukan = (int)($_POST["id_pemasukan"]);
        $idJemaat = (int)($_POST["id_jemaat"]);
        $perpuluhan = (int)($_POST["perpuluhan"]);
        $syukur = (int)($_POST["syukur"]);
        $persembahan = (int)($_POST["persembahan"]);
        $jumlah = $perpuluhan + $syukur + $persembahan;
        $keterangan = $_POST["keterangan"];
        $jenis = $_POST["jenis"];
        if (editPemasukan($idPemasukan, $idJemaat, $perpuluhan, $syukur, $persembahan, $jumlah, $keterangan, $jenis)) {
            unset($semuaPemasukanDenganNamaJemaat);
            $semuaPemasukanDenganNamaJemaat = ambilPemasukanDenganNamaJemaat();
            menampilkanPesan("Berhasil Mengedit Data");
        } else {
            menampilkanPesan("Gagal Mengedit Data");
        }
    } else if (isset($_POST["id_jemaat"])  && isset($_POST["perpuluhan"]) && isset($_POST["syukur"]) && isset($_POST["persembahan"]) && isset($_POST["keterangan"]) && isset($_POST["jenis"])) {
        $idJemaat = (int)($_POST["id_jemaat"]);
        $perpuluhan = (int)($_POST["perpuluhan"]);
        $syukur = (int)($_POST["syukur"]);
        $persembahan = (int)($_POST["persembahan"]);
        $jumlah = $perpuluhan + $syukur + $persembahan;
        $keterangan = $_POST["keterangan"];
        $jenis = $_POST["jenis"];
        if (tambahPemasukan($idJemaat, $perpuluhan, $syukur, $persembahan, $jumlah, $keterangan, $jenis)) {
            unset($semuaPemasukanDenganNamaJemaat);
            $semuaPemasukanDenganNamaJemaat = ambilPemasukanDenganNamaJemaat();
            menampilkanPesan("Berhasil Menambah Data");
        } else {
            menampilkanPesan("Gagal Menambah Data");
        }
    }
}
?>