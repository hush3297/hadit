<?php require("login.class.php") ?>
<?php 
	if(isset($_POST['submit'])){
		$user = new LoginUser($_POST['username'], $_POST['password']);
	}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>HadIT</title>
    <link rel="icon" type="image/x-icon" href="App Imgs/icon.jpg">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

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

  .carousel-inner img {
  margin: auto;
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

	function showpassword() {
		var x = document.getElementById("password");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}
</script>
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
<!--Breaks to make page look nice-->
<br><br><br><br><br>
<!--Log in form-->
<center>
<div class="card" style="width: 300px;background-color:white;">
  <div class="card-body">
  <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
		<h2>Login</h2>
		<label>Username</label>
		<br>
		<input type="text" name="username">
		<br>
		<label>Password</label>
		<br>
		<input type="password" id="password" name="password">
		<br><br>
		<input type="checkbox" onclick="showpassword()"> Show Password
		<br><br>
		<button type="submit" name="submit">Log in</button>
		<p class="error"><?php echo @$user->error ?></p>
		<p class="success"><?php echo @$user->success ?></p>
		<a href="signup.php">Not a member? Sign Up!</a>
	</form>
  </div>
</div>
</center>
<!--Breaks to make page look nice-->
<br><br><br><br><br>
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