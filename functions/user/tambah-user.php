<?php
require(__DIR__ . '/../../config/koneksi.php');


function tambahUser($nama, $username, $password)
{
    global $koneksi;
    $sql = "insert into user (nama, username, password) values ('$nama', '$username', '$password')";
    $user = [];

    $result = $koneksi->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($user, $row);
    }
    return $user;
}