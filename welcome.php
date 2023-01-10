
<link rel="stylesheet" href="form.css">

<?php session_start(); ?>
<div class="body content">
   <div class="welcome">
   <div class="alert alert-success"><?= $_SESSION['message']?></div>
   <span class="user"><img src='<?=$_SESSION['avatar']?>'</span>
   Welcome   <span class="user"><?=$_SESSION['username']?></span>
   
   <?php 
   $mysqli= new mysqli('localhost','root','system','accounts');
   $sql="SELECT username,avatar,email FROM accounts";
   $result = $mysqli->query($sql);// $result = sql result objecct
   
   ?>
   <div id="registered">
   <span>ALL registered users</span>
   <?php
   while($row=$result->fetch_assoc()){
	   echo "<div class='userlist'><span>$row[username]</span><br/><span>$row[email]</span><br/>";	 
	   echo"<img src='$row[avatar]'></div>";
   }
   ?>
   </div>