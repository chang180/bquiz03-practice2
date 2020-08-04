<?php
include_once "../base.php";
if($_POST['acc']=='admin' && $_POST['pw']=='1234'){
    $_SESSION['admin']=1;
    echo 1;
}