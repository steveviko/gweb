<?php
session_start();
// error_reporting(0);
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

include('includes/config.php');

$pageTitle = "Home";

   

    

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

<?php  include("./includes/header.php");  ?> 

<div class="container">
   
<!-- ========================= SECTION MAIN  ========================= -->
<section class="section-main padding-y">
<main class="card">
<div id="message"></div>
	<div class="card-body">

<div class="row">
	<aside class="col-lg col-md-3 flex-lg-grow-0">
			<figure class="card-product-grid card-sm" >
					<a href="#" class="img-wrap1"> 
					 <img src="images/logo1.jpg"> 
					</a>
				
			 </figure>
		
		<h6 class="bg-blue text-center text-white mb-0 p-2"><i class="fa fa-bars text-muted mr-2"></i> Shop By Category</h6>
		<nav class="nav-home-aside ">
			<ul class="menu-category text_bold">
            <?php $sql=mysqli_query($bd,"select id,categoryName  from category ORDER BY id DESC LIMIT 0,2");
				while($row=mysqli_fetch_array($sql))
				{
					//threecategory 
					$cid = $row['id'];
                    ?>
                    <li><a href="category.php?cid=<?php echo $row['id'];?>"><?php echo $row['categoryName'];?></a></li>
                    <?php }?>
							
				<li class="has-submenu"><a href="#">More items</a>
					<ul class="submenu">
                    <?php $sql=mysqli_query($bd,"select id,subcategory  from subcategory where categoryid='$cid'");

                    while($row=mysqli_fetch_array($sql))
                    {
                        ?>
						
						<li><a href="sub-category.php?scid=<?php echo $row['id'];?>"> <?php echo $row['subcategory'];?></a>
                <?php }?></li>
						
					</ul>
                </li>
                
			</ul>
		</nav>
	</aside> <!-- col.// -->
	<div class="col-md-9 col-xl-7 col-lg-7">

<!-- ================== COMPONENT SLIDER  BOOTSTRAP  ==================  -->
<div id="carousel1_indicator" class="slider-home-banner carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel1_indicator" data-slide-to="0" class="active"></li>
    <li data-target="#carousel1_indicator" data-slide-to="1"></li>
    <li data-target="#carousel1_indicator" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./images/banners/slideone.jpg" alt="First slide"> 
    </div>
    <div class="carousel-item">
      <img src="./images/banners/slidetwo.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img src="./images/banners/slidethree.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carousel1_indicator" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel1_indicator" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> 
<!-- ==================  COMPONENT SLIDER BOOTSTRAP end.// ==================  .// -->	

	</div> <!-- col.// -->
	<div class="col-md d-none d-lg-block flex-grow-1">
		<aside class="special-home-right">		
			
			<h6 class="bg-blue text-center text-white mb-0 p-2"><i class="fa fa-list text-muted mr-2"></i> Popular Collections</h6>
			<div class="card-banner border-bottom">
			<?php
    $ret=mysqli_query($bd,"select * from products WHERE sex='Male' ORDER BY sex asc LIMIT 0,1");
    $num=mysqli_num_rows($ret);    
    while ($row=mysqli_fetch_array($ret))
   
	{
		//code...


	?>
			  <div class="py-3" style="width:80%">
			    <h6 class="card-title">Men's Jewellery </h6>
			    <a href="sex.php?mid=<?php echo htmlentities($row['id']);?>" class="btn btn-secondary btn-sm"> View now </a>
			  </div> 
			  <img src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="<?php echo htmlentities($row['productName']);?>" height="80" class="img-bg">
				<?php }  ?>
			</div>

			<div class="card-banner border-bottom">
			<?php
    $ret=mysqli_query($bd,"select * from products WHERE sex='Female' ORDER BY sex asc LIMIT 0,1");
    $num=mysqli_num_rows($ret);    
    while ($row=mysqli_fetch_array($ret))
   
	{
		//code...


	?>
			  <div class="py-3" style="width:80%">
			    <h6 class="card-title">Women's Jewellery</h6>
			    <a href="sex.php?wid=<?php echo htmlentities($row['id']);?>" class="btn btn-secondary btn-sm"> View now </a>
			  </div> 
			  <img src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="<?php echo htmlentities($row['productName']);?>" height="80" class="img-bg">

				<?php }  ?>
			</div>

			<h6 class="bg-blue text-center text-white mb-0 p-2"><i class="fa fa-comment-dots text-muted mr-2"></i>Customer Support 24/7</h6>
			<div class="card-banner border-bottom">
			  <div class="py-3" style="width:80%">
			    <h6 class="card-title">social media links</h6>
					<div>
						<!--<a href="#" class="btn btn-icon btn-info "><i class="fab fa-twitter"></i></a>-->
						<a href="#" class="btn btn-icon btn-success "><i class="fab fa-whatsapp"></i></a>&nbsp;
						<a href="#" class="btn btn-icon btn-outline-danger "><i class="fab fa-instagram"></i></a>&nbsp;
						<a href="#" class="btn btn-icon btn-secondary  "><i class="fab fa-facebook-f"></i></a>
						</div>
			  </div> 
			  
			</div>

		</aside>
	</div> <!-- col.// -->
