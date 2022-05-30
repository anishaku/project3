<?php

session_start();
if(!empty($_SESSION['username'])){
  header("Location: index.php");
}
date_default_timezone_set("Asia/Kolkata");

  $error="";
  $psuccess=0;

    if(!empty($_POST)){
      $username = $_POST['username'];
        if($username==""){
            $error.="<li>Please Enter Your Username</li>";
        }
      $email = $_POST['email'];
        if($email==""){
            $error.="<li>Enter Your Email ID</li>";
        } 
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $error.="<li>Invalid Email-ID</li>";
        }

     
      $password = $_POST['password'];
        if($password==""){
            $error.="<li>Please Enter Your Password</li>";
        }
  
      

      else
      {

        include_once("connection.php");
        $password=md5($password); //encrypted
        //$password=sha1($password); 
        //$password=hash('md5',$password); //md5 or sha256 or crc32b

        $sql = "SELECT username FROM users WHERE username='".$username."'";
        $result = mysqli_query($con,$sql) ;
          if (mysqli_num_rows($result) > 0) 
          {
            echo "<div class='alert alert-danger'> Username already exist! Please try some other name.. </div>";
          } 
          else 
          {
            $sql= "INSERT INTO users
            (username,email,password,date)
            VALUES
            ('".$username."','".$email."','".$password."','".date("Y-m-d H:i:s")."')";

              if(mysqli_query($con,$sql))
              {
                $psuccess=1;
              }
              else
              {
                  echo"<div class='alert alert-danger'> Something went wrong! </div>";
              }
          }
       
      }
  
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <style type=text/css>
        span{
            color: red;
        }
    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comforter&family=Corinthia&family=Cormorant+Garamond:ital,wght@1,300&family=Estonia&family=Fuzzy+Bubbles&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comforter&family=Corinthia&family=Cormorant+Garamond:ital,wght@0,700;1,300&family=Estonia&family=Fuzzy+Bubbles&display=swap" rel="stylesheet">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>
    <title>Hello, world!</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comforter&family=Corinthia&family=Cormorant+Garamond:ital,wght@0,700;1,300&family=Estonia&family=Fuzzy+Bubbles&family=Pushster&display=swap" rel="stylesheet">
    </head>
  <body>
    <section class="rarea">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8 col-12">
            <a href="#">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;<i class="fa fa-phone"></i>&nbsp&nbsp;6203565472</a>&nbsp&nbsp&nbsp
            <a href="#"><i class="fa fa-envelope"></i>&nbsp&nbsp;handdrawing@gmail.com</a>
          </div>
          <div class="col-md-4 col-12">
            <i class="fa fa-sign-in"></i>&nbsp&nbsp;LOGIN&nbsp&nbsp&nbsp&nbsp;
            <i class="fa fa-user-plus"></i>&nbsp&nbsp;Sign Up&nbsp&nbsp&nbsp&nbsp;
            <i class="fa fa-shopping-cart"></i>&nbsp&nbsp;Cart&nbsp&nbsp&nbsp&nbsp;
            <i class="fa fa-heart"></i>
          </div>
        </div>
      </div>
    </section>
    <header class="toparea">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-4 col-12">
                  <h1><img src="img/t.png" alt="">HAND DRAWING</h1>
              </div>
              <div class="col-md-8 col-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item active">
                        <a class="nav-link" href="index.html"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="about.html"><i class="fa fa-paw"></i> About Us</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                          <i class="fa fa-paint-brush"></i> Our Colletion
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="acrylic.html">Arylic paintings</a>
                          <a class="dropdown-item" href="charcol.html">Charcol paintings</a>
                          <a class="dropdown-item" href="oil.html">Oil paintings</a>
                          <a class="dropdown-item" href="watercolor.html">Watercolour paintings</a>
                        </div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="gallery.html"><i class="fa fa-camera"></i> Gallary</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="contact.html"><i class="fa fa-phone"></i> Contact Us</a>
                      </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                  </div>
                </nav>
              </div>
          </div>
      </div>
  </header>
    <section>
      <div class="container">
        <div class="row">
          <div class="col top2">
              <?php

                    if($error!=""){
                                          
                      echo"<div class= 'alert alert-danger w-100'> <ul>";
                      echo "$error";
                      echo "</ul> </div>";
                    }
                    elseif($psuccess==1){
                      echo"<div class='alert alert-success'> Successfully Register </div>";
                           
                    }
                    else{
                      
                    }
                    echo "  <form action='".$_SERVER["PHP_SELF"]."' method='POST' name='reg' >
             <div class='row'>
               <div class='col top'>
                 <input type='text' name='username' class='form-control' placeholder='UserName'>
                 <span id='esname'></span>
               </div>
            </div>
            <input type='email' name='email' class='form-control' placeholder='Email'>
            <span id='eemail'></span>
            <input type='password' class='form-control' name='password' placeholder='Password'>
            <input type='password' class='form-control'  name='cpassword' placeholder='Confirm Password'>
             <button type='submit' class='btn1 btn-success'>Create account</button>
           </form>";
                    ?>
          
        </script>
           <p>Don"t have a account? <a href="sign.html">Signup</a></p>
          </div>
        </div>
      </div>
    </section>
  <footer>
 <section id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h3>MENU</h3>
					<ul class="list-unstyled quick-links">
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>HOME</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>ABOUT</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>OUR COLLECTION</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>CONTACT US</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h3>QUICK LINKS</h3>
					<ul class="list-unstyled quick-links">
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>REGISTER</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>TERMS AND CONDITIONS</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>PRIVACY POLICY</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h3>CONTACT US</h3>
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
			</div><br/><br/>
      <hr width="100%" color="gray"><br/>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<h5>Designed By : Anisha Kumari</p>
				</div>
				<hr>
			</div>
		</div>
	</section>
  </footer>
  <script src="wow.min.js"></script>
  <script>
    new WOW().init();
   </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  </body>
</html>
