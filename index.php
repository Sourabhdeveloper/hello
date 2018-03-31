<?php
include('Database.php');
if(isset($_POST['Submit']))
{
	
	 $Username=$_POST['Username'];
	 $Email=$_POST['Email'];
	 $Password=$_POST['Password'];
	 $Phone=$_POST['Phone'];
	 $Address=$_POST['Address'];
   	 $Country=$_POST['Country'];
	 $City=$_POST['City'];
	 
	 
	  $Image = rand(1000,100000)."-".$_FILES['Image']['name'];
     $Image_loc = $_FILES['Image']['tmp_name'];
     $Image_folder="Image/";
     if(move_uploaded_file($Image_loc,$Image_folder.$Image))
	 {
		 $query="insert into Register(Username,Email,Password,Phone,Image,Address,Country,City) values('$Username','$Email','$Password','$Phone','$Image','$Address','$Country','$City')";
		 
 $run=mysqli_query($con,$query);
 if($run)
 {
 	echo "<script>alert('Now You are able to login')</script>";

 }
 else{

 	echo "error in there";
	 }
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SignUp</title>
	
</head>
<body>

	<div class="Formhead">
	<h1 style="text-align:center;">Registration Here !</h1>
</div>
</br>
</br>
</br>
	<form action="" method="post" enctype="multipart/form-data">
	<table align="center">

       <tr>
				
			<td><input type="hidden" name="id" value="" ></td>	
        <tr>
		<tr>
			<td>Username</td>			
			<td><div class="form-group">
           <input type="text" class="form-control"   name="Username"  placeholder="Enter Name" required>
             </div></td>
			
        <tr>
			<td>Email</td>			
			<td><div class="form-group">
           <input type="Email" class="form-control" name="Email" placeholder="Enter Email" required>
             </div></td>
			
        </tr> 
        <tr>
			<td>Password</td>			
			<td><div class="form-group">
           <input type="Password" class="form-control" name="Password" placeholder="Enter Password" required>
             </div></td>
        </tr> 
        <tr>
			<td>Phone No.</td>			
			<td><div class="form-group">
           <input type="text" class="form-control" name="Phone" placeholder="Enter Phone" required>
             </div></td>
        </tr>
        <tr>
			<td>Profile Image</td>			
			<td><div class="form-group">
           <input type="file" class="form-control" name="Image"  required>
             </div></td>
        </tr> 
        <tr>
			<td>Address</td>			
			<td><div class="form-group">
           <input type="text" class="form-control" name="Address" placeholder="Enter Address" required>
             </div></td>
        </tr> 
        <tr>
			<td>Country</td>			
			<td><div class="form-group">
           <input type="text" class="form-control" name="Country" placeholder="Enter Country" required>
             </div></td>
        </tr> 
         <tr>
			<td>City</td>			
			<td>
				<div class="form-group">
           <input type="text" class="form-control" name="City" placeholder="Enter city" required>
             </div></td>
        </tr> 

       
        <tr></tr>
        <tr></tr>
        <tr>
			<td>
			<button type="submit" class="btn btn-success" name="Submit">Register</button></td>			
			<td><button type="Reset" class="btn btn-danger" name="Cancel">Cancel</button>
			<button type="" id="login" class="btn btn-success"><a href="Login.php">Login</a></button>
			</td>
        </tr> 


</table>
</form>
</body>
</html>	