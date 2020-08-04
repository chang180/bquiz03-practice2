<?php
include_once "../base.php";
$_POST['ondate']=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
unset($_POST['year'],$_POST['month'],$_POST['day']);
$_POST['poster']=$_FILES['poster']['name'];
$_POST['trailer']=$_FILES['trailer']['name'];
$Movie->save($_POST);
print_r($_POST);
to("../admin.php?do=movie");