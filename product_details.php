<?php 
session_start();
error_reporting(0);
include('includes/config.php');
$pageTitle = "Product Details";
if (isset($_POST['savetocart'])) {
 	# code...
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	$r_qty =$_POST['quantity'];
	if(isset($_SESSION['cart'][$id])){

		$_SESSION['cart'][$id]['quantity']+=$r_qty;

		$sql ="SELECT * FROM `tblinventory` WHERE `PRODUCTID` =$id";
		$res = mysqli_query($bd,$sql);
		$row = mysqli_fetch_assoc($res); 

			if ($row['REMAINING'] < $_SESSION['cart'][$id]['quantity']) {
				# code...
				echo '<script>alert("Product is out of stock. The remaining item is '.$row['REMAINING'].' and it will be added in the cart.")</script>';
				$_SESSION['cart'][$id]['quantity']=$row['REMAINING'];
				echo '<script>window.location="product_details.php?pid='.$id.'"</script>';
			} 
		}else{
			$sql_p="SELECT * FROM products p,tblinventory i WHERE id=PRODUCTID AND id={$id} AND REMAINING > 0";
			$query_p=mysqli_query($bd,$sql_p);
			if(mysqli_num_rows($query_p)!=0){
				$row_p=mysqli_fetch_array($query_p);
				$_SESSION['cart'][$row_p['id']]=array("quantity" => $r_qty, "price" => $row_p['productPrice']);
				header('location:shopping_cart.php');
			}else{
				$message="Product ID is invalid";
			}
		}

	}
}
 
$pid=intval($_GET['pid']);
if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['login'])==0)
    {   
header('location:user-login.php');
}
else
{
mysqli_query($bd,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','$pid')");
echo "<script>alert('Product aaded in wishlist');</script>";
header('location:wishlist.php');

}
}
if(isset($_POST['submit']))
{
	$qty=$_POST['quality'];
	$price=$_POST['price'];
	$value=$_POST['value'];
	$name=$_POST['name'];
	$summary=$_POST['summary'];
    $review=$_POST['review'];
    if($value > 5){
        $value =5;
    }
    if($value < 1){
        $value =1;
    }
    mysqli_query($bd,"insert into productreviews(productId,quality,price,value,name,summary,review) values('$pid','$qty','$price','$value','$name','$summary','$review')");
    echo "<script>alert('Reviews made successfully. Thanks');</script>";
    
}


?>
<?php  include("./includes/header.php");  ?> 

<section class="py-3 bg-light">
<?php
$ret=mysqli_query($bd,"select category.categoryName as catname,subCategory.subcategory as subcatname,products.productName as pname from products join category on category.id=products.category join subcategory on subcategory.id=products.subCategory where products.id='$pid'");
while ($rw=mysqli_fetch_array($ret)) {

?>
  <div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#"><?php echo htmlentities($rw['catname']);?></a></li>
        <li class="breadcrumb-item"><a href="#"><?php echo htmlentities($rw['subcatname']);?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo htmlentities($rw['pname']);?></li>
    </ol>
  </div>
  <?php }?>
