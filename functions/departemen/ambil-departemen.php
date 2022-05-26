<?php
require(__DIR__ . '/../../config/koneksi.php');

function ambilSemuaDepartemen()
{
    global $koneksi;
    $semauDepartemen = [];
    $sql = "select * from departemen";
    $result = $koneksi->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($semauDepartemen, $row);
    }
    return $semauDepartemen;
}
function ambilSatuDepartemen($id)
{
    global $koneksi;
    $sql = "select * from departemen where id_departemen='$id'";
    $departemen = [];

    $result = $koneksi->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($departemen, $row);
    }
    return $departemen;
}


