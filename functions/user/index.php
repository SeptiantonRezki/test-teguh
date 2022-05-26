<?php require(__DIR__ . '/ambil-user.php'); ?>
<?php require(__DIR__ . '/edit-user.php'); ?>
<?php require(__DIR__ . '/hapus-user.php'); ?>
<?php require(__DIR__ . '/tambah-user.php'); ?>


<?php

$ambilUser = ambilUser($_SESSION['id']);
$semuaUserTanpaPassword = ambilSemuaUserTanpaPassword();
//  mengahpus jemaat
// if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//     if (isset($_GET["id_user"])) {
//         $idUser = (int)($_GET["id_user"]);
//         if (hapusDepartemen($idUser)) {
//             header("location:departemen.php");
//         } else {
//             menampilkanPesan("Gagal menghapus data");
//         }
//     };
// }
// menambahkan jemaat dan mengubah jemaat
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["id_user"]) && isset($_POST["nama"]) && isset($_POST["email"]) && isset($_POST["password_sebelumnya"]) && isset($_POST["password_sekarang"])) {
        $idUser = (int)($_POST["id_user"]);
        $namaUser = $_POST["nama"];
        $emailUser = $_POST["email"];
        $passwordSebelumnya = $_POST["password_sebelumnya"];
        $passwordSekarang = $_POST["password_sekarang"];
        if (editUserWithPassword($idUser, $namaUser, $emailUser, $passwordSebelumnya, $passwordSekarang)) {
            unset($ambilUser);
            $ambilUser = ambilUser($_SESSION['id'])[0];
            $_SESSION['nama'] = $ambilUser['nama'];
            $_SESSION['email'] = $ambilUser['email'];
            menampilkanPesan("Berhasil Mengedit Data");
        } else {
            menampilkanPesan("Gagal Mengedit Data");
        }
    } else if (isset($_POST["id_user"]) && isset($_POST["nama"]) && isset($_POST["email"])) {
        $idUser = (int)($_POST["id_user"]);
        $namaUser = $_POST["nama"];
        $emailUser = $_POST["email"];
        if (editUserTanpaPassword($idUser, $namaUser, $emailUser)) {
            unset($ambilUser);
            $ambilUser = ambilUser($_SESSION['id'])[0];
            $_SESSION['nama'] = $ambilUser['nama'];
            $_SESSION['email'] = $ambilUser['email'];
            menampilkanPesan("Berhasil Mengedit Data");
        } else {
            menampilkanPesan("Gagal Mengedit Data");
        }
    } else {
        menampilkanPesan("Gagal Mengedit Data");
    }
}
