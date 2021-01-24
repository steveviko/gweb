<?php
session_start();
error_reporting(0);
include('includes/config.php');
$pageTitle ="Register";
// Code user Registration
if(isset($_POST['submit']))
{
$name=$_POST['fname'];
$email=$_POST['email'];
$contactno=$_POST['tel'];
$password=md5($_POST['pw']);
$query=mysqli_query($bd,"insert into users(name,email,contactno,password) values('$name','$email','$contactno','$password')");
if($query)
{
	echo "<script>alert('You are successfully registered,please login to continue');
	document.location='user-login.php';
	</script>";	

	exit();
}
else{
echo "<script>alert('Not registered something went worng');</script>";
exit();
}
}// Code for User login
if(isset($_POST['login']))
{
   $email=$_POST['email'];
   $password=md5($_POST['password']);
$query=mysqli_query($bd,"SELECT * FROM users WHERE email='$email' and password='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$extra="index.php";
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['id'];
$_SESSION['username']=$num['name'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($bd,"insert into userlog(userEmail,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$extra="user-login.php";
$email=$_POST['email'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
$log=mysqli_query($bd,"insert into userlog(userEmail,userip,status) values('$email','$uip','$status')");
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
$_SESSION['errmsg']="Invalid email id or Password";
exit();
}
}


?>
<?php  include("./includes/header.php");  ?> 


<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto" style="max-width:520px; margin-top:40px;">
      <article class="card-body">
		<header class="mb-4"><h4 class="card-title">Sign up</h4></header>
		<form action="" method="post" name="register" onSubmit="return valid();">
				<div class="form-row">
					<div class="col form-group">
						<label>Name</label>
					  	<input type="text" name="fname" class="form-control" placeholder="Enter Your Full Name" required>
					</div> <!-- form-group end.// -->
					
				</div> <!-- form-row end.// -->
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control" placeholder="Enter Your Email Address" required>
					<small class="form-text text-muted">We'll never share your email with anyone.</small>
				</div> <!-- form-group end.// -->
				<div class="form-group">
					<label>Contact Number</label>
					<input type="number" name="tel"  class="form-control" placeholder="Enter Your Phone Number" required>
					<small class="form-text text-muted">We'll never share your Number with anyone.</small>
				</div> <!-- form-group end.// -->
			
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Create password</label>
					    <input class="form-control" name="pw" type="password" required>
					</div> <!-- form-group end.// --> 
					<div class="form-group col-md-6">
						<label>Repeat password</label>
					    <input class="form-control" name="pw2" type="password" required>
					</div> <!-- form-group end.// -->  
				</div>
			    <div class="form-group">
			        <button type="submit" name="submit" class="btn btn-primary btn-block"> Register  </button>
			    </div> <!-- form-group// -->      
			    <div class="form-group"> 
		            <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked=""> <div class="custom-control-label"> I am agree with <a href="#">terms and contitions</a>  </div> </label>
		        </div> <!-- form-group end.// -->           
			</form>
		</article><!-- card-body.// -->
    </div> <!-- card .// -->
    <p class="text-center mt-4">Have an account? <a href="user-login.php">Log In</a></p>
    <br><br>
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


<?php include"./includes/footer.php";?>