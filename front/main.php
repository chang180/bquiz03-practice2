<div id="mm">
    <div class="half" style="vertical-align:top;">
        <h1>預告片介紹</h1>
        <div class="rb tab" style="width:95%;">
            <div id="abgne-block-20111227">
                <!-- 海報區 -->
                <div class="poster" style="height:300px">
                    <img id="showpost" style="height:250px"><br>
                    <span id="showname"></span>
                </div>
                <!-- 按鈕區 -->
                <div style="display:flex;height:100px">
                    <button onclick="pp(1)">&#9664;</button>
                    <?php
                    $posters = $Poster->all(['sh' => 1], " ORDER BY rank DESC ");
                    foreach ($posters as $key => $p) {
                    ?>
                        <div class="im" id="ssaa<?= $key; ?>" onclick="change(<?=$key;?>)"><img src="img/<?= $p['path']; ?>" style="width:60px;height:80px"><br>
                    <div class="txt"><?=$p['movie'];?></div>
                    </div>
                    <?php
                    }
                    ?>
                    <button onclick="pp(2)">&#9654;</button>
                </div>
            </div>
        </div>
    </div>
    <div class="half">
        <h1>院線片清單</h1>
        <div class="rb tab" style="width:95%;">
            <table>
                <tbody>
                    <tr> </tr>
                </tbody>
            </table>
            <div class="ct"> </div>
        </div>
    </div>
</div>

<script>
    var nowpage = 0,
        num = <?= count($posters); ?>;
    function pp(x) {
        var s, t;
        if (x == 1 && nowpage - 1 >= 0) {
            nowpage--;
        }
        if (x == 2 && (nowpage + 1) * 3 <= num * 1 + 3) {
            nowpage++;
        }
        $(".im").hide()
        for (s = 0; s <= 3; s++) {
            t = s * 1 + nowpage * 1;
            $("#ssaa" + t).show()
        }
    }
    pp(1)

    let anim=<?=$_SESSION['ani'];?>;
    
    // 先放上海報和片名
function change(post){
    $("#showpost").attr("src",$("#ssaa"+post).find("img").attr("src"));
    $("#showname").text($("#ssaa"+post).find(".txt").text());
}

</script>