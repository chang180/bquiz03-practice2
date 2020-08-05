<?php
include_once "../base.php";
$movie = $Movie->find($_GET['id']);
$orderday = $_GET['date'];
// echo $orderday."123";

$today = date("Y-m-d");
$nowhour = date("H");
$nowsess = floor(($nowhour - 13) / 2);
// echo $nowsess."123";

// echo $today;
for ($i = 1; $i <= 5; $i++) {
    if ($today == $orderday && ($i-2) < $nowsess) {
        continue;
    } else {
        echo "<option value='$i'>$sess[$i]剩餘座位：20</option>";
    }
}
