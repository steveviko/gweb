<aside class="col-md-3">
                <figure class="card-product-grid card-sm" >
                        <a href="index.php" class="img-wrap1"> 
                         <img src="./images/logo1.jpg"> 
                        </a>
                    
                 </figure>
            
				 <h6 class="bg-blue text-center text-white mb-0 p-2"><i class="fa fa-bars text-muted mr-2"></i><a href="profile.php" class="text-white"> My Profile </a></h6>
				 <?php
			$query=mysqli_query($bd,"select * from users where id='".$_SESSION['id']."'");
			while($row=mysqli_fetch_array($query))
			{
			?>
				 <div class="itemside  mb-3">
						 <div class="aside">
							<a href="#"> <img class="icon-xs rounded-circle border" src="./images/avatars/avatar3.jpg"></a>
						 </div>
						 <div class="info">
							 <p class="font-weight-bold text-dark"><?php echo $row['name'];?></p>
							 <small>Contact:<?php echo $row['contactno'];?></small>
						 </div>
					 </div><!-- itemside // -->
					 <?php } ?>
					 <a href="orders.php" class="text-white"><h6 class="bg-blue text-center text-white mb-2 p-2"><i class="fa fa-bars text-muted mr-2"></i> Orders </h6> </a>
					 <a href="wishlist.php" class="text-white"><h6 class="bg-blue text-center text-white mb-2 p-2"><i class="fa fa-bars text-muted mr-2"></i> Wishlist </h6> </a>
					 <a href="" class="text-white"><h6 class="bg-blue text-center text-white mb-2 p-2"><i class="fa fa-bars text-muted mr-2"></i> Track Orders </h6> </a>

					 
	
                  
            
                
                
                
        
        
        
        
    
        </aside> <!-- col.// -->