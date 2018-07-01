<?php
session_start();
$_SESSION["score2"] = 0;
$_SESSION["score3"] = 0;
$_SESSION["score"] = 0;
$_SESSION["name"] = "";

?>



<html>
<head>
    <title>English learning</title>
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link rel="manifest" href="manifest.json">
<link rel="stylesheet" type="text/css" href="style.css">
 <style type = "text/css">

    .text-container {
      padding-top: 20px;
      background-color: black;
      padding-bottom: 20px;
      margin: 40px!important;
    }

    .text-container h1{
        font-size: 200px;
        color: rgb(225, 225, 225, .1);
        background-image: url(edImage.jpg);
        background-repeat: repeat-x;
        -webkit-background-clip: text;
        animation: animate 45s linear infinite;
margin: 20px!important;
    }

    .text-container h2 {
        font-size: 60px;

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
	font-family: verdana;
    }
</style>
</head>
<body>
 <div class = "text-container">
        <h1>EDUCOMX</h1>
<form action="" method="post">
<center>
<input class="username" type="text" name="name" placeholder="enter your name">
</br>
<input class="submit" type="submit" value="start">
</center>
</form>
</br>
</div>
</body>
</html>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$name = $_POST['name'];
require("connect.php");
$connection = mysqli_connect($server, $username, $password, $database);
if (!$connection){
	die("not connected:" . mysqli_connect_error());
}

$sql = "SELECT * FROM `users` WHERE `name` = '" . $name . "'";
$result = $connection->query($sql);
if(mysqli_num_rows($result) > 0) {
while($row = $result->fetch_assoc()){
	$_SESSION["score"] = $row['score'];
	$_SESSION["score2"] = $row['score2'];
	$_SESSION["score3"] = $row['score3'];
	$_SESSION["name"] = $row['name'];
}
}
else {
	$sql2 = "INSERT INTO `users` (`name`, `score`, `score2`, `score3`) VALUE ('" . $name . "', 0, 0, 0)";
	mysqli_query($connection, $sql2);
	$_SESSION["score"] = 0;
	$_SESSION["score2"] = 0;
	$_SESSION["score3"] = 0;
	$_SESSION["name"] = $name;
}
echo '<script type="text/javascript">window.location = "index2.php"</script>';
}

?>