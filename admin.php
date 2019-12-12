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
include('dbcon.php');

if(isset($_POST['editingredient']))
{
	$name = $_POST['name'];
	$type = $_POST['type'];
	$price = $_POST['price'];
	$id = $_POST['id'];
	$sqledit = "UPDATE Ingredients SET name = '$name', type = '$type', price = '$price' WHERE id = '$id'";
	mysqli_query($connect,$sqledit);
}

if(isset($_POST['login'])){
 $username = mysqli_real_escape_string($connect, $_POST['username']);
 $password = mysqli_real_escape_string($connect, $_POST['password']);

    $password = sha1($password);
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $results = mysqli_query($connect, $query);
    if (mysqli_num_rows($results) == 1) {

      session_start();

    }
    else{
      array_push($errors, "Wrong username/password combination");
      header('location: login.php');
    }
}

    $sql = "SELECT * FROM ingredients";
    $sqlresult = mysqli_query($connect, $sql);

    $json_array1 = array();


while($row1 = mysqli_fetch_assoc($sqlresult)){
	$json_array1[] = $row1;
}
    $sql2 = "SELECT * FROM orders";
    $sqlresult2 = mysqli_query($connect, $sql2);

    $json_array2 = array();


while($row2 = mysqli_fetch_assoc($sqlresult2)){
	$json_array2[] = $row2;
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
	          <li class="nav-item active"><a href="#Ingredients" class="nav-link">Ingredients</a></li>
	          <li class="nav-item"><a href="#Orders" class="nav-link">Orders</a></li>
	          <li class="nav-item"><a href="index.php" class="nav-link">Log Out</a></li>
	        </ul>
	      </div>
		  </div>
	  </nav>


	  
		<section class="ftco-section ftco-cart" id="Ingredients">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						      	<th>ID</th>
						        <th>Name</th>
						        <th>Type</th>
						        <th>Price</th>
						        <th>&nbsp;</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr class="text-center">
						      	<?php for($x=0;$x<count($json_array1);$x++){?>
						      	<form action="admin.php" method="post" class="billing-form ftco-bg-dark">
						        <td class="id text-center"><?php echo $json_array1[$x]['id']; ?>
						        	<input type="hidden" value="<?php echo $json_array1[$x]['id']; ?>" name="id">
						        </td>
						        
						        <td class="name text-center"><input type="text" value="<?php echo $json_array1[$x]['name']; ?>" name="name" /></td>
						        
						        <td class="type text-center"><input type="text" value="<?php echo $json_array1[$x]['type']; ?>" name="type" /></td>
						        
						        <td class="price text-center"><input type="text" value="<?php echo $json_array1[$x]['price']; ?>" name="price" /></td>
						        
						        <td class="edit text-center"><input class="btn btn-primary py-3 px-4" type="submit" value="Edit" name="editingredient" /></td>
						    	</form>

						      </tr>
		              		<?php } ?>
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		</div>
			</div>
		</section>

   		
   		<section class="ftco-section ftco-cart" id="Orders">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						      	<th>Order ID</th>
						        <th>Ordered By</th>
						        <th>Phone No</th>
						        <th>Order Details</th>
						        <th>Total Price</th>
						        <th>Order Date</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr class="text-center">
						      	<?php for($x=0;$x<count($json_array2);$x++){?>
						        <td class="id text-center"><?php echo $json_array2[$x]['orderid']; ?></td>
						        <td class="id text-center"><?php echo $json_array2[$x]['firstname'] . ' ' . $json_array2[$x]['lastname']; ?></td>
						        <td class="id text-center"><?php echo $json_array2[$x]['phoneno']; ?></td>
						        <td class="id text-center"><?php echo $json_array2[$x]['orderdetails']; ?></td>
						        <td class="id text-center"><?php echo $json_array2[$x]['totalprice']; ?></td>
						        <td class="id text-center"><?php echo $json_array2[$x]['ordertime']; ?></td>
						        
						        

						      </tr>
		              		<?php } ?>
						    </tbody>
						  </table>
					  </div>
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

