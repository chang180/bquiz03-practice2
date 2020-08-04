<a href="admin.php?do=addmovie"><button>新增電影</button></a>
<hr>
<?php
$rows = $Movie->all();
foreach ($rows as $row) {
?>
    <div class="contain" style="display:flex">
        <img src="img/<?= $row['poster']; ?>" style="width:68px;height:80px">
        <div>分級：<img src="icon/<?= $row['level']; ?>.png" alt=""></div>
        <div>
            <div>片名：<?= $row['name']; ?>片長：<?= $row['length']; ?>上映時間：<?= $row['ondate']; ?></div>
            <a href="?do=editmovie&id=<?= $row['id']; ?>">編輯電影</a><a href="api/delmovie.php?id=<?= $row['id']; ?>">刪除電影</a><br>
            劇情介紹：<?= $row['intro']; ?>
        </div>
    </div>
    <hr>
<?php } ?>