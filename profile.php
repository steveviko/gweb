<?php 

include('includes/config.php');
$pageTitle="profile"; 
// if(strlen($_SESSION['login'])==0)
//     {   
// 			header('location:profile.php');
// 		}
// else{
// 	if(isset($_POST['update']))
// 	{
// 		$name=$_POST['name'];
// 		$contactno=$_POST['contactno'];
// 		$query=mysqli_query($bd,"update users set name='$name',contactno='$contactno' where id='".$_SESSION['id']."'");
// 		if($query)
// 		{
// echo "<script>alert('Your info has been updated');</script>";
// 		}
// 	}
// }

date_default_timezone_set('Africa/Nairobi');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
$sql=mysqli_query($bd,"SELECT password FROM  users where password='".md5($_POST['cpass'])."' && id='".$_SESSION['id']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($bd,"update students set password='".md5($_POST['newpass'])."', updationDate='$currentTime' where id='".$_SESSION['id']."'");
echo "<script>alert('Password Changed Successfully !!');</script>";
}
else
{
	echo "<script>alert('Current Password not match !!');</script>";
}
}

?>
<?php  include("./includes/header.php");  ?> 

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">

<div class="row">
	<?php  include("./includes/aside.php");  ?>
	<main class="col-md-9">
		<!-- ============================ COMPONENT PROFILE  ================================= -->
	<div class="card mb-4">
			<div class="card-body">
			<h4 class="card-title mb-4">Profile</h4>
			
			<?php
			$query=mysqli_query($bd,"select * from users where id='".$_SESSION['id']."'");
			while($row=mysqli_fetch_array($query))
			{
			?>
		   <form>
	  
			   <!-- <div class="form-group">
				   <img src="./images/avatars/avatar2.jpg" class="img-sm rounded-circle border">
			   </div> -->
			  <div class="form-row">
				  <div class="col form-group">
					  <label>Name</label>
						<input type="text" class="form-control unicase-form-control text-input" value="<?php echo $row['name'];?>" id="name" name="name">
				  </div> <!-- form-group end.// -->
				  <div class="col form-group">
					  <label>Email</label>
						<input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $row['email'];?>" readonly >
				  </div> <!-- form-group end.// -->
			  </div> <!-- form-row.// -->
			  
			  
	  
			  <div class="form-row">
				  
				  <div class="form-group col-md-6">
					<label>Phone Number</label>
					<input type="text" class="form-control" id="contactno" name="contactno" required="required" value="<?php echo $row['contactno'];?>"  maxlength="10">
				  </div> <!-- form-group end.// -->
			  </div> <!-- form-row.// -->
	  
			  <button class="btn btn-primary btn-block">Edit</button>
			</form>

			<?php } ?>
			</div> <!-- card-body.// -->
		  </div> <!-- card .// -->
	  <!-- ============================ COMPONENT PROFILE END.// ================================= -->
	  



	</main> <!-- col.// -->
	
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<?php include"./includes/footer.php";?>