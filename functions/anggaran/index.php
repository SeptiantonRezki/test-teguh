<?php require(__DIR__ . '/ambil-anggaran.php'); ?>
<?php require(__DIR__ . '/edit-anggaran.php'); ?>
<?php require(__DIR__ . '/hapus-anggaran.php'); ?>
<?php require(__DIR__ . '/tambah-anggaran.php'); ?>

<?php
$semuaAnggaranArray = ambilSemuaAnggaran();
$semuaAnggaranDenganNamaDepartemenDanTahunAnggaranArray = ambilSemuaAnggaranDenganNamaDepartemenDanTahunAnggaran();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET["id_anggaran"])) {
        $id_anggaran = $_GET["id_anggaran"];
        if (hapusAnggaran($id_anggaran)) {
            header("location:anggaran.php");
        } else {
            menampilkanPesan("Gagal menghapus data");
        }
    };
}
// ["namaanggaran"]=> string(1) "-" ["tanggal_mulai"]=> string(10) "2022-05-04" ["tanggal_selesai"]=> string(10) "2022-05-21" ["tempatanggaran"]=> string(1) "-" ["penanggungjawab"]=> string(1) "-" ["jumlah"]=> string(7) "1000000" ["sisa"]=> string(7) "1000000" ["status_persetujuan"]=> string(8) "diterima" ["id_anggaran"]=> string(1) "8"
if (isset($_POST["id_anggaran"])  && isset($_POST["id_departemen"])  &&  isset($_POST["id_tahunanggaran"])  &&  isset($_POST["tanggal_mulai"])  && isset($_POST["tanggal_selesai"])  && isset($_POST["namaanggaran"])  && isset($_POST["tempatanggaran"])  && isset($_POST["penanggungjawab"])  && isset($_POST["jumlah"])    && isset($_POST["status_persetujuan"]) && isset($_POST["sisa"])) {

    $idAnggaran = (int)($_POST["id_anggaran"]);
    $idDepartemen = (int)($_POST["id_departemen"]);
    $idTahunAnggaran = (int)($_POST["id_tahunanggaran"]);
    $tanggalMulai = $_POST["tanggal_mulai"];
    $tanggalSelesai = $_POST["tanggal_selesai"];
    $namaAnggaran = $_POST["namaanggaran"];
    $tempatAnggaran = $_POST["tempatanggaran"];
    $penanggungJawab = $_POST["penanggungjawab"];
    $jumlah = (int)($_POST["jumlah"]);
    $sisa = (int)($_POST["sisa"]);
    $statusPersetujuan = $_POST["status_persetujuan"];
    
    if (editAnggaran($idAnggaran, $idDepartemen, $idTahunAnggaran, $tanggalMulai, $tanggalSelesai, $namaAnggaran, $tempatAnggaran, $penanggungJawab, $jumlah, $sisa, $statusPersetujuan)) {
        unset($semuaAnggaranArray);
        unset($semuaAnggaranDenganNamaDepartemenDanTahunAnggaranArray);
        $semuaAnggaranArray = ambilSemuaAnggaran();
        $semuaAnggaranDenganNamaDepartemenDanTahunAnggaranArray = ambilSemuaAnggaranDenganNamaDepartemenDanTahunAnggaran();
        menampilkanPesan("Berhasil Mengedit Data");
    } else {
        menampilkanPesan("Gagal Mengedit Data");
    }
} else if (isset($_POST["id_departemen"])  && isset($_POST["id_tahunanggaran"])  && isset($_POST["tanggal_mulai"])  && isset($_POST["tanggal_selesai"])  && isset($_POST["namaanggaran"])  && isset($_POST["tempatanggaran"])  && isset($_POST["penanggungjawab"])  && isset($_POST["jumlah"])    && isset($_POST["status_persetujuan"])) {
    $idDepartemen = (int)($_POST["id_departemen"]);
    $idTahunAnggaran = (int)($_POST["id_tahunanggaran"]);
    $tanggalMulai = $_POST["tanggal_mulai"];
    $tanggalSelesai = $_POST["tanggal_selesai"];
    $namaAnggaran = $_POST["namaanggaran"];
    $tempatAnggaran = $_POST["tempatanggaran"];
    $penanggungJawab = $_POST["penanggungjawab"];
    $jumlah = (int)($_POST["jumlah"]);
    $statusPersetujuan = $_POST["status_persetujuan"];
    if (tambahAnggaran($idDepartemen, $idTahunAnggaran, $tanggalMulai, $tanggalSelesai, $namaAnggaran, $tempatAnggaran, $penanggungJawab, $jumlah, $statusPersetujuan)) {
        unset($semuaAnggaranArray);
        unset($semuaAnggaranDenganNamaDepartemenDanTahunAnggaranArray);
        $semuaAnggaranArray = ambilSemuaAnggaran();
        $semuaAnggaranDenganNamaDepartemenDanTahunAnggaranArray = ambilSemuaAnggaranDenganNamaDepartemenDanTahunAnggaran();
        menampilkanPesan("Berhasil Menambah Data");
    } else {
        menampilkanPesan("Gagal Menambah Data");
    }
}
