<?php 
$pageTitle ="Contact Us";

include("./includes/header.php");  ?> 

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">

<div class="row">
    <?php  include("./includes/aside_full.php");  ?>
        
	<main class="col-md-9">
        <div class="row">
            <aside class="col-md-6">

                    <!-- ============================ COMPONENT FEEDBACK  ================================= -->
                        <div class="card mb-4">
                          <div class="card-body">
                          <h4 class="card-title mb-4">Contact Form</h4>
                          <form action="action.php" method="post" >
                            <div class="form-group">
                                <label>Email</label>
                                  <input type="email" class="form-control" name="email"  placeholder="Enter Your email" required>
                            </div> <!-- form-group end.// -->
                            <div class="form-group">
                                <label>Contact </label>
                                  <input type="number" class="form-control" name="contact" placeholder="Enter Your phone Number" required>
                            </div> <!-- form-group end.// -->
                            <div class="form-group">
                                    <label>Name</label>
                                      <input type="text" class="form-control" name="username" placeholder="Enter your full name" required>
                                </div> <!-- form-group end.// -->
                            <div class="form-group">
                                <label>What is message about?</label>
                                <select class="form-control" name="type">
                                    <option>Select</option>
                                    <option value="Technical issue">Technical issue</option>
                                    <option Value="Money refund">Money refund</option>
                                    <option value="Recommendation">Recommendation</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label></label>
                                <textarea class="form-control" rows="3" name="message" placeholder="message body" required></textarea>
                            </div>
                            
                            <button type="submit" name="submitMessage"class="btn btn-primary btn-block">Send Message</button>
                          </form>
                          </div> <!-- card-body.// -->
                        </div> <!-- card .// -->
                    <!-- ============================ COMPONENT FEEDBACK END.// ================================= -->
                    </aside>
                    <aside class="col-md-5">
                    <div class="card mb-4 ">
                            <div class="card-body">
                            <h4 class="card-title mb-4">Talk Directly with us </h4>
                      <form role="form">
                     
                     
                      
                     
                      <a href="#" class="btn btn-facebook btn-block mb-2"> <i class="fab fa-facebook-f"></i> &nbsp;  Sign in with Facebook</a>
                      <a href="#" class="btn btn-instagram btn-block mb-4"> <i class="fab fa-instagram"></i> &nbsp;  Fowllow us on Instagram</a>
                      <a href="#" class="btn btn-twitter btn-block mb-4"> <i class="fab fa-twitter"></i> &nbsp;  Fowllow us on Twitter</a>
                      <a href="#" class="btn btn-success btn-block mb-4"> <i class="fab fa-whatsapp"></i> &nbsp;  chat  on whatsapp</a>

                      <p class="alert alert-success"> <i class="fa fa-phone"></i>  call us on: +256 787967393
                      </p>
                      <p class="alert alert-success"> <i class="fab fa-whatsapp"></i> chat on whatsapp:    +256 701419936
                        
                        </p>
                      
                      </form>
                            </div> <!-- card-body.// -->
                          </div> <!-- card .// -->
                      <!-- ============================ COMPONENT PAYMENT END.// ================================= -->
                        </aside>
                    </div>
                       



	</main> <!-- col.// -->
	
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<?php include"./includes/footer.php";?>