<?php
require(__DIR__ . '/../../config/koneksi.php');


function hapusUser($id)
{
    global $koneksi;
    $sql = "delete from user where id_user='$id'";
    $user = [];

    $result = $koneksi->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($allUser, $row);
    }
    return $user;
}
