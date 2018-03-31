<?php 
include('Database.php');
session_start();
if(isset($_SESSION['Email']))
{
	header('Location:Welcome.php');
}

if(isset($_POST['Login']))	
{
	$Email=$_POST['Email'];
	$Password=$_POST['Password'];
	$id=$_POST['id'];
	$query1="(Select * From Register Where Email='$Email' and Password='$Password')";

	$run=mysqli_query($con,$query1);
	$result=mysqli_num_rows($run);

	if($result)
	{
          
      $_SESSION['Email'] = $Email;
		header('Location:Welcome.php');
	}
	else{

		echo "Something	 went Wrong";
	}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		
	</style>
	<title>Login</title>
</head>
<body>
	<div class="Login" style="text-align:center;">
	<h1>Login Here !</h1>
	<h5>If you already Register </h5>
	</br></br>
	<form action="" method="post">
	<table align="center">

			<input type="hidden" name="id" value="" placeholder="Enter Email">
		
		<tr>
			<td><label for="exampleInputEmail1">Email</label></td>
			<td><div class="form-group">
           <input type="email" class="form-control" name="Email" placeholder="Enter email">
             </div></td>
		</tr>
		<tr>
			<td><label for="exampleInputEmail1">Password</label></td>
			<td><div class="form-group">
           <input type="Password" class="form-control" name="Password" placeholder="Enter Password">
             </div></td>
		</tr>
		<tr></tr>
		<tr >
			<td colspan="2"><button type="submit" class="btn btn-success" name="Login">Login</button>
		</tr>
			
		<tr >	
			<td colspan="2" style="padding-top:20px;"><button type="" id="login" class="btn btn-success"><a href="index.php">Register First !</a></button></td>
			
        </tr> 
		<tr>
		<td colspan="2">
		<small style="color:red;">if you are not register plz register first...</small>
		</td>
		</tr>

	</table>
</form>
</div>
</body>
</html>