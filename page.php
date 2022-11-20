<?php
if ($req2 == "") {
	include 'page/home_admin.php';
}else

if ($req2 == "prosesCari") {
	include 'page/home_admin.php';
}else

if ($req2 == "BuatAkun") {
	include 'page/buatakun.php';
}else

if ($req2 == "MasukSistem") {
	include 'page/masuksistem.php';
}else

if ($req2 == "User") {
	include 'page/user.php';
}else

if ($req2 == "BaganKeluarga") {
	include 'page/bagankeluarga.php';
}else

if ($req2 == "LihatPernikahan") {
	include 'page/pernikahan.php';
}else

if ($req2 == "LihatPohonKeluarga") {
	include 'page/baganpohon.php';
}


else{
	include 'page/404.php';
}
?>