<?php
include_once "../base.php";
$ondate=$Movie->find($_GET['id'])['ondate'];
$enddate=date("Y-m-d",strtotime($ondate."+2 days"));
echo $enddate;
$today=date("Y-m-d");
while($ondate<=$today && $today<=$enddate){
echo "<option value='$ondate'>$ondate</option>";
    $today=date("Y-m-d",strtotime("+1 days"));
}
exit;

