<!DOCTYPE>
<html lang="en">
  <head>
    <title>Chip N Subs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  
<?php
include("dbcon.php");

session_start();

if(isset($_GET['success']))
{
	if($_GET['success']=='1')
	{
	unset($_SESSION["cart"]);
	}
}
if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["cart"]))
	{
		$item_array_id = array_column($_SESSION["cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count =  count($_SESSION["cart"]);
			$item_array = array(
			'item_id' => $_GET["id"],
			'item_name' => $_GET['name'],
			'item_price' => $_GET['price'],
			'item_type' => $_GET['type']
		);
			$_SESSION["cart"][$count] = $item_array;
		}
		else
		{
			echo "<script>alert('Item Already Added!')</script>";
			echo "<script>window.location='index.php'</script>";
		}
	}
	else
	{

		$item_array = array(
			'item_id' => $_GET["id"],
			'item_name' => $_GET['name'],
			'item_price' => $_GET['price'],
			'item_type' => $_GET['type']
		);
		$_SESSION["cart"][0] = $item_array;

	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] ==  "delete")
	{
		foreach ($_SESSION["cart"] as $key => $value) {
			if($value["item_id"] ==  $_GET["id"])
			{
				unset($_SESSION["cart"][$key]);
				echo "<script>alert('Item Removed!')</script>";
				echo "<script>window.location='index.php?#ViewCart'</script>";
			}
		}
	}
}

$sqlst = "SELECT * FROM ingredients WHERE type = 'Sandwich Type'";

$resultst = mysqli_query($connect, $sqlst);

$json_arrayst = array();


while($rowst = mysqli_fetch_assoc($resultst)){
	$json_arrayst[] = $rowst;
}

$sqlbread = "SELECT * FROM ingredients WHERE type = 'Bread'";

$resultbread = mysqli_query($connect, $sqlbread);

$json_arraybread = array();


while($rowbread = mysqli_fetch_assoc($resultbread)){
	$json_arraybread[] = $rowbread;
}

$sqlcheese = "SELECT * FROM ingredients WHERE type = 'Cheese'";

$resultcheese = mysqli_query($connect, $sqlcheese);

$json_arraycheese = array();


while($rowcheese = mysqli_fetch_assoc($resultcheese)){
	$json_arraycheese[] = $rowcheese;
}

$sqlveggies = "SELECT * FROM ingredients WHERE type = 'Veggies'";

$resultveggies = mysqli_query($connect, $sqlveggies);

$json_arrayveggies = array();


while($rowveggies = mysqli_fetch_assoc($resultveggies)){
	$json_arrayveggies[] = $rowveggies;
}

$sqlsauce = "SELECT * FROM ingredients WHERE type = 'Sauce'";

$resultsauce = mysqli_query($connect, $sqlsauce);

$json_arraysauce = array();


while($rowsauce = mysqli_fetch_assoc($resultsauce)){
	$json_arraysauce[] = $rowsauce;
}
?>

  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="#">Chip<small>N</small>Subs</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="#Custom" class="nav-link">Custom Sub</a></li>
	          <li class="nav-item cart"><a href="#ViewCart" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small><?php if(isset($_SESSION['cart'])){ echo count($_SESSION['cart']);}else{ echo '0';} ?></small></span></a></li>
	          <li class="nav-item"><a href="login.php" class="nav-link">Admin Login</a></li>
	        </ul>
	      </div>
		  </div>
	  </nav>

