<?php
session_start();
$_SESSION['message']='   ';
$mysqli = new mysqli('localhost','root','system','accounts') ;

if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_POST['password']==$_POST['confirmpassword'])
        {
	          $username = $mysqli->real_escape_string($_POST['username']);
             $email=$mysqli->real_escape_string($_POST['email']);
             $password=md5($_POST['password']);
               $avatar_path=$mysqli->real_escape_string('images/'.$_FILES['avatar']['name']);


//checking required field is correct or not
//file type is image
        if(preg_match("!image!",$_FILES['avatar']['type']))
          {
                	//copy image to image folder
               if(copy($_FILES['avatar']['tmp_name'],$avatar_path))
                  {
                     $_SESSION['username']=$username;
                      $_SESSION['avatar']=$avatar_path;

                       $sql="INSERT INTO accounts(username,email,password,avatar)"
                         ."VALUES('$username','$email','$password','$avatar_path')";
}
                //if query is successful,redirect to php page,done!
                     if($mysqli->query($sql)===true)
                    {
                    	$_SESSION['message']="Registeration  successful! Added $username to database!";
                        header('location:welcome.php');
                    }
                 else{
                      $_SESSION['message']='User could not be added to database!';
                        }
                }
           else{
               $_SESSION['message']='File upload failed!';
                 }
            }
        else{
             $_SESSION['message']='Please upload GIF,JPG OR PNG Images!';
         }
       }
    else{
       $_SESSION['message']='Two password do not match!';
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
	<form class="form" action="formdel.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      <input type="text" placeholder="User Name" name="d_username" required />
      <input type="email" placeholder="Email" name="d_email" required />
      <input type="password" placeholder="Password" name="d_password" autocomplete="new-password" required />
      <input type="submit" value="DELETE" name="delete" class="btn btn-block btn-primary" />
	  <br/><br/>
    </form>
	<h1>VIEW ALL RECORDS</h1>
	<form  class="form" action="view.php" method="post" enctype="multipart/form-data" autocomplete="off">
     <input type="submit" value="VIEW" class="btn btn-block btn-primary" name="view" />
    </form>
  </div>
  </div>

