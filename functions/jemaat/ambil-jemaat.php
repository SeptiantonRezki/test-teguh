<?php
require(__DIR__ . '/../../config/koneksi.php');

function ambilJemaat($id_jemaat)
{
    global $koneksi;
    $sql = "select * from jemaat where id_jemaat = $id_jemaat";
    $jemaat = [];

    $result = $koneksi->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($jemaat, $row);
    }
    return $jemaat;
}

function ambilSemuaJemaat()
{
    global $koneksi;
    $sql = "select * from jemaat";
    $jemaat = [];

    $result = $koneksi->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($jemaat, $row);
    }
    return $jemaat;
}

function ambilJemaatIddanNama(){
    global $koneksi;
    $sql = "select id_jemaat, nama from jemaat";
    $jemaat = [];

    $result = $koneksi->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($jemaat, $row);
    }
    return $jemaat;
}
function jumlahSemuaJemaat(){
    global $koneksi;
    $sql = "select count(*) as jumlah from jemaat";
    $jemaat = [];
    $result = $koneksi->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($jemaat, $row);
    }
    return $jemaat;
}