<?php
include_once "../base.php";
$ondate=$Movie->find($_GET['id'])['ondate'];
$enddate=date("Y-m-d",strtotime($ondate."+2 days"));

$today=date("Y-m-d");
// echo $today;
for($i=0;$i<=2;$i++){
    if($today >=$ondate && $today<=$enddate){
        echo "<option value='$today'>$today</option>";
        $today=date("Y-m-d",strtotime($today."+1 day"));
    }
}