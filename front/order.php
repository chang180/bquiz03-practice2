<h1 class="ct">線上訂票</h1>
<div class="order-form">
  <div id="mm">
    <div class="tab rb" style="width:87%;">
      <form>
        電影：<select name="name" id="name">
          <?php
          $ondate = date("Y-m-d", strtotime("-2 days"));
          $today = date("Y-m-d");
          $rows = $Movie->all([], " WHERE ondate >= '$ondate' && ondate <= '$today' ");
          foreach ($rows as $row) {
          ?>
            <option value="<?= $row['id']; ?>" <?= ($row['id'] == @$_GET['id']) ? "selected" : ""; ?>><?= $row['name']; ?></option>
          <?php
          }
          ?>
        </select><br>
        日期：<select name="date" id="date">
        </select><br>
        場次：<select name="sess" id="sess">
        </select><br>
        <button type="button" onclick="booking()">確定</button><button type="reset">重置</button>
      </form>

    </div>
  </div>
</div>
<div class="booking-form" style="display:none;">
  <div class="room"></div>
  <div class="info">
    您選擇的電影是<span id="mName"></span><br>
    您選擇的時刻是<span id="mDate"></span>&nbsp;<span id="mSess"></span><br>
    你已經勾選了<span id="ticket">0</span> 張票，最多可以購買4張票<br>
    <button onclick="prev()">上一步</button><button type="button" id="send">訂購</button>
  </div>
</div>

<script>
  getdate();

  function getdate() {
    $.get("api/getdate.php", {
      id: $("#name").val()
    }, function(res) {
      $("#date").html(res);
      getsess();
    })
  }

  $("#name").on("change", function() {
    getdate();
    getsess();
  })

  function getsess() {
    $.get("api/getsess.php", {
      id: $("#name").val(),
      date: $("#date").val()
    }, function(res) {
      $("#sess").html(res);
    })
  }
  $("#date").on("change", function() {
    getsess();
  })


  function booking() {
    let movie = $("#name option:selected").text();
    let date = $("#date option:selected").val();
    let session = $("#sess option:selected").val();
    let ticket = 0;
    let seat = [];


    $("#mName").text($("#name option:selected").text());
    $("#mDate").text($("#date option:selected").text());
    $("#mSess").text($("#sess option:selected").text());

    $(".order-form,.booking-form").toggle();

    $.get("api/getseat.php", {
      movie,
      date,
      session
    }, function(res) {
      $(".room").html(res);
      $(".seat").change(function() {
        if (this.checked) {
          if (ticket > 3) this.checked = false;
          else {
            ticket++;
            seat.push(this.value);
          }
        } else {
          ticket--;
          seat.splice(seat.indexOf(this.value, 1));
        }

        $("#ticket").text(ticket);
       
      })
      $("#send").on("click", function() {
          $.post("api/order.php", {movie,date,session,seat,"qt":ticket}, function(res) {
            // console.log(res);
            location.href = `index.php?do=result&no=${res}`;
          })
        })
    })
  }

  function prev() {
    $(".order-form,.booking-form").toggle();
    $(".room").html("");
  }
</script>