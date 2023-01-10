
 <link rel="stylesheet" href="form.css">


<div class="body content">
   <div class="welcome">
   
<?php session_start();

    $mysqli= new mysqli('localhost','root','system','accounts');      
    $email=$mysqli->real_escape_string($_SESSION['d_email']);
    $password=md5($_SESSION['d_password']);
//$sql=mysql_query("SELECT * FROM accounts",$mysqli);
//$initial=mysql_num_rows($sql);
//$sql=mysql_query("SELECT* FROM accounts WHERE email='$email' AND password='$password'",$mysqli);
//$sql=mysql_query("SELECT * FROM accounts");
//$after=mysql_num_rows($sql);
if($mysqli->query("SELECT* FROM accounts WHERE email='$email' AND password='$password'")===true)
{  echo"<h1>RECORD PRESENT</h1>";
	if($mysqli->query("DELETE FROM accounts WHERE email='$email' AND password='$password'")===TRUE)
   {
    echo'<div class="alert alert-success"><h1>DELETION SUCCESSFUL</h1></div><br/><IMG src="project\thumbu.png">';
   }
   else
   {
	    echo'<div class="alert alert-success"><h1>DELETION NOT SUCCESSFULL</h1></div><br/><IMG src="project\thumbd.png">';
   }
}
 else
  {
	  echo"<h1>RECORD NOT PRESENT</h1></div><br/>";	  
  }   
   ?>
      </div>
	</div>
   <?php 
    // after deletion tesult
   $sql="SELECT username,avatar,email FROM accounts";
   $result = $mysqli->query($sql);// $result = sql result objecct
   ?>
   <div id="registered">
   <span>ALL registered users</span><div id="registered">
   <span>ALL registered users</span>
   <?php
   while($row=$result->fetch_assoc()){
	   echo "<div class='userlist'><span>$row[username]</span><br/><span>$row[email]</span><br/>"; 
	   echo"<img src='$row[avatar]'></div>";
   }
   ?>
   </div>