<?php
  session_start();
  $link=mysqli_connect("localhost","root","","db00_q3");
  mysqli_query($link,"set names utf8");
  $tt = strtotime("+6hour");
  $time = date("Y-m-d H:i:s",$tt);
  $ttt = strtotime("+6hour-3day");
  $td = date("Y-m-d",$ttt);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0047)? -->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>影城</title>
<link rel="stylesheet" href="css/css.css">
<link href="home_files/s2.css" rel="stylesheet" type="text/css">
<script src="scripts/jquery-1.9.1.min.js"></script>
</head>

<body>
<div id="main">
  <div id="top" class="ct" style=" background:#999 center; background-size:cover; " title="替代文字">
    <h1>ABC影城</h1>
  </div>
  <div id="top2">
    <a href="index.php">首頁</a>
    <a href="ticket.php">線上訂票</a>
    <a href="#">會員系統</a>
    <a href="login.php">管理系統</a> </div>
  <div id="text"> <span class="ct">最新活動</span>
    <marquee direction="right">
    ABC影城票價全面八折優惠1個月
    </marquee>
  </div>