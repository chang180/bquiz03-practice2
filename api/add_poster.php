<?php
include_once "../base.php";
move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
$row['path']=$_FILES['img']['name'];
$row['movie']=$_POST['movie'];
$row['rank']=$Poster->q("SELECT MAX(rank) from poster")[0][0]+1;
$row['sh']=1;
$Poster->save($row);
to("../admin.php?do=poster");