</section>
<?php 
$ret=mysqli_query($bd,"select * from products where id='$pid'");
while($row=mysqli_fetch_array($ret))
{

?>
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg-white padding-y">
<div id="message"></div>
<div class="container">

<!-- ============================ ITEM DETAIL ======================== -->
	<div class="row">
		<aside class="col-md-6">
<div class="card ">
<article class="gallery-wrap "> 
<div class="flexslider">
    <ul class="slides">
        <li data-thumb="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>">
            <div class="thumb-image">
                <img src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
        </li>
        <li data-thumb="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage2']);?>">
            <div class="thumb-image">
                <img src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage2']);?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
        </li>
        <li data-thumb="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage3']);?>">
            <div class="thumb-image">
                <img src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage3']);?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
        </li>
    </ul>
    <div class="clearfix"></div>
</div> <!-- slider-nav.// -->
</article> <!-- gallery-wrap .end//-->
</div> <!-- card.// -->
		</aside>
		<main class="col-md-5">
<article class="product-info-aside">

<h2 class="title mt-3">Name: <?php echo htmlentities($row['productName']);?> </h2>
<?php $rt=mysqli_query($bd,"select * from productreviews where productId='$pid'");
$num=mysqli_num_rows($rt);
{
?>		
<div class="rating-wrap my-3">
<?php 
        while($rrow=mysqli_fetch_array($rt)){
        $star= stars($rrow['value']);?>
	<ul class="rating-stars ">
        <?php echo $star; } ?>
		<!-- <li>
			<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
			<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
			<i class="fa fa-star"></i> 
		</li> -->
	</ul>
	<small class="label-rating text-muted " style="margin-left:100px">(<?php echo htmlentities($num);?> Reviews)</small>
	<small class="label-rating text-success float-md-right"> <i class="fa fa-clipboard-check"></i> Free Delivery Within Kampala </small>
</div> <!-- rating-wrap.// -->
<?php } ?>
<div class="mb-3"> 
	<var class="price h4">Ugx, <?php echo htmlentities($row['productPrice']);?>/=</var> 
	 
</div> <!-- price-detail-wrap .// -->




<dl class="row">
<dt class="col-sm-3">Description</dt>
  <dd class="col-sm-9"><?php echo htmlentities($row['productDescription']);?></dd>
  <dt class="col-sm-3">Sex</dt>
  <dd class="col-sm-9"><?php echo htmlentities($row['sex']);?></dd>

  <dt class="col-sm-3">Guarantee</dt>
  <dd class="col-sm-9">1 year</dd>

  <dt class="col-sm-3">Delivery </dt>
  <dd class="col-sm-9"><i class="fa fa-clipboard-check"></i> Free Delivery Within Kampala </small></dd>

  <dt class="col-sm-3">Availabilty</dt>
  <dd class="col-sm-9"><?php echo htmlentities($row['productAvailability']);?></dd>

</dl>

	<div class="form-row  mt-4">
		<div class="form-group col-md flex-grow-0">
			<div class="input-group mb-3 input-spinner">
			  <div class="input-group-prepend">
			    <!-- <button class="btn btn-light" type="button" id="button-plus"> + </button> -->
			  </div>
			  <input type="text" class="form-control" value="">
			  <div class="input-group-append">
			    <!-- <button class="btn btn-light" type="button" id="button-minus"> &minus; </button> -->
			  </div>
			</div>
		</div> <!-- col.// -->
		<div class="form-group col-md">
        <form action="" class="form_submit" >
            <input type="hidden" class="pid" value=" <?php echo htmlentities($row['id']);?>">
			<input type="hidden" class="pcode" value=" <?php echo htmlentities($row['id']);?>">
            <input type="hidden" class="pname" value=" <?php echo htmlentities($row['productName']);?>">
            <input type="hidden" class="pimage" value=" <?php echo htmlentities($row['productImage1']);?>">
            <input type="hidden" class="pprice" value=" <?php  echo htmlentities($row['productPrice']);?>">
			<button  class="btn  btn-secondary addItemBtn"> 
				<i class="fas fa-shopping-cart"></i> <span class="text">Add to cart</span> 
            </button>
           
               
             
                <a href="product_details.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist" class="btn btn-light"><i class="fa fa-heart text-danger"></i> Save </a> </form>
                <br><br>
              <h6>share</h6><div>
                    <a href="#" class="btn btn-icon btn-info "><i class="fab fa-twitter"></i></a>&nbsp;&nbsp;
                    <a href="#" class="btn btn-icon btn-success "><i class="fab fa-whatsapp"></i></a>&nbsp;&nbsp;
                    <a href="#" class="btn btn-icon btn-outline-danger "><i class="fab fa-instagram"></i></a>&nbsp;&nbsp;
                    <a href="#" class="btn btn-icon btn-secondary  "><i class="fab fa-facebook-f"></i></a>
                    </div>
              </div> 
			
		</div> <!-- col.// -->
	</div> <!-- row.// -->

</article> <!-- product-info-aside .// -->
		</main> <!-- col.// -->
	</div> <!-- row.// -->

<!-- ================ ITEM DETAIL END .// ================= -->


</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name padding-y bg">
<div class="container">

<div class="container">
	<div class="col-md-10">
		<h5 class="title-description">Description</h5>
		<p>
        
		</p>
		<div class="">
            <table class="table table-bordered>
                    <div class="tab-content">
								
                            <div id="description" class="tab-pane in active">
                                <div class="product-tab">
                                    <p class="text">
                                        <?php echo $row['productDescription'];?>
                                    </p>
                                </div>	
                            </div><!-- /.tab-pane -->
    
                            <div id="review" class="tab-pane">
                                <div class="product-tab">
                                                                            
                                    <div class="product-reviews">
                                        <h4 class="title">Customer Reviews</h4>
     <?php $qry=mysqli_query($bd,"select * from productreviews where productId='$pid'");
    while($rvw=mysqli_fetch_array($qry))
    {
    ?> 
    
                                        <div class="reviews">
                                            <div class="review">
                                                <div class="review-title"><span class="summary">
                                                    <?php echo htmlentities($rvw['summary']);?>
                                                </span><span class="date"><i class="fa fa-calendar"></i><span>
                                                    <?php echo htmlentities($rvw['reviewDate']);?>
                                                </span></span></div>
                                                <div class="text">
                                                    "<?php echo htmlentities($rvw['review']);?>"
                                                </div>
                                                <div class="author m-t-15"><i class="fa fa-pencil-square-o"></i> <span class="name">
                                                    <?php echo htmlentities($rvw['name']);?>
                                                </span></div>													</div>
                                        
                                        </div>
                                        <?php } ?><!-- /.reviews -->
                                    </div><!-- /.product-reviews -->
                                    <form role="form" class="cnt-form" name="review" method="post">
    
                                    
                                    <div class="product-add-review">
                                        <h4 class="title">Write your own review</h4>
                                        <div class="review-table">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">	
                                                    <thead>
                                                        <tr>
                                                            <th class="cell-label">&nbsp;</th>
                                                            <th>1 star</th>
                                                            <th>2 stars</th>
                                                            <th>3 stars</th>
                                                            <th>4 stars</th>
                                                            <th>5 stars</th>
                                                        </tr>
                                                    </thead>	
                                                    <tbody>
                                                        <tr>
                                                            <td class="cell-label">Quality</td>
                                                            <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                            <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                            <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                            <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                            <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cell-label">Price</td>
                                                            <td><input type="radio" name="price" class="radio" value="1"></td>
                                                            <td><input type="radio" name="price" class="radio" value="2"></td>
                                                            <td><input type="radio" name="price" class="radio" value="3"></td>
                                                            <td><input type="radio" name="price" class="radio" value="4"></td>
                                                            <td><input type="radio" name="price" class="radio" value="5"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cell-label">Value</td>
                                                            <td><input type="radio" name="value" class="radio" value="1"></td>
                                                            <td><input type="radio" name="value" class="radio" value="2"></td>
                                                            <td><input type="radio" name="value" class="radio" value="3"></td>
                                                            <td><input type="radio" name="value" class="radio" value="4"></td>
                                                            <td><input type="radio" name="value" class="radio" value="5"></td>
                                                        </tr>
                                                    </tbody>
                                                </table><!-- /.table .table-bordered -->
                                            </div><!-- /.table-responsive -->
                                        </div><!-- /.review-table -->
                                        
                                        <div class="review-form">
                                            <div class="form-container">
                                                
                                                    
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputName">Your Name <span class="astk">*</span></label>
                                                            <input type="text" class="form-control txt" id="exampleInputName" placeholder="" name="name" required="required">
                                                            </div><!-- /.form-group -->
                                                            <div class="form-group">
                                                                <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                                                <input type="text" class="form-control txt" id="exampleInputSummary" placeholder="" name="summary" required="required">
                                                            </div><!-- /.form-group -->
                                                        </div>
    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputReview">Comment Review <span class="astk">*</span></label>
    
    <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder="" name="review" required="required"></textarea>
                                                            </div><!-- /.form-group -->
                                                        </div>
                                                    </div><!-- /.row -->
                                                    
                                                    <div class="action text-right">
                                                        <button name="submit" class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                                    </div><!-- /.action -->
    
                                                </form><!-- /.cnt-form -->
                                            </div><!-- /.form-container -->
                                        </div><!-- /.review-form -->
    
                                    </div><!-- /.product-add-review -->										
                                    
                                </div><!-- /.product-tab -->
                            </div><!-- /.tab-pane -->
    
            
    
                        </div><!-- /.tab-content -->
            </table>

        
        </div>

		
	</div> <!-- col.// -->
	

</div> <!-- row.// -->

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
            
<?php $cid=$row['category'];
			$subcid=$row['subCategory']; } ?>
