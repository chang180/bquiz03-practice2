<div id="mm">
    <div class="half" style="vertical-align:top;">
        <h1>預告片介紹</h1>
        <div class="rb tab" style="width:95%;">
            <div id="abgne-block-20111227">
                <!-- 海報區 -->
                <div style="height:300px;">
                    <div class="poster" style="position:relative">
                        <img id="showpost" style="height:250px"><br>
                        <span id="showname"></span>
                    </div>
                </div>
                <!-- 按鈕區 -->
                <div style="display:flex;height:100px">
                    <button onclick="pp(1)">&#9664;</button>
                    <?php
                    $posters = $Poster->all(['sh' => 1], " ORDER BY rank DESC ");
                    foreach ($posters as $key => $p) {
                    ?>
                        <div class="im" id="ssaa<?= $key; ?>" onclick="change(<?= $key; ?>)"><img src="img/<?= $p['path']; ?>" style="width:60px;height:80px"><br>
                            <div class="txt" style="font-size:8px"><?= $p['movie']; ?></div>
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
            <div style="display:flex;flex-wrap:wrap">
                <?php
                $total = $Movie->count();
                $now = $_GET['p'] ?? "1";
                $div = 4;
                $pages = ceil($total / $div);
                $start = ($now - 1) * $div;

                $movies = $Movie->all([], " LIMIT $start,$div");
                foreach ($movies as $m) {
                ?>
                    <div style="width:45%;border:1px solid black;">
                        片名：<?= $m['name']; ?><br>
                        <div style="display:flex">
                            <img src="img/<?= $m['poster']; ?>" style="width:60px;height:80px">
                            <div>
                                <div>分級：<?= $level[$m['level']]; ?></div>
                                <div>上映日期：<?= $m['ondate']; ?></div>
                            </div>
                        </div>
                        <div class="ct">
                            <a href="?do=intro&id=<?= $m['id']; ?>">劇情簡介</a><a href="?do=order&id=<?= $m['id']; ?>">線上訂票</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="ct">
                <?php
                for ($i = 1; $i <= $pages; $i++) {
                    echo "<a href='?p=$i'>$i</a>";
                }
                ?>
            </div>
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
        if (x == 2 && (nowpage + 1) <= num * 1 - 4) {
            nowpage++;
        }
        $(".im").hide()
        for (s = 0; s <= 3; s++) {
            t = s * 1 + nowpage * 1;
            $("#ssaa" + t).show()
        }
    }
    pp(1)

    let anim = <?= $_SESSION['ani']; ?>;
    let po = 0;

    // 先放上海報和片名
    function change(post) {
        $("#showpost").attr("src", $("#ssaa" + post).find("img").attr("src"));
        $("#showname").text($("#ssaa" + post).find(".txt").text());
        po = post;
    }
    // 把第一張先放上
    change(0);

    // 設定時間用動畫換頁，
    setInterval(() => {
        po++;
        if (po == num) po = 0;
        ani();
    }, 3000);

    //動畫函式，先出場，再換圖文，再進場(真正重點，記不住就GG了)
    // 函式只是指定進出場的動作，不需要使用參數
    function ani() {
        switch (anim) {
            case 1: //縮放
                $(".poster").fadeOut();
                change(po);
                $(".poster").fadeIn();
                break;
            case 2: //放大縮小
                $(".poster").slideToggle();
                change(po);
                $(".poster").slideToggle();
                break;
            default: //移出移入，動畫位置div裏的relative一定要設定
                $(".poster").animate({
                    left: "-=200px",
                    opacity: "0"
                });
                change(po);
                $(".poster").animate({
                    left: "+=200px",
                    opacity: "1"
                });
                break;
        }
    }
</script>