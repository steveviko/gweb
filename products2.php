<?php
// session_start();
error_reporting(0);
include('includes/config.php');
$pageTitle = "products";
$cid=intval($_GET['cid']);
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($bd,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
			header('location:shopping_cart.php');
		}else{
			$message="Product ID is invalid";
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
<?php  include("./includes/header.php");  ?> 


<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">


<!-- ============================  FILTER TOP  ================================= -->

<!-- ============================ FILTER TOP END.// ================================= -->


<div class="row">
	<?php  include("./includes/aside_full.php");  ?> 
	<main class="col-md-9">


<header class="mb-3">
		<div class="form-inline">
			<!-- <strong class="mr-md-auto">32 Items found </strong> -->
			<select class="mr-2 form-control">
				<option>Latest items</option>
				<option>Trending</option>
				<option>Most Popular</option>
				<option>Cheapest</option>
			</select>
			<div class="btn-group">
				<a href="products2.php" class="btn btn-light" data-toggle="tooltip" title="List view"> 
					<i class="fa fa-bars"></i></a>
				<a href="products.php" class="btn btn-light active" data-toggle="tooltip" title="Grid view"> 
					<i class="fa fa-th"></i></a>
			</div>
		</div>
</header><!-- sect-heading -->


<article class="card card-product-list">
	<div class="row no-gutters">
	<?php
	$ret=mysqli_query($bd,"select * from products ");
	while ($row=mysqli_fetch_array($ret)) 
	{
		//code...


	?>
		<aside class="col-md-3">
			<a href="product_details.php?pid=<?php echo htmlentities($row['id']);?>" class="img-wrap">
				<span class="badge badge-danger"> NEW </span>
				<img src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="<?php echo htmlentities($row['productName']);?>">
			</a>
		</aside> <!-- col.// -->
		<div class="col-md-6 ">
			<div class="info-main">
				<a href="product_details.php?pid=<?php echo htmlentities($row['id']);?>" class="h5 title"><?php echo htmlentities($row['productName']);?></a>
				<?php
                                        $ppid = $row['id'];
						$rt=mysqli_query($bd,"select * from productreviews where productId='$ppid'");
						$num=mysqli_num_rows($rt);?>
                                        <div class="rating-wrap mb-2">
										

										<?php 
												while($rrow=mysqli_fetch_array($rt)){
												$star= stars($rrow['value']);?>
											<ul class="rating-stars ">
												<?php echo $star; } ?>
											</ul>
	
                                               
                                                <div class="label-rating " style="margin-left:70px;"> <span class="tag"> (<?php echo htmlentities($num);?> Reviews) </span></div>
                                            </div> <!-- rating-wrap.// -->
    
                    <p><?php echo htmlentities($row['productDescription']);?></p>
    
                </div> <!-- info-main.// -->
            </div> <!-- col.// -->
            <aside class="col-sm-3">
                <div class="info-aside">
                    <div class="price-wrap">
                        <span class="h5 price">Ugx,<?php echo htmlentities($row['productPrice']);?>/=</span> 
                        <small class="text-muted">/per item</small>
                    </div> <!-- price-wrap.// -->
                    <small class="text-success">Free Delivery Within Kampala</small>
                    
                    
                    <p class="mt-3">
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
																		<!-- <button href="add.php" class="btn btn-outline-primary btn-sm"> Buy Now &nbsp;&nbsp;&nbsp;
																			<i class="fa fa-box"></i>
																		</button> -->
                        <a href="products2.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist" class="btn btn-light"><i class="fa fa-heart text-danger"></i> Save </a>
						</form>
                    </p>

			</div> <!-- info-aside.// -->
		</aside> <!-- col.// -->
		<?php } ?>
	</div> <!-- row.// -->
</article> <!-- card-product .// -->







<?php 
//set page pagination number
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

$no_of_records_per_page = 10;
$offset = ($pageno-1) * $no_of_records_per_page;

$total_pages_sql = "SELECT COUNT(*) FROM products";
$result = mysqli_query($bd,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT * FROM products LIMIT $offset, $no_of_records_per_page"; 

$res_data = mysqli_query($bd,$sql);
        while($row = mysqli_fetch_array($res_data)){
            //here goes the data
        }
        mysqli_close($bd);
    

?>


<nav class="mb-4 " aria-label="Page navigation sample">

  <ul class="pagination">
     <li class="page-item "><a class="page-link" href="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Previous</a></li>&nbsp;&nbsp;
    <li class="page-item  active"><a class="page-link" href="?pageno=1"><?php echo ($pageno ); ?></a></li>
	&nbsp;&nbsp;
    <li class="page-item"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>"><?php echo $pageno +1; ?></a></li> &nbsp;&nbsp;
    <li class="page-item"><a class="page-link" href="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a></li>
  </ul> 
</nav>



	</main> <!-- col.// -->

</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


<!-- ========================= SECTION SUBSCRIBE  ========================= -->

<!-- ========================= SECTION SUBSCRIBE END// ========================= -->

<?php include"./includes/footer.php";?>