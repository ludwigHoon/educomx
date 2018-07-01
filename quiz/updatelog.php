<?php

    session_start();
    require 'connect.php';
    $question = $_POST['question'];
    $answer = $_POST['answer'];

$connection = mysqli_connect($server, $username, $password, $database);
if (!$connection){
	die("not connected:" . mysqli_connect_error());
}

$sql = "INSERT INTO `usagelog`(`User`, `Question`, `Answer`, `correct`) VALUES ('" . $_SESSION['name'] . "', 'hey', 'hey')";
$connection->query($sql);

?>