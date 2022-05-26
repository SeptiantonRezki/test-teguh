<?php require(__DIR__ . '/ambil-tahunanggaran.php'); ?>
<?php require(__DIR__ . '/edit-tahunanggaran.php'); ?>
<?php require(__DIR__ . '/hapus-tahunanggaran.php'); ?>
<?php require(__DIR__ . '/tambah-tahunanggaran.php'); ?>

<?php
$semuaTahunAnggaranArray = ambilSemuaTahunAnggaran();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET["id_tahunanggaran"])) {
        $id_tahunanggaran = $_GET["id_tahunanggaran"];
        if (hapusTahunAnggaran($id_tahunanggaran)) {
            header("location:tahunanggaran.php");
        } else {
            menampilkanPesan("Gagal menghapus data, Ada data yang terkait dengan tahun anggaran ini", "danger");
        }
    };
}

// menambahkan pengeluaran dan mengubah pengeluaran
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    var_dump($_POST);
    if (isset($_POST["id_tahunanggaran"])  && isset($_POST["tahun_anggaran"])  && isset($_POST["saldo_anggaran"]) && isset($_POST["keterangan"]) &&  isset($_POST["tambah_anggaran"])) {
        $id_tahunanggaran = (int)($_POST["id_tahunanggaran"]);
        $tahun_anggaran = (int)($_POST["tahun_anggaran"]);
        $saldo_anggaran = (int)($_POST["saldo_anggaran"]);
        $tambah_anggaran = (int)($_POST["tambah_anggaran"]);
        $keterangan = $_POST["keterangan"];
        if (editTahunAnggaran($tahun_anggaran, $saldo_anggaran, $id_tahunanggaran, $keterangan, $tambah_anggaran)) {
            unset($semuaTahunAnggaranArray);
            $semuaTahunAnggaranArray = ambilSemuaTahunAnggaran();
            menampilkanPesan("Berhasil Mengedit Data");
        } else {
            menampilkanPesan("Gagal Mengedit Data");
        }
    } else if (isset($_POST["tahun_anggaran"])  && isset($_POST["saldo_anggaran"]) && isset($_POST["keterangan"])) {
        $tahun_anggaran = $_POST["tahun_anggaran"];
        $saldo_anggaran = (int)($_POST["saldo_anggaran"]);
        $keterangan = $_POST["keterangan"];
        if (tambahTahunAnggaranTransactionExample($tahun_anggaran, $saldo_anggaran, $keterangan)) {
            unset($semuaTahunAnggaranArray);
            $semuaTahunAnggaranArray = ambilSemuaTahunAnggaran();
            menampilkanPesan("Berhasil Menambah Data");
        } else {
            menampilkanPesan("Gagal Menambah Data");
        }
    }
}
