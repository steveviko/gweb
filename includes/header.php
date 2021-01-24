<?php 
//  if (session_status() == PHP_SESSION_NONE  || session_id() == '') {
	//session_start();
	
// }
// $queryuser=mysqli_query($bd,"SELECT * FROM userlogs");
// while($row=mysqli_fetch_array($queryuser))
// 						{
// $user_email = $row['login'];
//  $user_id    = $_SESSION['id'];
//  $user_name  = $_SESSION['username'];
// }

 include('includes/config.php');

 function stars($starValue){
	 $star_rating="<li style='width:80%' class='stars-active'>";
	 while($starValue > 0){
		 $star_rating .="<i class='fa fa-star'></i>";
		 $starValue--;
	 }

	 $star_rating .="</li>";
	 return $star_rating;
 }

?>
<?php

if(isset($_Get['action'])){
	   if(!empty($_SESSION['cart'])){
	   foreach($_POST['quantity'] as $key => $val){
		   if($val==0){
			   unset($_SESSION['cart'][$key]);
		   }else{
			   $_SESSION['cart'][$key]['quantity']=$val;
		   }
	   }
	   }
   }

   // COde for Wishlist
if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['login'])==0)
    {   
header('location:user-login.php');

}
else
{
mysqli_query($bd,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','".$_GET['pid']."')"); 

echo "<script>alert('Product aaded in wishlist');</script>";
header('location:wishlist.php');


}
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title><?php echo $pageTitle; ?>| GreciaJewellery</title>

<link href="./images/favicon.ico" rel="shortcut icon" type="image/x-icon">


<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />


<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>


<!-- Font awesome 5 -->
<link href="fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

<!-- custom style -->
<link href="css/ui.css" rel="stylesheet" type="text/css"/>
<link href="css/responsive.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
function valid()
{
 if(document.register.password.value!= document.register.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.register.confirmpassword.focus();
return false;
}
return true;
}
</script>

</head>
<body>
<header class="section-header">		
<section class="header-main border-bottom">		
	<div class="container">		
		<div class="row align-items-center">
			<div class="col-xl-2 col-lg-3 col-md-12">
				<a href="contact.php" class="brand-wrap">
					<!-- <span class="icon-xs rounded-circle bg-secondary">
						<i class="fa fa-envelope white"></i>
					</span>
							<h6 class="title_all_products">greciajewellery@gmail.com </h6>
								
								  -->
								  <div class="icontext align-items-start ml-4" style="max-width: 300px;">
		<span class="icon icon-xs rounded-circle border border-primary">
			<i class="fa fa-envelope text-secondary"></i>
		</span>
		<div class="text mr-2">
			<h6 class="title">Email us:</h6>
			<p class="text-black" style="font-size:12px;" >greciajewellery@gmail.com </p>
		</div>
	</div> <!-- iconbox // -->
					
				</a> <!-- brand-wrap.// -->
					
			</div>
			<div class="col-xl-5 col-lg-5 col-md-5 ml-5 " >
				<form action="search_result.php" class="search-header " method="post" style="margin-right:-200px">
					<div class="input-group w-100">
						<select class="custom-select border-right"  name="category_name">
								<option value="">All type</option><option value="codex">Special</option>
								<option value="comments">Only best</option>
								<option value="content">Latest</option>
						</select>
					    <input type="text" class="form-control" name="product" placeholder="Search by Name,Category" required>
					    
					    <div class="input-group-append">
					      <button class="btn btn-secondary "  name="search" type="submit">
					        <i class="fa fa-search"></i> Search
					      </button>
					    </div>
				    </div>
				</form> <!-- search-wrap .end// -->
			</div> <!-- col.// -->
			<div class="col-xl-4 col-lg-4 col-md-6 ml-3">
				<div class="widgets-wrap float-md-right">
					<!--<div class="widget-header mr-3">
						<a href="products.php" class="widget-view">
							<div class="icon-area">
								<i class="fa fa-box"></i>
								
							</div>
							<small class="text text_bold"> In Stock </small>
						</a>
					</div> 
				
					<div class="widget-header mr-3">
						<a href="track_orders.php" class="widget-view">
							<div class="icon-area">
								<i class="fa fa-store"></i>
							
							</div>
							<small class="text text_bold"> Track Orders </small>
						</a>
					</div>-->
					<div class="widget-header ml-1">
							<a href="wishlist.php" class="widget-view">
								<div class="icon-area">
									<i class="fa fa-heart fa-sm"></i>
									<span class="notify"><?php
									$result =mysqli_query($bd,"select * from wishlist");
									$num=mysqli_num_rows($result);
									echo $num; ?>
									</span>
								</div>
								<small class="text text_bold">&nbsp;&nbsp;&nbsp;&nbsp; WishList </small>
							</a>
						</div>
					<div class="widget-header ml-1">
						<a href="shopping_cart.php" class="widget-view">
							<div class="icon-area">
								<i class="fa fa-shopping-cart fa-sm"></i>
								<span class="notify " id="cart-item"></span>
							</div>
							<small class="text text_bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;My Cart</small>
						</a>
					</div>
				</div> <!-- widgets-wrap.// -->
			</div> <!-- col.// -->
		</div> <!-- row.// -->
	</div> <!-- container.// -->
</section> <!-- header-main .// -->


<nav class="navbar navbar-main navbar-expand-lg border-bottom">
  <div class="container">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>Menu
    </button>

    <div class="collapse navbar-collapse" id="main_nav">
      
						
						  <ul class="navbar-nav">
						  <?php
						  if (isset($_SESSION['login'])){
						  $user_email =$_SESSION['login'];
						  if(strlen($user_email))
						{   ?>
					<li class="nav-item">
							<a class="nav-link" href="index.php">
									<div class="icontext mb-3">
											<img class="icon icon-xs rounded-circle" src="./images/avatars/gift.jpg">
											<p class="text text_bold">Home</p>
										</div> <!-- iconbox // -->	
							</a>
		
						</li>	
      
      
     
				<li class="nav-item">
					<a class="nav-link" href="about.php">
							<div class="icontext mb-3">
									<img class="icon icon-xs rounded-circle" src="./images/logo1.jpg">
									<p class="text text_bold">About us</p>
								</div> <!-- iconbox // -->	
					</a>

				</li>
				
					<li class="nav-item">
							<a class="nav-link " href="contact.php">
									<div class="icontext mb-3">
											<img class="icon icon-xs rounded-circle" src="./images/avatars/phone.jpg">
											<p class="text text_bold">contact </p>
										</div> <!-- iconbox // -->	
							</a>
		
						</li>
						<!-- <li class="nav-item">
							<a class="nav-link " href="products.php">
									<div class="icontext mb-3">
											<img class="icon icon-xs rounded-circle" src="./images/avatars/all.jpg">
											<p class="text text_bold">All products</p>
										</div> 	
							</a>
		
						</li> -->
						<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle text_bold" data-toggle="dropdown" href="products.php">	<span class="icon icon-xs rounded-circle mr-2">
										<i class="fa fa-ring"></i>
									</span>All products</a>
									<?php $sql=mysqli_query($bd,"select id,categoryName  from category ORDER BY id DESC LIMIT 0,2");
				while($row=mysqli_fetch_array($sql))
				{
					//threecategory 
					$cid = $row['id'];
                    ?>

					 <?php }?>
								<div class="dropdown-menu ">
								<?php $sql=mysqli_query($bd,"select id,subcategory  from subcategory where categoryid='$cid'");

                    while($row=mysqli_fetch_array($sql))
                    {
                        ?>
						
								<a class="dropdown-item text_bold" href="sub_category.php?scid=<?php echo $row['id'];?>"><?php echo $row['subcategory'];?></a>
								<?php }?>
								<!-- <a class="dropdown-item text_bold" href="#">Gold</a>
								<a class="dropdown-item text_bold" href="#">Necklace</a>
								<a class="dropdown-item text_bold" href="#">Earrings</a>
								<a class="dropdown-item text_bold" href="#">Bracelet</a>
								<a class="dropdown-item text_bold" href="#">Watches </a>
								<a class="dropdown-item text_bold" href="#">Diamond </a>
							 -->
								</div>
							</li>
        &nbsp; &nbsp; &nbsp;  
      
      <ul class="navbar-nav ml-md-auto ">
					<!--<li class="nav-item" >
							<a class="nav-link" href="#"><span class="text-black "><i class="fa fa-phone fa-xs"></i></span><span class="text_bold"> +256 787967393</span></a>
						</li> -->
					<li class="nav-item">
							<a class="nav-link" href="#"><span class="text-green "><i class="fab fa-whatsapp text-success"></i></span><span class="text_bold"> +256 701419936</span></a>
						</li>
						
						<li class="nav-item">
						<a class="nav-link" href="profile.php"><span class="text-primary"><i class="fa fa-user black"></i></span> <span class="text_bold">Hi,<?php echo htmlentities($_SESSION['username']);?></span></a>
					</li>
					
					<li class="nav-item ">
						<a class="nav-link " href="user-logout.php" ><span class="text-primary"><i class="fa  fa-key black"></i></span> <span class="text_bold">Logout</span></a>
					
					</li>
					<?php } }?>
						<?php 
						if(!isset($_SESSION['login'])){
							$user_email =false;
						if(strlen($user_email)==0)
    {   ?>
					<li class="nav-item">
							<a class="nav-link" href="home.php">
									<div class="icontext mb-3">
											<img class="icon icon-xs rounded-circle" src="./images/avatars/gift.jpg">
											<p class="text text_bold">Home</p>
										</div> <!-- iconbox // -->	
							</a>
		
						</li>	
      
      
     
				<li class="nav-item">
					<a class="nav-link" href="about.php">
							<div class="icontext mb-3">
									<img class="icon icon-xs rounded-circle" src="./images/logo1.jpg">
									<p class="text text_bold">About</p>
								</div> <!-- iconbox // -->	
					</a>

				</li>
				
					<li class="nav-item">
							<a class="nav-link " href="contact.php">
									<div class="icontext mb-3">
											<img class="icon icon-xs rounded-circle" src="./images/avatars/phone.jpg">
											<p class="text text_bold">contact </p>
										</div> <!-- iconbox // -->	
							</a>
		
						</li>
						<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle text_bold" data-toggle="dropdown" href="products.php">	<span class="icon icon-xs rounded-circle mr-2">
										<i class="fa fa-ring"></i>
									</span>All products</a>
									<?php $sql=mysqli_query($bd,"select id,categoryName  from category ORDER BY id DESC LIMIT 0,2");
				while($row=mysqli_fetch_array($sql))
				{
					//threecategory 
					$cid = $row['id'];
                    ?>

					 <?php }?>
								<div class="dropdown-menu ">
								<?php $sql=mysqli_query($bd,"select id,subcategory  from subcategory where categoryid='$cid'");

                    while($row=mysqli_fetch_array($sql))
                    {
                        ?>
						
								<a class="dropdown-item text_bold" href="sub_category.php?scid=<?php echo $row['id'];?>"><?php echo $row['subcategory'];?></a>
								<?php }?>
								<!-- <a class="dropdown-item text_bold" href="#">Gold</a>
								<a class="dropdown-item text_bold" href="#">Necklace</a>
								<a class="dropdown-item text_bold" href="#">Earrings</a>
								<a class="dropdown-item text_bold" href="#">Bracelet</a>
								<a class="dropdown-item text_bold" href="#">Watches </a>
								<a class="dropdown-item text_bold" href="#">Diamond </a>
							 -->
								</div>
							</li>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <ul class="navbar-nav ml-md-auto " >
					<!--<li class="nav-item">
							<a class="nav-link" href="#"><span class="text-black "><i class="fa fa-phone fa-xs "></i></span><span class="text_bold">  +256 787967393</span></a>
						</li> -->
					<li class="nav-item">
							<a class="nav-link" href="#"><span class="text-green "><i class="fab fa-whatsapp text-success"></i></span><span class="text_bold"> +256 701419936</span></a>
						</li>
					
					<li class="nav-item">
						<a class="nav-link" href="user-register.php"><span class="text-primary"><i class="fa fa-user black"></i></span> <span class="text_bold">Register</span></a>
					</li>
					
					<li class="nav-item ">
						<a class="nav-link " href="user-login.php" ><span class="text-primary"><i class="fa  fa-lock black"></i></span> <span class="text_bold">Login</span></a>
					
					</li>
					

	   </ul>
					<?php }}?>
					

	   </ul>


	

	  
    </div> <!-- collapse .// fa-2x-->
  </div> <!-- container .// -->
</nav>
</header> <!-- section-header.// -->