</div> <!-- row.// -->

	</div> <!-- card-body.// -->
</main> <!-- card.// -->

</section>
<!-- ========================= SECTION MAIN END// ========================= -->



<!-- =============== SECTION DEAL =============== -->
<section class="padding-bottom">
 <div class="card card-deal">
     <div class="col-heading content-body">
      <header class="section-heading">
       <h3 class="section-title">Deals and offers</h3>
			 <div class="shadow-sm card-banner">
					<div class="p-4" style="width:75%">
						<h5 class="card-title">Rings</h5>
						<p>Engagement And Wedding rings at great discount.Save Big</p>
		
					</div>
					<img src="./images/banners/ban4.jpg" width="120" height="100" class="img-bg">
				</div>
   </div> <!-- col.// -->
   <div class="row no-gutters items-wrap">
	
	 <div class="col-md col-6">
		<?php
    $ret=mysqli_query($bd,"select * from products where sex='Male' ORDER BY sex asc LIMIT 0,1");
    $num=mysqli_num_rows($ret);    
    while ($row=mysqli_fetch_array($ret))
   
	{
		//code...


	?>
		<figure class="card-product-grid card-sm" >
			<a href="product_details.php?pid=<?php echo htmlentities($row['id']);?>" class="img-wrap"> 
			<img  src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage2']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="<?php echo htmlentities($row['productName']);?>">
		</a>
		<div class="text-wrap p-3">
			<a href="#" class="title text-truncate"><?php echo htmlentities($row['productName']);?></a>
			<span class="badge badge-danger"> -10% </span>
		</div>
		</figure>
		<?php }  ?>
		</div> <!-- col.// -->


			<div class="col-md col-6">
		<?php
    $ret=mysqli_query($bd,"select * from products WHERE sex='Female' ORDER BY sex asc LIMIT 0,1");
    $num=mysqli_num_rows($ret);    
    while ($row=mysqli_fetch_array($ret))
   
	{
		//code...


	?>
		<figure class="card-product-grid card-sm" >
			<a href="product_details.php?pid=<?php echo htmlentities($row['id']);?>" class="img-wrap"> 
			<img  src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage3']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="<?php echo htmlentities($row['productName']);?>" >
		</a>
		<div class="text-wrap p-3">
			<a href="#" class="title text-truncate"><?php echo htmlentities($row['productName']);?></a>
			<span class="badge badge-danger"> -10% </span>
		</div>
		</figure>
		<?php }  ?>
		</div> <!-- col.// -->


			<div class="col-md col-6">
		<?php
    $ret=mysqli_query($bd,"select * from products ORDER BY category desc LIMIT 0,1");
    $num=mysqli_num_rows($ret);    
    while ($row=mysqli_fetch_array($ret))
   
	{
		//code...


	?>
		<figure class="card-product-grid card-sm" >
			<a href="product_details.php?pid=<?php echo htmlentities($row['id']);?>" class="img-wrap"> 
			<img  src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage2']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="<?php echo htmlentities($row['productName']);?>" >
		</a>
		<div class="text-wrap p-3">
			<a href="#" class="title text-truncate"><?php echo htmlentities($row['productName']);?></a>
			<span class="badge badge-danger"> -10% </span>
		</div>
		</figure>
		<?php }  ?>
		</div> <!-- col.// -->



		<div class="col-md col-6">
		<?php
    $ret=mysqli_query($bd,"select * from products ORDER BY id ASC LIMIT 0,1");
    $num=mysqli_num_rows($ret);    
    while ($row=mysqli_fetch_array($ret))
   
	{
		//code...


	?>
		<figure class="card-product-grid card-sm" >
			<a href="product_details.php?pid=<?php echo htmlentities($row['id']);?>" class="img-wrap"> 
			<img  src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="<?php echo htmlentities($row['productName']);?>">
		</a>
		<div class="text-wrap p-3">
			<a href="#" class="title text-truncate"><?php echo htmlentities($row['productName']);?></a>
			<span class="badge badge-danger"> -10% </span>
		</div>
		</figure>
		<?php }  ?>
		</div> <!-- col.// -->


		<div class="col-md col-6">
		<?php
    $ret=mysqli_query($bd,"select * from products ORDER BY subcategory DESC LIMIT 0,1");
    $num=mysqli_num_rows($ret);    
    while ($row=mysqli_fetch_array($ret))
   
	{
		//code...


	?>
		<figure class="card-product-grid card-sm" >
			<a href="product_details.php?pid=<?php echo htmlentities($row['id']);?>" class="img-wrap"> 
			<img  src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="<?php echo htmlentities($row['productName']);?>">
		</a>
		<div class="text-wrap p-3">
			<a href="#" class="title text-truncate"><?php echo htmlentities($row['productName']);?></a>
			<span class="badge badge-danger"> -10% </span>
		</div>
		</figure>
		<?php }  ?>
		</div> <!-- col.// -->