<!-- =============== SECTION ITEMS =============== -->
<section  class="padding-bottom-sm">

        <header class="section-heading heading-line">
            <h4 class="title-section text-uppercase">Related items</h4>
        </header>
   	
        <div class="row row-sm">
        <?php 
$qry=mysqli_query($bd,"select * from products where subCategory='$subcid' and category='$cid'");
while($rw=mysqli_fetch_array($qry))
{

			?>
            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                <div href="product_details.php?pid=<?php echo htmlentities($rw['id']);?>" class="card card-sm card-product-grid">
                    <a href="product_details.php?pid=<?php echo htmlentities($rw['id']);?>" class="img-wrap"> <img src="admin/productimages/<?php echo htmlentities($rw['productName']);?>/<?php echo htmlentities($rw['productImage1']);?>"> </a>
                    <figcaption class="info-wrap">
                        <a href="product_details.php?pid=<?php echo htmlentities($rw['id']);?>" class="title"><?php echo htmlentities($rw['productName']);?></a>
                        <div class="rating rateit-small"></div>
                        <div class="price mt-1">Ugx,<?php echo htmlentities($rw['productPrice']);?>/=</div> <!-- price-wrap.// -->
                        <form action="" class="form_submit" >
                        <input type="hidden" class="pid" value=" <?php echo htmlentities($row['id']);?>">
                                    <input type="hidden" class="pcode" value=" <?php echo htmlentities($row['id']);?>">
                        <input type="hidden" class="pname" value=" <?php echo htmlentities($row['productName']);?>">
                        <input type="hidden" class="pimage" value=" <?php echo htmlentities($row['productImage1']);?>">
                        <input type="hidden" class="pprice" value=" <?php  echo htmlentities($row['productPrice']);?>">
                        <button  class="btn btn-outline-secondary btn-sm addItemBtn"> Add to cart 
										<i class="fa fa-shopping-cart"></i> 
										</button>
                            <a href="product_details.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist" ><i class="fa fa-heart text-danger"></i> </a><br><br>
                            </form>
                    </figcaption>
                </div>
            </div> <!-- col.// -->
            <?php } ?>
           
            
        </div> <!-- row.// -->
        </section>
        <!-- =============== SECTION ITEMS .//END =============== -->

<!-- ========================= SECTION SUBSCRIBE  ========================= -->

<!-- ========================= SECTION SUBSCRIBE END// ========================= -->
<?php include"./includes/footer.php";?>