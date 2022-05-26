<?php require(__DIR__ . '/ambil-cashadvance.php'); ?>
<?php require(__DIR__ . '/edit-cashadvance.php'); ?>
<?php require(__DIR__ . '/hapus-cashadvance.php'); ?>
<?php require(__DIR__ . '/tambah-cashadvance.php'); ?>

<?php
$semuaCashAdvanceArray = ambilSemuaCashAdvance();
$semuaCashAdvanceDenganTahunDanNamaAnggaranArray = ambilSemuaCashAdvcanceDenganTahundanNamaAnggaran();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET["id_cashadvance"])) {
        $idCashAdvance = (int)($_GET["id_cashadvance"]);
        if (hapusCashAdvance($idCashAdvance)) {
            header("location:cashadvance.php");
        } else {
            menampilkanPesan("Gagal menghapus data");
        }
    };
}
// menambahkan jemaat dan mengubah jemaat
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST["id_tahunanggaran"]) && isset($_POST["id_anggaran"]) && isset($_POST["keterangan"]) && isset($_POST["penanggung_jawab"])  && isset($_POST["status_persetujuan"]) && isset($_POST["jumlah"]) && isset($_POST["status_pengambilan"]) && isset($_POST["id_cashadvance"])) {
        $idCashAdvance = (int)($_POST["id_cashadvance"]);
        $idTahunAnggaran = (int)($_POST["id_tahunanggaran"]);
        $idAnggaran = (int)($_POST["id_anggaran"]);
        $keterangan = $_POST["keterangan"];
        $penanggungJawab = $_POST["penanggung_jawab"];
        $statusPersetujuan = $_POST["status_persetujuan"];
        $jumlah = (int)($_POST["jumlah"]);
        $statusPengambilan = $_POST["status_pengambilan"];
        
        if (editCashAdvance($idCashAdvance, $idTahunAnggaran, $idAnggaran, $keterangan, $penanggungJawab, $statusPersetujuan, $jumlah, $statusPengambilan)) {
            unset($semuaCashAdvanceArray);
            unset($semuaCashAdvanceDenganTahunDanNamaAnggaranArray);
            $semuaCashAdvanceArray = ambilSemuaCashAdvance();
            $semuaCashAdvanceDenganTahunDanNamaAnggaranArray = ambilSemuaCashAdvcanceDenganTahundanNamaAnggaran();
            menampilkanPesan("Berhasil Mengedit Data");
        } else {
            menampilkanPesan("Gagal Mengedit Data");
        }
    } else if (isset($_POST["id_tahunanggaran"]) && isset($_POST["id_anggaran"]) && isset($_POST["keterangan"]) && isset($_POST["penanggung_jawab"])  && isset($_POST["status_persetujuan"]) && isset($_POST["jumlah"]) && isset($_POST["status_pengambilan"])) {
        $idTahunAnggaran = (int)($_POST["id_tahunanggaran"]);
        $idAnggaran = (int)($_POST["id_anggaran"]);
        $keterangan = $_POST["keterangan"];
        $penanggungJawab = $_POST["penanggung_jawab"];
        $statusPersetujuan = $_POST["status_persetujuan"];
        $jumlah = (int)($_POST["jumlah"]);
        $statusPengambilan = $_POST["status_pengambilan"];
        if (tambahCashAdvance($idTahunAnggaran, $idAnggaran, $keterangan, $penanggungJawab, $statusPersetujuan, $jumlah, $statusPengambilan)) {
            unset($semuaCashAdvanceArray);
            unset($semuaCashAdvanceDenganTahunDanNamaAnggaranArray);
            $semuaCashAdvanceArray = ambilSemuaCashAdvance();
            $semuaCashAdvanceDenganTahunDanNamaAnggaranArray = ambilSemuaCashAdvcanceDenganTahundanNamaAnggaran();
            menampilkanPesan("Berhasil Menambah Data");
        } else {
            menampilkanPesan("Gagal Menambah Data");
        }

        // $idTahunAnggaran = (int)($_POST["id_tahunanggaran"]);
        // $idAnggaran = (int)($_POST["id_anggaran"]);
        // $idDepartemen = (int)($_POST["id_departemen"]);
        // $keterangan = $_POST["keterangan"];
        // $penanggungJawab = $_POST["penanggung_jawab"];
        // $statusPersetujuan = $_POST["status_persetujuan"];
        // $jumlah = (int)($_POST["jumlah"]);
        // $statusPengambilan = $_POST["status_pengambilan"];
        // if (tambahCashAdvance($idTahunAnggaran, $idAnggaran, $idDepartemen, $keterangan, $penanggungJawab, $statusPersetujuan, $jumlah, $statusPengambilan)) {
        //     unset($semuaCashAdvanceArray);
        //     unset($semuaCashAdvanceDenganTahunDanNamaAnggaranArray);
        //     $semuaCashAdvanceArray = ambilSemuaCashAdvance();
        //     $semuaCashAdvanceDenganTahunDanNamaAnggaranArray = ambilSemuaCashAdvcanceDenganTahundanNamaAnggaran();
        //     menampilkanPesan("Berhasil Menambah Data");
        // } else {
        //     menampilkanPesan("Gagal Menambah Data");
        // }
    }
}
