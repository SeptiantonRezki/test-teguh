<?php
require(__DIR__ . '/../../config/koneksi.php');


function ambilPemasukan($id_pemasukan)
{
    global $koneksi;
    $sql = "select * from pemasukan where id_pemasukan = $id_pemasukan";
    $pemasukan = [];

    $result = $koneksi->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($pemasukan, $row);
    }
    return $pemasukan;
}

function ambilSemuaPemasukan()
{
    global $koneksi;
    $sql = "select * from pemasukan";
    $pemasukan = [];

    $result = $koneksi->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($pemasukan, $row);
    }
    return $pemasukan;
}

function ambilPemasukanDenganNamaJemaat()
{
    global $koneksi;
    $sql = "SELECT * FROM pemasukan LEFT JOIN jemaat ON pemasukan.id_jemaat = jemaat.id_jemaat";
    $pemasukan = [];

    $result = $koneksi->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($pemasukan, $row);
    }
    return $pemasukan;
}

function ambilPemasukanHariIni()
{
    global $koneksi;
    $sql = "SELECT jumlah FROM pemasukan WHERE DATE(`tanggal`) = CURDATE()";
    $pemasukan = [];

    $result = $koneksi->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($pemasukan, $row);
    }
    return $pemasukan;
}

function menjumlahkanJumlahPemasukan()
{
    global $koneksi;
    $sql = "SELECT SUM(jumlah) as jumlah FROM pemasukan";
    $pemasukan = [];
    $result = $koneksi->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($pemasukan, $row);
    }
    return $pemasukan;
}
