<?php
include_once "../base.php";
$_POST['seat']=serialize($_POST['seat']);
$_POST['session']=$sess[$_POST['session']];
$_POST['no']=date("Ymd").sprintf("%04d",$Ord->q("SELECT MAX(id) FROM ord ")[0][0]);
// var_dump($_POST);
$Ord->save($_POST);
echo $_POST['no'];