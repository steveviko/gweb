<aside class="col-md-3">
                <figure class="card-product-grid card-sm" >
                        <a href="#" class="img-wrap1"> 
                         <img src="images/logo1.jpg"> 
                        </a>
                    
                 </figure>
            
            <h6 class="bg-blue text-center text-white mb-0 p-2"><i class="fa fa-bars text-muted mr-2"></i> Shop By Category</h6>
            <nav class="nav-home-aside">
                <ul class="menu-category">
                <?php $sql=mysqli_query($bd,"select id,categoryName  from category ORDER BY id DESC LIMIT 0,2");
				while($row=mysqli_fetch_array($sql))
				{
                    //threecategory 
                    ?>
                    <li><a href="category.php?cid=<?php echo $row['id'];?>"><?php echo $row['categoryName'];?></a></li>
                    <?php }?>
							
				<li class="has-submenu"><a href="#">More items</a>
					<ul class="submenu">
                    <?php $sql=mysqli_query($bd,"select id,subcategory  from subcategory where categoryid='$cid'");

                    while($row=mysqli_fetch_array($sql))
                    {
                        ?>
						
						<li><a href="sub_category.php?scid=<?php echo $row['id'];?>"> <?php echo $row['subcategory'];?></a>
                <?php }?></li>
                            
                        </ul>
                    </li>
                </ul>
            </nav>
            
            <h6 class="bg-blue text-center text-white mb-0 p-2"><i class="fa fa-comment-dots text-muted mr-2"></i>Customer Support 24/7</h6>
            <div class="card-banner border-bottom">
              <div class="py-3" style="width:80%">
                <h6 class="card-title">Our social media links</h6>
                    <div>
                        <a href="#" class="btn btn-icon btn-info "><i class="fab fa-twitter"></i></a>&nbsp;&nbsp;
                        <a href="#" class="btn btn-icon btn-success "><i class="fab fa-whatsapp"></i></a>&nbsp;&nbsp;
                        <a href="#" class="btn btn-icon btn-outline-danger "><i class="fab fa-instagram"></i></a>&nbsp;&nbsp;
                        <a href="#" class="btn btn-icon btn-secondary  "><i class="fab fa-facebook-f"></i></a>
                        </div>
              </div> 
              
            </div>
            <h6 class="bg-blue text-center text-white mb-0 p-2"><i class="fa fa-comment-dots text-muted mr-2"></i>Hot Deals</h6>
            <?php
	$ret=mysqli_query($bd,"select * from products ORDER BY RAND() LIMIT 0,4 ");
	while ($row=mysqli_fetch_array($ret)) 
	{
		//code...


	?>
            <div class="itemside mb-3">
                    <div class="aside"><a href="product_details.php?pid=<?php echo htmlentities($row['id']);?>"><img src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="<?php echo htmlentities($row['productName']);?>" class="img-xs"></a></div>
                    <div class="info">
                        <p><?php echo htmlentities($row['productName']);?> <br> @ only   <span class="price">Ugx,<?php echo htmlentities($row['productPrice']);?>/=</span>  </p>
                    </div>
                </div><!-- itemside // -->
                <?php } ?>
                
                <h6 class="bg-blue text-center text-white  p-2"><i class="fa fa-comment-dots text-muted mr-2"></i>Top Items</h6>
               <?php $ret=mysqli_query($bd,"select * from products ORDER BY id  ASC LIMIT 0,1 ");
	while ($row=mysqli_fetch_array($ret)) 
	{
		//code...


	?>
                <div class="shadow-sm card-banner">
                        <div class="p-4 mt-2" style="width:75%">
                            <h5 class="card-title"><?php echo htmlentities($row['productName']);?></h5>
                            <p><?php echo htmlentities($row['productDescription']);?>.</p>
            
                        </div>
                        <a href="product_details.php?pid=<?php echo htmlentities($row['id']);?>">
                        <img src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="<?php echo htmlentities($row['productName']);?>" height="100" class="img-bg "></a>
                    </div>
        
                    <?php } ?>
        
        
    
        </aside> <!-- col.// -->