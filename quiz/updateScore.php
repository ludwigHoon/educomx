<?php

    session_start();
    require 'connect.php';
	$chapter = $_GET["chapter"];
	$section = $_GET["section"];
    header('Content-Type: application/json');
    

    $aResult = array();

    if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

    if( !isset($aResult['error']) ) {

        switch($_POST['functionname']) {
            case 'update':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) {
                   $aResult['error'] = 'Error in arguments!';
               }
               else {
                   #update database
			if($_POST['arguments'][0] > 0){
		$levelscore = ((($section - 1) * 4) + $chapter);
		if($levelscore > $_SESSION['score']){
                   $sql = "UPDATE users SET score = '". $levelscore ."'
                     WHERE name = '" . $_SESSION['name'] ."'";
		
		$_SESSION['score'] = $levelscore;
				}
		
                    if ($conn->query($sql) === TRUE) {
                        $aResult['result'] = "New record created successfully";
                    } else {
                        $aResult['result'] = $conn->error;
                    }
			

			}
			
                   
               }
               break;
	       
		case 'log':
		$option = $_POST['option'];
		$sql2 = "INSERT INTO `usagelog`(`User`, `chapter`, `section`, `option-picked`) VALUES ('" . $_SESSION['name'] . "', '" . $chapter . "', '" . $section . "', '" . $option . "')";
                    if ($conn->query($sql2) === TRUE) {
                        $aResult['result'] = $sql2;
                   } else {
                        $aResult['result'] = $conn->error;
                    }
	break;


            default:
               $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
               break;
        }

    }
                    $conn->close();

    echo json_encode($aResult);

?>