</div>
</div>

</section>
<!-- =============== SECTION DEAL // END =============== -->

<!-- =============== SECTION 1 =============== -->
<section class="padding-bottom">
<header class="section-heading heading-line">
	<h4 class="title-section text-uppercase">Latest Collections in store </h4>
</header>



<div class="card card-home-category">
<div class="row no-gutters">
	<div class="col-md-3">
	
	<div class="home-category-banner bg-light-orange">
		<h5 class="title">Best Wedding And Engagement rings</h5>
		<p>Buy these Online from GreciaJewellery store Uganda at an affordable price. . </p>
		<a href="#" class="btn btn-outline-primary rounded-pill">Source now</a>
		<img src="images/banners/ban3.jpg" class="img-bg">
	</div>

	</div> <!-- col.// -->
	<div class="col-md-9">
   
<ul class="row no-gutters bordered-cols">
<?php
	$ret=mysqli_query($bd,"select * from products ORDER BY id DESC LIMIT
    0,8");
	while ($row=mysqli_fetch_array($ret)) 
	{
		//code...
        

	?>
	<li class="col-6 col-lg-3 col-md-4">
<a href="product_details.php?pid=<?php echo htmlentities($row['id']);?>" class="item"> 
	<div class="card-body">
		<h6 class="title"><?php echo htmlentities($row['productName']);?>  </h6>
		
		<img class="img-sm float-right"  src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="<?php echo htmlentities($row['productName']);?>"> 
        <p class="text-muted">Ugx, <?php echo htmlentities($row['productPrice']);?>/=</p>
		
        </a> <form action="" class="form_submit" >
            <input type="hidden" class="pid" value=" <?php echo htmlentities($row['id']);?>">
						<input type="hidden" class="pcode" value=" <?php echo htmlentities($row['id']);?>">
            <input type="hidden" class="pname" value=" <?php echo htmlentities($row['productName']);?>">
            <input type="hidden" class="pimage" value=" <?php echo htmlentities($row['productImage1']);?>">
            <input type="hidden" class="pprice" value=" <?php  echo htmlentities($row['productPrice']);?>">
<?php //print_r($row['productImage1']); ?>
		<button  class="btn btn-outline-secondary btn-sm addItemBtn"> Add to cart 
				<i class="fa fa-shopping-cart"></i> 
        </button>
			<a href="home.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist" title="Wishlist" ><i class="fa fa-heart text-danger"></i> </a><br><br>
			<!-- <button href="add.php" class="btn btn-outline-primary btn-sm"> Buy Now &nbsp;&nbsp;&nbsp;
					<i class="fa fa-box"></i>
				</button> -->
			
                </form>
				
        </div>
   
   <?php } ?>
   
	</li>
	
</ul>

	</div> <!-- col.// -->
</div> <!-- row.// -->
</div> <!-- card.// -->
</section>
<!-- =============== SECTION 1 END =============== -->

<!-- =============== SECTION 2 =============== -->
<section class="padding-bottom">
<header class="section-heading heading-line">
	<h4 class="title-section text-uppercase">Featured Collections</h4>
</header>

<div class="card card-home-category">
<div class="row no-gutters">
	<div class="col-md-3">
	
	<div class="home-category-banner bg-light-orange">
		<h5 class="title">Avialable in GreciaJewellery store</h5>
		<p>Enjoy Unlimited Free Delivery on all jewllery and related items Within Kampala. </p>
		<a href="#" class="btn btn-outline-primary rounded-pill">Source now</a>
		<img src="./images/banners/ban1.jpg" width="230" height="130" class="img-bg">
	</div>

	</div> <!-- col.// -->
	<div class="col-md-9">
<ul class="row no-gutters bordered-cols">
<?php
	$ret=mysqli_query($bd,"select * from products  order by
      id  LIMIT
    0,8");
	while ($row=mysqli_fetch_array($ret)) 
	{
		//code...


	?>
	<li class="col-6 col-lg-3 col-md-4">
<a href="product_details.php?pid=<?php echo htmlentities($row['id']);?>" class="item"> 
	<div class="card-body">
		<h6 class="title"><?php echo htmlentities($row['productName']);?>  </h6>
		<img class="img-sm float-right" src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="<?php echo htmlentities($row['productName']);?>"> 
        <p class="text-muted">Ugx, <?php echo htmlentities($row['productPrice']);?>/=</p>
        </a> <form action="" class="form_submit" >
            <input type="hidden" class="pid" value=" <?php echo htmlentities($row['id']);?>">
						<input type="hidden" class="pcode" value=" <?php echo htmlentities($row['id']);?>">
            <input type="hidden" class="pname" value=" <?php echo htmlentities($row['productName']);?>">
            <input type="hidden" class="pimage" value=" <?php echo htmlentities($row['productImage1']);?>">
            <input type="hidden" class="pprice" value=" <?php  echo htmlentities($row['productPrice']);?>">
<?php //print_r($row['productImage1']); ?>
		<button  class="btn btn-outline-secondary btn-sm addItemBtn"> Add to cart 
				<i class="fa fa-shopping-cart"></i> 
        </button>
			<a href="home.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist" title="Wishlist" ><i class="fa fa-heart text-danger"></i> </a><br><br>
			<!-- <button href="add.php" class="btn btn-outline-primary btn-sm"> Buy Now &nbsp;&nbsp;&nbsp;
					<i class="fa fa-box"></i>
				</button> -->
			
                </form>
        </div>
   
   <?php } ?>
	</li>
</ul>
	</div> <!-- col.// -->
</div> <!-- row.// -->
</div> <!-- card.// -->
</section>
<!-- =============== SECTION 2 END =============== -->



<!-- =============== SECTION REQUEST =============== -->

<section class="padding-bottom">

<header class="section-heading heading-line">
	<h4 class="title-section text-uppercase">Make Reservation</h4>
</header>

<div class="row">
	<div class="col-md-8">
<div class="card-banner banner-quote overlay-gradient" style="background-image: url('images/banners/ban2.jpg');">
  <div class="card-img-overlay white">
    <h3 class="card-title">An easy way to reserve items of choice for importation</h3>
    <p class="card-text" style="max-width: 400px">
    Prepayment by Mobile Money<br/>
Full refund if you do not get your product delivered.</p>
    <a href="" class="btn btn-primary rounded-pill">Learn more</a>
  </div>
</div>
	</div> <!-- col // -->
	<div class="col-md-4">

<div class="card card-body">
	<h4 class="title py-3">Reserve with specification</h4>
	<form action="action.php" method="post">
		
		<div class="form-group">
			<input class="form-control" name="msg_body" placeholder="What are you looking for?" type="text">
		</div>
		<div class="form-group">
			<div class="input-group">
				<input class="form-control" placeholder="contact" name="contact" type="number">
				
				<select class="custom-select form-control " name="sex">
					<option >SEX</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					
				</select>
			</div>
		</div>
		<div class="form-group text-muted">
			<p>Select request type:</p>
			<label class="form-check form-check-inline">
			  <input class="form-check-input" name="price" type="checkbox" value="option1">
			  <div class="form-check-label">Request price</div>
			</label>
			<label class="form-check form-check-inline">
			  <input class="form-check-input" name="date" type="checkbox" value="option2">
			  <div class="form-check-label">Request a delivery date</div>
			</label>
		</div>
		<div class="form-group">
			<button type="submit" name="submitReserve" class="btn btn-warning">Make Reservation</button>
		</div>
	</form>
</div>

	</div> <!-- col // -->
</div> <!-- row // -->
</section>

<!-- =============== SECTION REQUEST .//END =============== -->


<!-- =============== SECTION ITEMS =============== -->
<section  class="padding-bottom-sm">

<header class="section-heading heading-line">
	<h4 class="title-section text-uppercase">Recommended items</h4>
</header>

<div class="row row-sm">
<?php
	$ret=mysqli_query($bd,"select * from products  ORDER BY RAND() 
     LIMIT
    0,6");
	while ($row=mysqli_fetch_array($ret)) 
	{
		//code...


	?>
	<div class="col-xl-2 col-lg-3 col-md-4 col-6">
   
		<div href="product_details.php?pid=<?php echo htmlentities($row['id']);?>" class="card card-sm card-product-grid">
			<a href="product_details.php?pid=<?php echo htmlentities($row['id']);?>" class="img-wrap"> <img src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="<?php echo htmlentities($row['productName']);?>"> </a>
			<figcaption class="info-wrap">
				<a href="#" class="title"><?php echo htmlentities($row['productName']);?></a>
				<div class="price mt-1">Ugx,<?php echo htmlentities($row['productPrice']);?>/=</div> <!-- price-wrap.// -->
				<form action="" class="form_submit" >
            <input type="hidden" class="pid" value=" <?php echo htmlentities($row['id']);?>">
			<input type="hidden" class="pcode" value=" <?php echo htmlentities($row['id']);?>">
            <input type="hidden" class="pname" value=" <?php echo htmlentities($row['productName']);?>">
            <input type="hidden" class="pimage" value=" <?php echo htmlentities($row['productImage1']);?>">
            <input type="hidden" class="pprice" value=" <?php  echo htmlentities($row['productPrice']);?>">
<?php //print_r($row['productImage1']); ?>
		<button  class="btn btn-outline-secondary btn-sm addItemBtn"> Add to cart 
				<i class="fa fa-shopping-cart"></i> 
        </button>
			<a href="home.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist" title="Wishlist" ><i class="fa fa-heart text-danger"></i> </a><br><br>
			<!-- <button href="add.php" class="btn btn-outline-primary btn-sm"> Buy Now &nbsp;&nbsp;&nbsp;
					<i class="fa fa-box"></i>
				</button> -->
			
                </form>
			</figcaption>
		</div>
		
    </div> <!-- col.// -->
    <?php } ?>
</div> <!-- row.// -->
</section>
<!-- =============== SECTION ITEMS .//END =============== -->



<?php include"./includes/footer.php"; ?>