<section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url(images/bg_1.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            	<span class="subheading">Welcome</span>
              <h1 class="mb-4">The Best Submarine Sandwich Experience</h1>
              <p><a href="#Custom" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Customize your Sub</a></p>
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url(images/bg_2.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            	<span class="subheading">Welcome</span>
              <h1 class="mb-4">Amazing Taste &amp; Beautiful Place</h1>
              <p><a href="#Custom" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Customize your Sub</a></p>
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url(images/bg_3.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            	<span class="subheading">Welcome</span>
              <h1 class="mb-4">Served just the way you like</h1>
              <p><a href="#Custom" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Customize your Sub</a></p>
            </div>

          </div>
        </div>
      </div>
    </section>    

	<section class="ftco-menu" id="Custom">
      <div class="container">
    	<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Customize Your Sub</span>
            <h2 class="mb-4">Choose what you want</h2>
            <p>to be on your sandwich</p>
          </div>
        </div>
    		<div class="row d-md-flex">
	    	  <div class="col-lg-12 ftco-animate p-md-5">
		    	<div class="row">
		          <div class="col-md-12 nav-link-wrap mb-5">
		            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		              <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Sandwich Type</a>

		              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Bread</a>

		              <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Cheese</a>

		              <a class="nav-link" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false">Veggies</a>

		              <a class="nav-link" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false">Sauce</a>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex align-items-center">
		            
		            <div class="tab-content ftco-animate" id="v-pills-tabContent">

		              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
		              	<div class="row">
		              		<?php for($x=0;$x<count($json_arrayst);$x++){?>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<div class="text">
		              				<form method="post" action="index.php?action=add&id=<?php echo $json_arrayst[$x]['id']. "&name=" .$json_arrayst[$x]['name']. "&price=" .$json_arrayst[$x]['price']. "&type=" .$json_arrayst[$x]['type']. "&#Custom" ; ?>">
		              					<h3><?php echo $json_arrayst[$x]['name']; ?></h3>
		              					<p class="price"><span>₱<?php echo number_format($json_arrayst[$x]['price'], 2); ?></span></p>
		              					<p><input class="btn btn-primary btn-outline-primary" type="submit" value="Add to Cart" name="add_to_cart" /></p>
		              				
		              				</form>
		              				</div>
		              			</div>
		              		</div>
		              		<?php } ?>
		              	</div>
		              </div>

		              <div class="tab-pane fade show" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
		                <div class="row">
		              		<?php for($x=0;$x<count($json_arraybread);$x++){?>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<div class="text">
		              				<form method="post" action="index.php?action=add&id=<?php echo $json_arraybread[$x]['id']. "&name=" .$json_arraybread[$x]['name']. "&price=" .$json_arraybread[$x]['price']. "&type=" .$json_arraybread[$x]['type']. "&#Custom" ; ?>">
		              					<h3><?php echo $json_arraybread[$x]['name']; ?></h3>
		              					<p class="price"><span>₱<?php echo number_format($json_arraybread[$x]['price'], 2); ?></span></p>
		              					<p><input class="btn btn-primary btn-outline-primary" type="submit" value="Add to Cart" name="add_to_cart" /></p>
		              				
		              				</form>
		              				</div>
		              			</div>
		              		</div>
		              		<?php } ?>
		              	</div>
		              </div>

		              <div class="tab-pane fade show" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
		              	<div class="row">
		              		<?php for($x=0;$x<count($json_arraycheese);$x++){?>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<div class="text">
		              				<form method="post" action="index.php?action=add&id=<?php echo $json_arraycheese[$x]['id']. "&name=" .$json_arraycheese[$x]['name']. "&price=" .$json_arraycheese[$x]['price']. "&type=" .$json_arraycheese[$x]['type']. "&#Custom" ; ?>">
		              					<h3><?php echo $json_arraycheese[$x]['name']; ?></h3>
		              					<p class="price"><span>₱<?php echo number_format($json_arraycheese[$x]['price'], 2); ?></span></p>
		              					<p><input class="btn btn-primary btn-outline-primary" type="submit" value="Add to Cart" name="add_to_cart" /></p>
		              				
		              				</form>
		              				</div>
		              			</div>
		              		</div>
		              		<?php } ?>
		              	</div>
		              </div>

		              <div class="tab-pane fade show" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
		              	<div class="row">
		              		<?php for($x=0;$x<count($json_arrayveggies);$x++){?>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<div class="text">
		              				<form method="post" action="index.php?action=add&id=<?php echo $json_arrayveggies[$x]['id']. "&name=" .$json_arrayveggies[$x]['name']. "&price=" .$json_arrayveggies[$x]['price']. "&type=" .$json_arrayveggies[$x]['type']. "&#Custom" ; ?>">
		              					<h3><?php echo $json_arrayveggies[$x]['name']; ?></h3>
		              					<p class="price"><span>₱<?php echo number_format($json_arrayveggies[$x]['price'], 2); ?></span></p>
		              					<p><input class="btn btn-primary btn-outline-primary" type="submit" value="Add to Cart" name="add_to_cart" /></p>
		              				
		              				</form>
		              				</div>
		              			</div>
		              		</div>
		              		<?php } ?>
		              	</div>
		              </div>

		              <div class="tab-pane fade show" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab">
		              	<div class="row">
		              		<?php for($x=0;$x<count($json_arraysauce);$x++){?>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<div class="text">
		              				<form method="post" action="index.php?action=add&id=<?php echo $json_arraysauce[$x]['id']. "&name=" .$json_arraysauce[$x]['name']. "&price=" .$json_arraysauce[$x]['price']. "&type=" .$json_arraysauce[$x]['type']. "&#Custom" ; ?>">
		              					<h3><?php echo $json_arraysauce[$x]['name']; ?></h3>
		              					<p class="price"><span>₱<?php echo number_format($json_arraysauce[$x]['price'], 2); ?></span></p>
		              					<p><input class="btn btn-primary btn-outline-primary" type="submit" value="Add to Cart" name="add_to_cart" /></p>
		              				
		              				</form>
		              				</div>
		              			</div>
		              		</div>
		              		<?php } ?>
		              	</div>
		              </div>

		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
      </div>
    </section>

    <section class="ftco-section ftco-cart" id="ViewCart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>Item</th>
						        <th>Type</th>
						        <th>Price</th>
						      </tr>
						    </thead>
						    <?php 
						    	$total='0';
						    if(!empty($_SESSION['cart']))
						    {
						    	foreach ($_SESSION['cart'] as $key => $value) {
						    ?>
						    <tbody>
						      <tr class="text-center">
						        <td class="item-remove"><a href="index.php?action=delete&id=<?php echo $value['item_id']; ?>"><span class="icon-close"></span></a></td>
						        
						        
						        <td class="item-name">
						        	<?php echo $value['item_name']; ?>
						        </td>

						        <td class="item-type">
						        	<?php echo $value['item_type']; ?>
						        </td>
						        
						        <td class="price"><?php echo number_format($value['item_price'],2); ?></td>
						      </tr><!-- END TR-->
						  	<?php
						  		$total = $total + $value['item_price'];

						  		}
						  	}
						  	?>
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Total:</h3>
    					<hr>
    					<p class="d-flex total-price">
    						<span>₱<?php echo number_format($total,2); ?></span>
    					</p>
    				</div>
    				<p class="text-center"><input type="button" class="btn btn-primary py-3 px-4" data-toggle="modal" data-target="#Checkout" value="Proceed to Checkout" /></p>
    			</div>
    		</div>
			</div>

			<div id="Checkout" class="modal fade" role="dialog">
			  <div class="modal-dialog">
			    <div class="modal-content">
         		 <div class="col-xl-12 ftco-animate">
						<form action="checkoutorder.php" method="post" class="billing-form ftco-bg-dark p-3 p-md-5">
								<h3 class="mb-4 billing-heading">Billing Details</h3>
	          		<div class="row align-items-end">
	          			<div class="col-md-6">
	            	    <div class="form-group">
	            	    	<label for="firstname">First Name</label>
	            	      <input type="text" class="form-control" name="firstname" required>
	            	    </div>
	        	      </div>
	        	      <div class="col-md-6">
	        	        <div class="form-group">
	        	        	<label for="lastname">Last Name</label>
	        	          <input type="text" class="form-control" name="lastname" required>
	        	        </div>
            	    </div>

		        	  <div class="col-md-12">
	            	    <div class="form-group">
	            	    	<label for="phone">Phone</label>
	            	      <input type="text" class="form-control" name="phoneno" required>
	            	    </div>
	            	  </div>
	            	</div>

	          		<div class="row mt-5 pt-3 d-flex">
	          			<div class="col-md-12 d-flex">
	          				<div class="cart-detail cart-total ftco-bg-dark p-3 p-md-4">
	          					<h3 class="billing-heading mb-4">Cart Total</h3>
	          				<?php
	          				$yeah = "";
							if(!empty($_SESSION['cart']))
						    {
						    	foreach ($_SESSION['cart'] as $key => $value) { 
						    		if($yeah!="")
						    		{
						    			$yeah = $yeah . ", ";
						    		}
						    $yeah = $yeah . $value['item_name'] . " - " . $value['item_type'] ; 
									}
						  	} 

						  	echo $yeah;
						  	?>
						  	<input type="hidden" value="<?php echo $yeah; ?>" name="orderdetails">
	          							<hr>
		    						<p class="d-flex total-price">
		    							<span>Total</span>
			    						<span>₱<?php echo number_format($total,2); ?></span>
			    					</p>
							</div>
	    		      	</div>
	    		     </div>
        		<div class="modal-footer">
	    		   <input type="submit" class="btn btn-primary py-3 px-4" value="Checkout" name="checkout_order"/>
	    		   <input type="button" class="btn btn-primary py-3 px-4" data-dismiss="modal" value="Close" />
	    		</div>
        		 </div>
        		</form>
        		</div>
    	    	</div>
    	    </div>
    	</div>
		</section>

   
<footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About Us</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Recent Blog</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
             <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Cooked</a></li>
                <li><a href="#" class="py-2 d-block">Deliver</a></li>
                <li><a href="#" class="py-2 d-block">Quality Foods</a></li>
                <li><a href="#" class="py-2 d-block">Mixed</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><a href="#"><span class="icon icon-map-marker"></span><span class="text">187 A Street, Batangas City</span></a></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+369238492012</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">chipnsubs@email.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

