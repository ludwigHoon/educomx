
<html>
<head>
    <title>English learning</title>
    <link rel="manifest" href="manifest.json">
 <style>
 form {
	width: 100%;
 }
 input {
	padding: 10px;
	font-size: 14px;
	color: black;
	width: 80%;
	 display: block;
	 float: right;
	
 }
 h5 {
 display: inline;
	margin: 20px;
	padding: 5px;
	font-size: 18px;
 
 }
 
 .row {
 height: 40px;
 }
 
 hr {
 width: 100%;
 margin-top: 30px;
  margin-bottom: 30px;
 }
 
     body {
	margin: 0px!important;
    }
    
    .rows {
    padding: 10px;
    }
 </style>
</head>
<body>
 <center><div class = "text-container" style="background-color: black;">
       <img src="educomx.png">
    </div></center>
<form name="form" action="" method="post">
<div class="rows">
<h2>Question 1</h2>
<p>These form inputs should be about question 1. That is pages 1 to 3. </p>
<div class="rows">Enter Question 1<input class="" type="text" id="Q1" name="Q1" placeholder="Question 1" required></div><br>
<div class="row">Enter option 1 (correct)</h5><input class="q1" type="text" name="O11" placeholder="Option 1" required></div><br>
<div class="row">Enter option 2</h5><input class="q1" type="text" name="O12" placeholder="Option 2" required></div><br>
<div class="row">Enter option 3</h5><input class="q1" type="text" name="O13" placeholder="Option 3" required></div><br>
<div class="row">Enter option 4</h5><input class="q1" type="text" name="O14" placeholder="Option 4" required></div><br>
<div class="row">Select correct option</h5>
</div><br>
<div>
<div class="rows" style="background-color: rgb(187,190,193);">
<h2>Question 2</h2>
<p>These form inputs should be about question 2. That is pages 4 to 6. </p>
<div class="row">Enter Question 2<input class="" type="text" name="Q2" placeholder="Question 2" required></div><br>
<div class="row">Enter option 1 (correct)</h5><input class="" type="text" name="O21" placeholder="Option 1" required></div><br>
<div class="row">Enter option 2</h5><input class="" type="text" name="O22" placeholder="Option 2" required></div><br>
<div class="row">Enter option 3</h5><input class="" type="text" name="O23" placeholder="Option 3" required></div><br>
<div class="row">Enter option 4</h5><input class="" type="text" name="O24" placeholder="Option 4" required></div><br>

</div>
<div class="rows">
<h2>Question 3</h2>
<p>These form inputs should be about question 3. That is pages 7 to 9. </p>
<div class="row">Enter Question 3<input class="" type="text" name="Q3" placeholder="Question 3" required></div><br>
<div class="row">Enter option 1 (correct)</h5><input class="" type="text" name="O31" placeholder="Option 1" required></div><br>
<div class="row">Enter option 2</h5><input class="" type="text" name="O32" placeholder="Option 2" required></div><br>
<div class="row">Enter option 3</h5><input class="" type="text" name="O33" placeholder="Option 3" required></div><br>
<div class="row">Enter option 4</h5><input class="" type="text" name="O34" placeholder="Option 4" required></div><br>

</div>
<div class="rows" style="background-color: rgb(187,190,193);">
<h2>Question 4</h2>
<p>These form inputs should be about question 4. That is pages 10 to 12. </p>
<div class="row">Enter Question 4<input class="" type="text" name="Q4" placeholder="Question 4" required></div><br>
<div class="row">Enter option 1 (correct)</h5><input class="" type="text" name="O41" placeholder="Option 1" required></div><br>
<div class="row">Enter option 2</h5><input class="" type="text" name="O42" placeholder="Option 2" required></div><br>
<div class="row">Enter option 3</h5><input class="" type="text" name="O43" placeholder="Option 3" required></div><br>
<div class="row">Enter option 4</h5><input class="" type="text" name="O44" placeholder="Option 4" required></div><br>
</div>
<div class="rows">
<h2>Section details</h2>
<p>These form inputs should be about the section. </p>
<div class="row">Enter Section name:<input class="" type="text" name="name" placeholder="Section name" required></div><br>
<div class="row">Enter description:<input class="" type="text" name="description" placeholder="Description" required></div><br>
<div class="row">Enter name of Icon file:<input class="" type="text" name="icon" placeholder="e.g. Ironman.gif" required></div><br>
</div>
<div class="rows" style="background-color: rgb(187,190,193);">

