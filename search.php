<!doctype html>
<html lang="en">
  <head>
    <?php session_start();?>
    <title>HadIT</title>
    <link rel="icon" type="image/x-icon" href="App Imgs/icon.jpg">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
<!--Item Selection-->
<div class="card-deck m-5 pb-5">
<?php
$link = mysqli_connect("us-cdbr-east-06.cleardb.net", "b836d0ed61a62f", "d373230c", "heroku_ad6aee6d6d22c9b");
if($link === false){
  $link = mysqli_connect("localhost", "root", "", "hadit");
}
$sql = "SELECT * FROM products";
$i = 0;
$Count =0;

$query = $_GET['Query']; 
$query = htmlspecialchars($query); 
$query = mysqli_real_escape_string($link, $query);
$raw_results = mysqli_query($link, "SELECT * FROM `products` WHERE `Items` LIKE '%". $query . "%' OR `Description` LIKE '%". $query . "%' OR `Category` LIKE '%". $query . "%' OR `Details` LIKE '%". $query . "%'");
if ($raw_results != False) {
  if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
    while($row = mysqli_fetch_array($raw_results)){
      if ($i == 4){
        echo "</div>";
        echo '<div class="card-deck m-5 pb-5">';
        $i = 0;
      }
      echo '<div class="card" style="width: 18rem;">';
      if ($row['Sale Tag']=="Yes"){
        echo '<img class="card-img-top" src="App Imgs/Sale.png" alt="Card image cap" height=50>';
      } else {
        echo '<img class="card-img-top" src="App Imgs/Blank Text.png" alt="Card image cap" height=50>';
      }
      echo '<img class="card-img-top" src="Stock Images/' . $row['Items'] . '.png" alt="Card image cap" height=200>';
      echo '<div class="card-body">';
      echo '<h5 class="card-title">' . $row['Items'] . '</h5>';
      if (strlen($row['Description']) >= 140) {
          $Replace = substr($row['Description'], 140, 300);
          $ItemDes = str_replace($Replace, "...", $row['Description']);
      } else {
        $ItemDes = $row['Description'];
      }
      echo '<p class="card-text">' . $ItemDes . '</p>';
      echo '</div>';
      echo '<div class="card-footer">';
      if ($row['Sale Tag']=="Yes"){
        if(substr($row['Sale Price'], 0, 1) == "-"){
          $percentage = substr($row['Sale Price'], 1, 10);
          $Price = $row['Price'] - (($percentage / 100) * $row['Price']);
        } else { //if sale price not a percentage
          $Price = $row['Sale Price'];
        }
        echo '<small class="text-muted"><strike>$' . $row['Price'] . '</strike> <b>$' . $Price.'</b></small>';
      } else { //No Sale Price
        echo '<small>$' . $row['Price'] . '</small>';
      }
      echo '<a href="products.php?val='. $row['Items'] . '" class="btn btn-primary float-right">Buy Now</a>';
      echo '</div>';
      echo '</div>';
      $i += 1;
    }
    //if a full card row is not complete
    while ($i <= 4) {
      if ($i == 4) {
        echo "</div>";
      } else {
        echo '<div class="card border-0" style="width: 18rem;background-color:blue;">';
        echo '<img class="card-img-top" src="App Imgs/Blue Square.png" alt="Card image cap" height=50>';
        echo '<img class="card-img-top" src="App Imgs/Blue Square.png"" alt="Card image cap" height=200>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title"></h5>';
        echo '<p class="card-text"></p>';
        echo '</div>';
        echo '</div>';
      }
      $i += 1;
    }
  }
}
//Close Connection
mysqli_close($link);
?>
</div>
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