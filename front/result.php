<?php
$movie=$Ord->find(['no'=>$_GET['no']]);
?>
  <div id="mm">
    <div class="tab rb" style="width:87%;">
      感謝您的訂購，您的訂單編號是：<?=$_GET['no'];?><br>
      電影名稱：<?=$movie['movie'];?><br>
      日期：<?=$movie['date'];?><br>
      場次時間：<?=$movie['session'];?><br>
      座位：<br>
      <?php 
      foreach (unserialize($movie['seat']) as $s) echo $s,",";
      ?><br>
      共<?=$movie['qt'];?>張電影票<br>
      <button onclick="location.href='index.php'">確認</button>
    </div>
  </div>
 