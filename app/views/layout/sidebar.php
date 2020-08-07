<?php
// selected
$ma=empty($ma)?'':$ma;
$in=empty($in)?'':$in;
$li=empty($li)?'':$li;
$la=empty($la)?'':$la;
$cet=empty($cet)?'':$cet;

$akses=$this->session->userdata('lvl_akses');
if ($akses==1) {
    require 'menuAdmin.php';
}else{
    require 'menuUser.php';
}

?>
