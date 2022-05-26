<?php require(__DIR__ . '/ambil-departemen.php'); ?>
<?php require(__DIR__ . '/edit-departemen.php'); ?>
<?php require(__DIR__ . '/hapus-departemen.php'); ?>
<?php require(__DIR__ . '/tambah-departemen.php'); ?>

<?php
$semuaDepartemenArray = ambilSemuaDepartemen();
// menghapus departemen
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET["id_departemen"])) {
        $idDepartemen = (int)($_GET["id_departemen"]);
        if (hapusDepartemen($idDepartemen)) {
            header("location:departemen.php");
        } else {
            menampilkanPesan("Gagal menghapus departemen");
        }
    };
}


// menambahkan departemen dan mengubah departemen
if (isset($_POST["nama_departemen"]) && isset($_POST["keterangan"]) && isset($_POST["id_departemen"])) {
    $idDepartemen = (int)($_POST["id_departemen"]);
    $namaDepartemen = $_POST["nama_departemen"];
    $keterangan = $_POST["keterangan"];
    if (editDepartemen($idDepartemen, $namaDepartemen, $keterangan)) {
        unset($semuaDepartemenArray);
        $semuaDepartemenArray = ambilSemuaDepartemen();
        menampilkanPesan("Berhasil Mengedit Data");
    } else {
        menampilkanPesan("Gagal Mengedit Data");
    }
} else if (isset($_POST["nama_departemen"]) && isset($_POST["keterangan"])) {
    $namaDepartemen = $_POST["nama_departemen"];
    $keterangan = $_POST["keterangan"];
    if (tambahDepartemen($namaDepartemen, $keterangan)) {
        unset($semuaDepartemenArray);
        $semuaDepartemenArray = ambilSemuaDepartemen();
        menampilkanPesan("Berhasil Menambah Data");
    } else {
        menampilkanPesan("Gagal Menambah Data");
    }
}
?>