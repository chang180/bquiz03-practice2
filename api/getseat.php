<?php
include_once "../base.php";
// var_dump($_GET);
$ords=$Ord->all(['movie'=>$_GET['movie'],'date'=>$_GET['date'],'session'=>$sess[$_GET['session']]]);
$seat=[];
foreach($ords as $o){
    $seat=array_merge($seat,unserialize($o['seat']));
}

for($i=1;$i<=20;$i++){
    if(in_array($i,$seat)){
echo "<img src='icon/03D03.png'>";
}else{
    echo "<img src='icon/03D02.png'>";
echo "<input type='checkbox' name='seat[]' value='$i'>";
    }
    if($i%5==0) echo "<br>";
}
