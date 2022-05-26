<?php
function menampilkanPesan($pesan)
{
    $startJs = '<script language="javascript">';
    $finishJs = '</script>';
    echo $startJs;
    echo 'alert("' + $pesan + '")';
    echo $finishJs;
}
