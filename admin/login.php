<form>
    <div class="ct">
        請輸入帳號：<input type="text" id="acc"><br>
        請輸入密碼：<input type="password" id="pw"><br>
        <button type="button" id="login">確認</button>
    </div>
</form>
<script>
$("#login").on("click",function(){
    let acc=$("#acc").val();
    let pw=$("#pw").val();
    $.post("api/login.php",{acc,pw},function(res){
        if(res==1){
            location.reload();
        }else{
            alert("帳號或密碼錯誤");
            location.reload();
        }
    })
})
</script>