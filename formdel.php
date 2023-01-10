<?php
session_start();
$_SESSION['message']='   ';
$_SESSION['d_password']=$_POST['d_password'];
$_SESSION['d_email']=$_POST['d_email'];
$mysqli = new mysqli('localhost','root','system','accounts') ;

if(1)
                 {
         header('location:delete.php');
				 }


?>
<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      <input type="text" placeholder="User Name" name="username" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar" accept="image/*" required /></div>
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
	<br/><br/>
	<h1>DELETING PORTION</h1>
	<form class="formd" action="delete.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      <input type="text" placeholder="User Name" name="d_username" required />
      <input type="email" placeholder="Email" name="d_email" required />
      <input type="password" placeholder="Password" name="d_password" autocomplete="new-password" required />
      <input type="submit" value="DELETE" name="delete" class="btn btn-block btn-primary" />
	  <br/><br/>
    </form>
	<h1>VIEW ALL RECORDS</h1>
	<form  class="form" action="delete.php" method="post" enctype="multipart/form-data" autocomplete="off">
     <input type="submit" value="VIEW" class="btn btn-block btn-primary" name="view" />
    </form>
  </div>
  </div>
