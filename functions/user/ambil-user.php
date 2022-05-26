<?php
require(__DIR__ . '/../../config/koneksi.php');

function ambilUser($id)
{
    global $koneksi;
    $sql = "select * from user where id_user='$id'";
    $user = [];

    $result = $koneksi->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($user, $row);
    }
    return $user;
}

function ambilSemuaUser()
{
    global $koneksi;
    $allUser = [];
    $sql = "select * from user";
    $result = $koneksi->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($allUser, $row);
    }
    return $allUser;
}

function ambilSemuaUserTanpaPassword(){
    global $koneksi;
    $allUser = [];
    $sql = "select id_user, nama email from user";
    $result = $koneksi->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($allUser, $row);
    }
    return $allUser;
}