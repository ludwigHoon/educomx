<?php 
session_start();
if ($_SESSION["name"] == ""){
header("Location: ../proto/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>English learning</title>
    <script src="../lib/score.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.min.css" rel="stylesheet">
    <script>
      let score = new Score();
      $( document ).ready(function() {
        if(score.scorecard()['score']<10){
         $('#chp1').attr('href', '#');
         $('#chp1').attr('onclick', 'alert("You don\'t have enough point")'); 
      }
      if(score.scorecard()['score']<20){
         $('#chp2').attr('href', '#');
         $('#chp2').attr('onclick', 'alert("You don\'t have enough point")'); 
      }
      if(score.scorecard()['score']<30){
         $('#chp3').attr('href', '#');
         $('#chp3').attr('onclick', 'alert("You don\'t have enough point")'); 
      }
      });
    </script>
     <style type = "text/css">

    .text-container {
      padding-top: 100px;
      background-color: black;
      padding-bottom: 50px;
    }

    .text-container h1{
        font-size: 200px;
        color: rgb(225, 225, 225, .1);
        background-image: url(edImage.jpg);
        background-repeat: repeat-x;
        -webkit-background-clip: text;
        animation: animate 45s linear infinite;
    }

    .text-container h2 {
        font-size: 60px;

    }

    .logout {
	position: relative;
	left: 100px;
	}

    .btn {
	padding-top: 10px!important;
	padding-bottom: 10px!important;
	margin-top: 15px!important;
	margin-right: 50px!important;
	}

        @keyframes animate {
            
            0% {
                background-position: left 0px top 10px;
            }
            40% {
                background-position: left 800px top 10px;
            }
        }

    .text-container{
        margin-top: 0;
        text-align: center;
    }
</style>
  </head>

  <body>
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
      <div class="container">
        <a class="navbar-brand logout" href="../proto/index.php">Sign Out</a>
       
        <div>
         <ul class="navbar-nav ml-auto">
            <li class="navbar-brand" style="text-transform: initial!important;">
            <?php  echo "<span style='font-weight: 400!important;'>Hey</span> <b>" . $_SESSION["name"] . "</b> :)";?>
            </li>
         </ul>
          <!-- <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Log In</a>
            </li>
          </ul>
        -->
        </div>
      </div>
    </nav>

      <div class = "text-container">
        <h1>EDUCOMX</h1>
         <a href="#chapters" class="btn btn-primary btn-xl rounded-pill mt-5">Let's start</a>
    </div>

     
<section id="chapters">
    
          
	  <?php 
		require("connect.php");
$connection = mysqli_connect($server, $username, $password, $database);
if (!$connection){
	die("not connected:" . mysqli_connect_error());
}

$sql = "SELECT * FROM `Sectiondetails`";
$result = $connection->query($sql);
$chaptercounter = 0;
$sectioncounter = 0;
while($row = $result->fetch_assoc()){
	++$sectioncounter;
	if(($sectioncounter % 2) == 0){echo ' <section style="background-color: rgb(187,190,193);">
      <div class="container">
        <div class="row align-items-center"><div class="col-lg-6 ">';} 
	else{echo '  <section>
      <div class="container">
        <div class="row align-items-center"><div class="col-lg-6 order-lg-2">';}
	echo '
            <div class="p-5">
                    <img class="img-fluid rounded-circle" src="contentreader/images/' . $sectioncounter .  '/'  . $row["Section_icon_src"] . '"
                    alt=""/>
		        </div>
          </div><div class="col-lg-6">
            <div class="p-5">
              <h2 class="display-4">' . $row["Section_name"] . '</h2>
	      <p>' . $row["Section_description"] . '</p>';
	      
		for($x = 0; $x < 4; $x++){
		$chaptercounter = $chaptercounter + 1 ;
		//completed
		if ($_SESSION['score']  >($chaptercounter - 1) ) {echo ' <br><a href="../proto/contentreader/chapter.php?chapter=' .   ($x + 1) . '&section=' .  $sectioncounter . '" class="btn btn-primary btn-xl rounded-pill mt-5">Chapter' . ($x + 1) . '</a><button style ="margin-top: 15px;" type="button" class="btn btn-success disabled">Completed</button>';}
		//not yet complete, can start
		elseif ($_SESSION['score']  >= ($chaptercounter -1 ) ){echo ' <br><a href="../proto/contentreader/chapter.php?chapter=' .   ($x + 1). '&section=' .  $sectioncounter . '" class="btn btn-primary btn-xl rounded-pill mt-5">Chapter' . ($x + 1)  . '</a><button style ="margin-top: 15px;" type="button" class="btn btn-warning disabled">Ready to play</button>';}
		//cannot start
		else {echo '<a href="../proto/contentreader/chapter.php?chapter=' .  ($x + 1) . '&section=' .  $sectioncounter . '" class="btn btn-primary btn-xl rounded-pill mt-5 disabled">Chapter' . ($x + 1)  . '</a><button style ="margin-top: 15px;" type="button" class="btn btn-danger disabled">Locked</button>';}
		echo '<br>';
		
		}
	     echo '</div>
          </div>
        </div>
      </div>
	      </section>';
}

	  
	  ?>

</section>
    <!-- Footer -->

    <!-- Bootstrap core JavaScript -->
    
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