<br>
<br>
<div class="row">Validation code</h5><input class="" type="text" name="validation" placeholder="Validation" required></div><br>
<br>
<div class="row"><input class="" type="submit" value="Submit"></div>

</div>
</form>
</br>
</div>

<script type="text/javascript">

</script>
</body>
</html>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$validation = $_POST['validation'];

	if ($validation == "kasadaka"){

$Q1 = $_POST['Q1'];
$Q2 = $_POST['Q2'];
$Q3 = $_POST['Q3'];
$Q4 = $_POST['Q4'];

$O11 = $_POST['O11'];
$O12 = $_POST['O12'];
$O13 = $_POST['O13'];
$O14 = $_POST['O14'];

$O21 = $_POST['O21'];
$O22 = $_POST['O22'];
$O23 = $_POST['O23'];
$O24 = $_POST['O24'];

$O31 = $_POST['O31'];
$O32 = $_POST['O32'];
$O33 = $_POST['O33'];
$O34 = $_POST['O34'];

$O41 = $_POST['O41'];
$O42 = $_POST['O42'];
$O43 = $_POST['O43'];
$O44 = $_POST['O44'];


$O1C = $O11;
$O2C = $O21;
$O3C = $O31;
$O4C = $O41;

$name = $_POST['name'];
$description = $_POST['description'];
$file = $_POST['icon'];

$section = 0;

require("connect.php");
$connection = mysqli_connect($server, $username, $password, $database);
if (!$connection){
	die("not connected:" . mysqli_connect_error());
}
$sqlx = "SELECT MAX(`Section`) FROM `quiz`";
$result = $connection->query($sqlx);
while($row = $result->fetch_assoc()){
	$section = ($row['MAX(`Section`)'] + 1);
}

$sql = "INSERT INTO `quiz`(`section`, `chapter`, `question`, `option1`, `option2`, `option3`, `option4`, `correctoption`) 
VALUES (" . $section  . ", 1 , '" .  $Q1   . "', '" .  $O11 . "', '" .  $O12 . "', '" .  $O13 . "', '" . $O14  . "', '" .  $O1C . "')";
$sql2 = "INSERT INTO `quiz`(`section`, `chapter`, `question`, `option1`, `option2`, `option3`, `option4`, `correctoption`) 
VALUES (" . $section  . ", 2 , '" .  $Q2   . "', '" .  $O21 . "', '" .  $O22 . "', '" .  $O23 . "', '" . $O24  . "', '" .  $O2C . "')";
$sql3 = "INSERT INTO `quiz`(`section`, `chapter`, `question`, `option1`, `option2`, `option3`, `option4`, `correctoption`) 
VALUES (" . $section  . ", 3 , '" .  $Q3   . "', '" .  $O31 . "', '" .  $O32 . "', '" .  $O33 . "', '" . $O34  . "', '" .  $O3C . "')";
$sql4 = "INSERT INTO `quiz`(`section`, `chapter`, `question`, `option1`, `option2`, `option3`, `option4`, `correctoption`) 
VALUES (" . $section  . ", 4 , '" .  $Q4   . "', '" .  $O41 . "', '" .  $O42 . "', '" .  $O43 . "', '" . $O44  . "', '" .  $O4C . "')";
$sql5 = "INSERT INTO `Sectiondetails`(`Section_name`, `Section_description`, `Section_icon_src`) 
VALUES ('" .  $name . "', '" . $description . "', '" .  $file  . "')";
mysqli_query($connection, $sql);
mysqli_query($connection, $sql2);
mysqli_query($connection, $sql3);
mysqli_query($connection, $sql4);
mysqli_query($connection, $sql5);
}
else {
	echo 'wrong validation code';
}
}
?>