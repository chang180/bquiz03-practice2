<h1 class="ct">訂單管理</h1>
<form action="api/fastdel.php" method="post" onsubmit="return confirm('確定刪除？')">
    快速刪除：<input type="radio" name="mode" value="1">依日期<input type="text" name="date" >
    <input type="radio" name="mode" value="2">依電影<select name="movie">
    <?php
    $rows=$Ord->all([]," GROUP BY movie");
    foreach($rows as $row){
        echo "<option value=".$row['movie'].">".$row['movie']."</option>";
    }
    ?>
    </select>
    <button>刪除</button>
</form>
<table rules="rows">
    <tr>
        <td>訂單編號</td>
        <td>電影名稱</td>
        <td>日期</td>
        <td>場次時間</td>
        <td>訂購數量</td>
        <td>訂購位置</td>
        <td>操作</td>
    </tr>
    <?php
$orders=$Ord->all([]," ORDER BY no DESC ");
foreach($orders as $o){
    ?>
    <tr>
        <td><?=$o['no'];?></td>
        <td><?=$o['movie'];?></td>
        <td><?=$o['date'];?></td>
        <td><?=$o['session'];?></td>
        <td><?=$o['qt'];?></td>
        <td><?php
        $seat=unserialize($o['seat']);
        foreach($seat as $s) echo $s,",";
        ?></td>
        <td>
            <a href="api/del_order.php?no=<?=$o['no'];?>">刪除</a>
        </td>
    </tr>
<?php }
    ?>
</table>
