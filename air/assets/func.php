<?php
class klas_air{
    function koneksi(){
        $koneksi = mysqli_connect('localhost', 'user_air', '#Us3r_A1r_2024#', 'air_bayar');
        
        return $koneksi;
    }
function tipe_user($sesi_user)
{
    $q = mysqli_query($this->koneksi(),"SELECT tipe_user FROM user WHERE username='$sesi_user'");
    $d = mysqli_fetch_row($q);
    return $d[0];
}

function data_user($sesi_user)
{
    $q = mysqli_query($this->koneksi(),"SELECT nik, nama, tipe_user, no_telepon FROM user WHERE username='$sesi_user'");
    $d = mysqli_fetch_array($q);
    return $d;  
}
}


?>