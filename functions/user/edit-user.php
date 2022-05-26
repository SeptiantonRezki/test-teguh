<?php
require(__DIR__ . '/../../config/koneksi.php');

function editUserWithPassword($id, $nama, $email, $passwordSebelumnya, $passwordSekarang)
{
    global $koneksi;
    $sqlCariUser = "select * from user where id_user='$id'";
    $user = [];

    $result = $koneksi->query($sqlCariUser);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($user, $row);
    }
    if ($user[0]['password'] == $passwordSebelumnya) {
        $sql = "update user set nama='$nama', email='$email', password='$passwordSekarang' where id_user='$id'";
        $result = $koneksi->query($sql);
        return true;
    } else {
        return false;
    }
}


function editUserTanpaPassword($id, $nama, $email)
{
    global $koneksi;
    $sql = "update user set nama='$nama', email='$email'  where id_user='$id'";
    $result = $koneksi->query($sql);    
    return $result;
}
