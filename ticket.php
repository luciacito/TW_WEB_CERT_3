<?php
  include_once("head.php");
  $no1 = 0;
  $no2 = 0;
  $no3 = 0;
  if(!empty($_GET["no"])){ $no1 = $_GET["no"]; }
  if(!empty($_GET["no2"])){ $no2 = $_GET["no2"]; }
  if(!empty($_GET["no3"])){ $no3 = $_GET["no3"]; }
  $ttt = strtotime("+6hour-3day");
  $td = date("Y-m-d",$ttt);

  $sql = "select * from move where m_look = '1' and m_day > '$td'";
  $ro = mysqli_query($link,$sql);
  $rr = mysqli_fetch_assoc($ro);
?>
  <div id="mm">
<form method="post" action="buyticket.php?">
    <table width="100%" border="1" align="center" cellpadding="3" cellspacing="0">
      <tr>
        <td align="center">
          <select name="s1" id="s1" onchange="select1()">
            <option>請選擇影片</option>
<?php do{?>
            <option value="<?=$rr["m_seq"]?>" <?php if($no1 == $rr["m_seq"]){ echo "selected='selected'";}?>>
              <?=$rr["m_name"]?>
            </option>
<?php }while($rr = mysqli_fetch_assoc($ro));?>
          </select>
        </td>
      </tr>
      <tr>
        <td align="center">
          <div id="ss1"></div>
        </td>
      </tr>
      <tr>
        <td align="center">
          <div id="ss2"></div>
        </td>
      </tr>
      <tr>
        <td align="center">
          <input type="submit" value="確定">
          <input type="button" value="重置" onclick="document.location.href='ticket.php?no=<?=$no?>'">
        </td>
      </tr>
    </table>
</form>
<script>
  function select1(){
    s1 = document.getElementById("s1").value;
    $.post("t_1_api.php",{s1},function(dd){
      document.getElementById("ss1").innerHTML = dd;
    });
  }
  function us1(){
    s1 = "<?=$no1?>";
    $.post("t_1_api.php",{s1},function(dd){
      document.getElementById("ss1").innerHTML = dd;
    });
  }
  <?php if(($no1 > 0) && ($no2 == 0) ){ echo "us1();";}?>
    
  function select2(ss){
    s2 = document.getElementById("s2").value;// s2日期 ss索引鍵
    $.post("t_2_api.php",{s2,ss},function(dd){
      document.getElementById("ss2").innerHTML = dd;
    });
  }
  function us2(){
    s2 = "<?=$no2?>";//日期
    ss = "<?=$no1?>";//電影的索引鍵 t_2_api用
    s1 = "<?=$no1?>";//電影的索引鍵 t_1_api用
    s3 = "<?=$no3?>";//預先選取的場次
    $.post("t_1_api.php",{s1,s2},function(dd){
      document.getElementById("ss1").innerHTML = dd;
    });
    $.post("t_2_api.php",{s2,ss,s3},function(dd){
      document.getElementById("ss2").innerHTML = dd;
    });
  }
  <?php if($no2 > 0){ echo "us2();";}?>
</script>
  </div>
<?php include_once("footer.php")?>