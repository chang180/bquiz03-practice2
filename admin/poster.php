<h3 class="ct">預告片清單</h3>
<form action="api/edit_poster.php" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td width="25%">預告片海報</td>
        <td width="25%">預告片片名</td>
        <td width="25%">預告片排序</td>
        <td width="25%">操作</td>
    </tr>
    <?php
$rows=$Poster->all([],"ORDER BY rank DESC");
foreach($rows as $row){
    ?>
    <tr>
        <td><img src="img/<?=$row['path'];?>" style="width:68px;height:100px"></td>
        <td><input type="text" name="movie[]" value="<?=$row['movie'];?>"></td>
        <td><input type="text" name="rank[]" value="<?=$row['rank'];?>"></td>
        <td>
<input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?"checked":"";?>>顯示&nbsp;
<input type="checkbox" name="del[]" value="<?=$row['id'];?>">刪除
        </td>
    </tr>
    <input type="hidden" name="id[]" value="<?=$row['id'];?>">
<?php }?>
</table>
請輸入動畫切換效果：(1:淡入，2:縮放，3:滑出)<input type="text" name="ani" value="<?=$_SESSION['ani'];?>"><br>
<button>編輯確定</button><button type="reset">重置</button>
</form>

<form action="api/add_poster.php" method="post" enctype="multipart/form-data">
預告片海報：<input type="file" name="img">&nbsp;預告片片名：<input type="text" name="movie">
<div class="ct"><button>新增</button><button type="reset">重置</button></div>
</form>