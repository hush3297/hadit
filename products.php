<!doctype html>
<html lang="en">
  <head>
  <?php 
  session_start();
  //Adding stuff to cart.
  if (isset($_GET["cart"])) {
    if ($_SESSION["user"]) { //if logged in
      if (isset($_SESSION['cart']) and $_SESSION['cart'] == "") {
        $_SESSION['cart'] = array();
      }
      if (is_array($_SESSION['cart'])) {
        array_push($_SESSION['cart'],$_GET["val"]);
      } else {
        $_SESSION['cart'] = array();
        array_push($_SESSION['cart'],$_GET["val"]);
      }
    } else { // if not logged in
      header("refresh:0;url=signup.php");
    } 
  }
  ?>
    <title>HadIT</title>
    <link rel="icon" type="image/x-icon" href="App Imgs/icon.jpg">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

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
</head>
<body style="background-color:blue;">      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <!--Navbar-->
    <nav class="autohide navbar navbar-nav mx-auto navbar-expand-lg navbar navbar-dark bg-secondary"> 
    <br>
    <div class="container-fluid">
    <a class="navbar-nav navbar-inner" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="search.php?Query=Computers">Computers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="search.php?Query=Monitors">Monitors</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle nav-link active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            PC Parts
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="search.php?Query=Computers">Motherboards</a></li>
            <li><a class="dropdown-item" href="search.php?Query=CPU">CPU's</a></li>
            <li><a class="dropdown-item" href="search.php?Query=Graphics Cards">Graphics Cards</a></li>
            <li><a class="dropdown-item" href="search.php?Query=RAM">RAM</a></li>
            <li><a class="dropdown-item" href="search.php?Query=Power Supplies">Power Supplies</a></li>
            <li><a class="dropdown-item" href="search.php?Query=SSD's">SSD's</a></li>
            <li><a class="dropdown-item" href="search.php?Query=Cases">Cases</a></li>
          </ul>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="search.php?Query=Hard Drives">Hard Drives</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="search.php?Query=Keyboards">Keyboards</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="search.php?Query=Mouses">Mouses</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="search.php?Query=Games">Games</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
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
<!--Product Display Here-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<?php
$link = mysqli_connect("localhost", "root", "", "hadit");
if($link === false){
  $link = mysqli_connect("sql307.epizy.com", "epiz_32297569", "Y9DmtWpDKFE", "epiz_32297569_hadit");
}
$sql = "SELECT * FROM products";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        if ($_GET["val"] == $row['Items']){
          //Images, Price, etc.
          echo '<div style="display:inline-block;vertical-align:top;margin: 35px;">';
          echo '<img src="Stock Images/' . $row['Items'] . '.png" alt="Product Img" height=300 width=400>';
          echo "</div>";
          echo '<div style="display:inline-block;margin: 35px;color:white">';
          if (strlen($row['Items']) >= 20) {
            echo "<h3>" . $row['Items'] . "</h3>";
          } else {
            echo "<h1>" . $row['Items'] . "</h1>";
          }
          echo "<p>Product ID: " . $row['ID'] . "</p>";
          if ($row['Sale Tag']=="Yes"){
            echo '<img src="App Imgs/Sale.png" alt="Sale Banner" height=50 width=200>';
            if(substr($row['Sale Price'], 0, 1) == "-"){
              $percentage = substr($row['Sale Price'], 1, 10);
              $Price = $row['Price'] - (($percentage / 100) * $row['Price']);
            } else { //if sale price not a percentage
              $Price = $row['Sale Price'];
            }
            echo '<h1><strike>$' . $row['Price'] . '</strike> $' . $Price.'</h1>';
          } else { //No Sale Price
            echo '<h1>$' . $row['Price'] . '</h1>';
          }
          echo "<br><br>";
          echo '<a href="products.php?val=' . $row['Items'] . '&cart=1" type="button" class="btn btn-dark">Add To Cart</a>'; 
          echo "</div>";
          //Description, Details, Reviews
          echo "<br><br><br>";
          echo '<div id="accordion" style="width: 60%;margin-left: 50px;">';
          //!!Descriptions
          echo '<div class="card bg-secondary">';
          echo '<div class="card-header bg-dark" id="headingOne">';
          echo '<h5 class="mb-0">';
          echo '<button class="btn btn-link bg-dark text-white" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Description</button>';
          echo '</h5>';
          echo '</div>';
          echo '<div id="collapseOne" class="collapse show bg-secondary" aria-labelledby="headingOne" data-parent="#accordion">';
          echo '<div class="card-body bg-secondary text-white">' . $row['Description'] . '</div>';
          echo '</div>';
          echo '</div>';
          //!!!Details
          echo '<div class="card bg-secondary">';
          echo '<div class="card-header bg-dark" id="headingTwo">';
          echo '<h5 class="mb-0">';
          echo '<button class="btn btn-link collapsed bg-dark text-white" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Details</button>';
          echo '</h5>';
          echo '</div>';
          echo '<div id="collapseTwo" class="collapse bg-secondary text-white" aria-labelledby="headingTwo" data-parent="#accordion">';
          $CtxDetails = explode("|", $row['Details']);
          echo '<div class="card-body bg-secondary">';
          foreach($CtxDetails as $i => $item) {
            echo "<li>" . $item . "</li>";
          }
          echo '</div>';
          echo '</div>';
          echo '</div>';
          //!!Reviews
          echo '<div class="card bg-secondary">';
          echo '<div class="card-header bg-dark" id="headingThree">';
          echo '<h5 class="mb-0">';
          echo '<button class="btn btn-link collapsed bg-dark text-white" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Reviews</button>';
          echo '</h5>';
          echo '</div>';
          echo '<div id="collapseThree" class="collapse bg-secondary" aria-labelledby="headingThree" data-parent="#accordion">';
          $CtxReviews = explode("|", $row['Reviews']);
          echo '<div class="card-body bg-secondary">';
          foreach($CtxReviews as $i => $item) {
            if ($item != "null") {
              echo '<div class="card-body bg-secondary text-white">' . $item . "</div>";
            } else {
              echo '<div class="card-body bg-secondary text-white">There are currently no reviews for this product.</div>';
            }
          }
          echo '<a class="btn btn-floating m-1 text-dark bg-info" href="review.php?val=' . $row['Items'] . '" role="button">Leave a review!</a>'; //if account logged in create review
          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo "<br><br><br><br>";
        }
      }
    }
  }
//Close Connection
mysqli_close($link);
?>
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
      <p>This is a school project made by Jake Taylor. This website is not meant to be taken seriously, I just like to put alot of effort into this. If You're looking for to access the code used to made this site <a href="https://github.com/">click here.</a> Please use at your own free will. Thank you Mr. Benson for providing me with the extra resources to make this website possible.</p>
    </section>

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    No copyright cause this is a school project
  </div>
</footer>
</body>
</html>