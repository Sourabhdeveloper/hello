<?php
session_start();
include('Database.php');
if(!isset($_SESSION['Email'] ))
{
	header('Location:Login.php');
	exit();
}
?>
<?php 
 $EmailSession = $_SESSION['Email'];

$select ="(select * from register where Email='$EmailSession')";
$result = mysqli_query($con,$select);
while ($row = mysqli_fetch_array($result)) {
	
    $Id=$row['id'];
	$Username=$row['Username'];
	$Email=$row['Email'];
	$Phone=$row['Phone'];
	$Address=$row['Address'];
	$Country=$row['Country'];
	$City=$row['City'];
	$Image=$row['Image'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	
	<script type="text/javascript"> 
	function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(60)
                        .height(60);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }</script>

	
</head>
<body>
	<center><h1> <p><a href="Logout.php">Logout</a> </p>Welcome-<?php echo  "<span style='color:red;'>".strtoupper($Username)."</span>"; ?></h1>	
	</br>
</br>
</br>
   <fieldset>
    <legend>YOUR PROFILE</legend></center>
    <div class="container">
	<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
	<form method="post" action=""  enctype="multipart/form-data">
	<div class="form-group">
      <input type="hidden" class="form-control"  value="<?php echo  $Id; ?>"  placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Username</label>
      <input type="text" class="form-control" name="Username1" value="<?php echo  $Username; ?>"  placeholder="Enter Username">
    </div>
	<div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input type="email" class="form-control" name="Email1" value="<?php echo  $Email; ?>"  placeholder="Enter Email">
    </div>
	<div class="form-group">
      <label for="exampleInputEmail1">Phone</label>
      <input type="text" class="form-control" name="Phone1" value="<?php echo  $Phone; ?>"  placeholder="Enter Phone">
    </div>
	<div class="form-group">
      <label for="exampleInputEmail1">Address</label>
      <input type="text" class="form-control" name="Address1" value="<?php echo  $Address; ?>"  placeholder="Enter Address">
    </div>
	<div class="form-group">
      <label for="exampleInputEmail1">Country</label>
      <input type="text" class="form-control"  name="Country1" value="<?php echo  $Country; ?>"  placeholder="Enter Country">
    </div>
	<div class="form-group">
      <label for="exampleInputEmail1">City</label>
      <input type="text" class="form-control" name="City1" value="<?php echo  $City; ?>"  placeholder="Enter City">
    </div>
	<div class="form-group">
      <label for="exampleInputEmail1">Profile-Picture</label>
      <input  name="Image1" type="file" value="<?= $row['Image'];?>" width="100%" height="200pt" onchange="readURL(this);" /> 
	  <img src="image/<?= $row['Image'];?>" class="img-thumbnail" id="blah" width="100px" height="120px" alt="Your Image" />				  
    </div>
    <button type="Submit" name="Update" class="btn btn-success">Save</button>
	<button type="remove" name="Delete" class="btn btn-danger">remove</button>
  </fieldset>
</form>
</div>
</div>
</div>
<div class="col-sm-3"></div>
<?php  }?>

</body>
</html>
</br>
</br>
</br>
<?php
if(isset($_POST['Update']))
{
	
	$Username=$_POST['Username1'];
	$Email=$_POST['Email1'];
    $Phone=$_POST['Phone1'];
    $Address=$_POST['Address1'];
	$Country=$_POST['Country1'];
	$City=$_POST['City1'];
	

	$Image = rand(1000,100000)."-".$_FILES['Image1']['name'];
     $Image_loc = $_FILES['Image1']['tmp_name'];
     $Image_folder="Image/";
     move_uploaded_file($Image_loc,$Image_folder.$Image);
	 
		 
	
	$update="Update register set Username='$Username',Email='$Email',Phone='$Phone',Address='$Address',Country='$Country',City='$City',Image='$Image' where Email='$EmailSession'";
	
	$run=mysqli_query($con,$update);
	if($run)
	{
		header('Location:Welcome.php');
	}
	else
	{
		echo "Something issue profile are not update";
	}
}
?>
