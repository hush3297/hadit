<!doctype html>
<html lang="en">
  <head>
  <?php session_start();
  if ($_SESSION["user"] == "") {
    header('Location: signup.php'); 
  }  
  ?>
    <title>HadIT</title>
    <link rel="icon" type="image/x-icon" href="App Imgs/icon.jpg">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!--Redirect-->
  <?php
  ob_start();
  if (isset($_GET["Query"])){
    header('Location: search.php?Query='. $_GET["Query"] . ''); /* Redirect browser */
   }
  ?>

<style type="text/css">
	.autohide{
		position: fixed;
	    top: 0;
	    right: 0;
	    left: 0;
	    width: 100%;
	    z-index: 1030;
	}
	.scrolled-down{
		transform:translateY(-100%); transition: all 0.3s ease-in-out;
	}
	.scrolled-up{
		transform:translateY(0); transition: all 0.3s ease-in-out;
	}

</style>
<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function(){
		
		el_autohide = document.querySelector('.autohide');
		
		// add padding-top to bady (if necessary)
		navbar_height = document.querySelector('.navbar').offsetHeight;
		document.body.style.paddingTop = navbar_height + 'px';

		if(el_autohide){
			
			var last_scroll_top = 0;
			window.addEventListener('scroll', function() {
	       		let scroll_top = window.scrollY;
		       if(scroll_top < last_scroll_top) {
		            el_autohide.classList.remove('scrolled-down');
		            el_autohide.classList.add('scrolled-up');
		        }
		        else {
		            el_autohide.classList.remove('scrolled-up');
		            el_autohide.classList.add('scrolled-down');
		        }
		        last_scroll_top = scroll_top;

			}); 
			// window.addEventListener

		}
		// if
		
	}); 
	// DOMContentLoaded  end
</script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</head>
<body style="background-color:blue;">      
<!--Header-->
<nav class="navbar navbar-light bg-dark fixed-top">
  <div class="container-fluid">
      <a class="navbar-item" href="index.php">
          <img src="App Imgs/HadIT Logo.png" s width="180" height="75" class="d-inline-block align-top float-left" alt="">
      </a>
      <!--Search Bar-->
      <div class="mx-auto">
      <form method="get" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <input class="form-control me-2 my-auto" type="search" placeholder="Search" aria-label="Search" name="Query" width=400px>
      </form>
      </div>
      <!--Username-->
      <a class="navbar-brand my-auto text-primary " href="signup.php"><?php if ((isset($_SESSION["user"]))) {echo $_SESSION["user"];} else {echo "Login/Sign Up";}?></span></a>
      <a class="navbar-brand my-auto " href="cart.php"> 
        <img src="App Imgs/Cart.png" alt="" width=75px height=75px>
        <?php 
        if (isset($_SESSION["cart"]) and $_SESSION["cart"] != "") {
          $CartCount = count($_SESSION["cart"]);
          echo '<span class="position-absolute top-1 start-40 translate-middle badge rounded-pill bg-danger">' . $CartCount;
          echo '<span class="visually-hidden">unread messages</span>';
          echo '</span>';
        }
        ?>
      </a>
  </div>
</nav>
<!--Review Content-->
<br><br><br>
<center>
<div class="card" style="width: 300px;">
    <div class="card-body">
        <h4 class="card-title">Leave a review!</h4>
        <p><?php echo $_GET["val"];?></p>
        <form action= "" method="post">
        <div class="form-group">
            <textarea class="form-control" rows="3" name="ReviewField" id="ReviewField"></textarea>
        </div>
        <button type="submit" name="button" value="Submit" class="btn btn-success">Submit</button>
        <a href="<?php echo "products.php?val=" . $_GET["val"]; ?>" type="button" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</div>
</center>
<?php
    if (isset($_POST['ReviewField'])) {
        $link = mysqli_connect("localhost", "root", "", "hadit");
        if($link === false){
        $link = mysqli_connect("sql307.epizy.com", "epiz_32297569", "Y9DmtWpDKFE", "epiz_32297569_hadit");
        }
        $sql = "SELECT * FROM products";
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                  if ($_GET["val"] == $row["Items"]){
                    $ID = $row["ID"];
                    $CurReviews = $row['Reviews'];
                  }
                }
            }
        }
        if ($CurReviews != "null") {
            $NewReview = $CurReviews . "|" . $_SESSION['user'] . ": " . $_POST['ReviewField'];
            $sql = "UPDATE `products` SET `Reviews` = REPLACE(`Reviews`, '" . $CurReviews. "', '" . $NewReview . "') WHERE `Reviews` LIKE '%" . $CurReviews ."%'";
        } else {
            $NewReview = $_SESSION['user'] . ": " . $_POST['ReviewField'];
            $sql = "UPDATE products SET Reviews='$NewReview' WHERE id=$ID";
        }
        $results = mysqli_query($link, $sql);        

        // Close connection
        mysqli_close($link);

        //reroute to previous page //products.php?val=' . $_GET["val"]
        header("refresh:1;url=products.php?val=" . $_GET["val"]);
    }
  ?>
<br><br><br><br><br><br><br>
<!--Footer-->
<!--Social Media-->
<footer class="bg-dark text-center text-white">
  <div class="container p-4 pb-0">
    <section class="mb-4">
    <a class="btn btn-floating m-1" href="#!" role="button">
        <img src="App Imgs/Social Media/facebook.png"></img>
    </a>
    <a class="btn btn-floating m-1" href="#!" role="button">
        <img src="App Imgs/Social Media/youtube.png"></img>
    </a>
      <a class="btn btn-floating m-1" href="#!" role="button">
        <img src="App Imgs/Social Media/instagram.png"></img>
    </a>
    <a class="btn btn-floating m-1" href="#!" role="button">
        <img src="App Imgs/Social Media/twitter.png"></img>
    </a>
    </section>
  </div>
  <!-- Section: Text -->
  <section class="mb-4">
  <p>This is a school project made by Jake Taylor. This website is not meant to be taken seriously, I just like to put alot of effort into this. If You're looking for to access the code used to made this site <a href="https://github.com/hush3297/hadit">click here.</a> Please use at your own free will. Thank you Mr. Benson for providing me with the extra resources to make this website possible.</p>
    </section>

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    No copyright cause this is a school project
  </div>
</footer>
</body>
</html>
