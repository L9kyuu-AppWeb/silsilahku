<?php 
include 'config/koneksi.php';
$link = WEB_ROOT;
@session_start();
session_destroy(); //Menghapus session keseluruhan
echo $db->alert("Anda Berhasil keluar","$link");
?>