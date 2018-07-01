<?php
session_start();
if ($_SESSION["name"] == ""){
header("Location: ../proto/index.php");
}
$chapter = $_GET["chapter"];
$section = $_GET["section"];
require("connection.php");
$connection = mysqli_connect($server, $username, $password, $database);
if (!$connection){
	die("not connected:" . mysqli_connect_error());
}
$array = range(1,4);
shuffle($array);
$sql = "SELECT * FROM `quiz` WHERE `chapter` = '" . $chapter . "' AND `section` = '" . $section . "'";
$result = $connection->query($sql);
if(mysqli_num_rows($result) > 0) {
while($row = $result->fetch_assoc()){
	$question = $row['question'];
	$option1 = $row['option' . $array[0]];
	$option2 = $row['option' . $array[1]];
	$option3 = $row['option' . $array[2]];
	$option4 = $row['option' . $array[3]];
$correctoption = $row['correctoption'];
}
}
?>

<!DOCTYPE
 html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>English learning</title>
   
    <!-- Bootstrap core CSS -->
    <link href="../proto/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../proto/vendor/jquery/jquery.min.js"></script>
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../proto/css/one-page-wonder.min.css" rel="stylesheet">
    <!-- jquery for maximum compatibility -->
    <script src="../proto/vendor/jquery/jquery.js"></script>
    <script>
    /** Simple JavaScript Quiz
     * version 0.1.0
     * http://journalism.berkeley.edu
     * created by: Jeremy Rue @jrue
     *
     * Copyright (c) 2013 The Regents of the University of California
     * Released under the GPL Version 2 license
     * http://www.opensource.org/licenses/gpl-2.0.php
     * This program is distributed in the hope that it will be useful, but
     * WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
     */
    var quiztitle = "";
    /**
    * Set the information about your questions here. The correct answer string needs to match
    * the correct choice exactly, as it does string matching. (case sensitive)
    *
    */
var quiz = [
        {
            "question"      :   "<?php echo $question ?>",
            "image"         :   "",
            "choices"       :   [
                                    "<?php echo $option1 ?>",
                                    "<?php echo $option2 ?>",
                                    "<?php echo $option3 ?>",
                                    "<?php echo $option4 ?>"
                                ],
            "correct"       :   "<?php echo $correctoption ?>",
            "explanation"   :   "",
        },
        
    ];
    /******* No need to edit below this line *********/
    var currentquestion = 0, score = 0, submt=true, picked;
    var colr = ['#5EC7DD', '#5BB8AE', '#81C781', '#B0D882'];
    var optext = "";
    jQuery(document).ready(function($){
        /**
         * HTML Encoding function for alt tags and attributes to prevent messy
         * data appearing inside tag attributes.
         */
        function htmlEncode(value){
          return $(document.createElement('div')).text(value).html();
        }
        /**
         * This will add the individual choices for each question to the ul#choice-block
         *
         * @param {choices} array The choices from each question
         */
        function addChoices(choices){
            if(typeof choices !== "undefined" && $.type(choices) == "array"){
                $('#choice-block').empty();
                for(var i=0;i<choices.length; i++){
                    $(document.createElement('li')).addClass('choice choice-box').attr('data-index', i).text(choices[i]).css('background-color',colr[i]).appendTo('#choice-block');                    
                }
            }
        }
        
        /**
         * Resets all of the fields to prepare for next question
         */
        function nextQuestion(){
            submt = true;
            $('#explanation').empty();
            $('#question').text(quiz[currentquestion]['question']);
            $('#pager').text('Question ' + Number(currentquestion + 1) + ' of ' + quiz.length);
            if(quiz[currentquestion].hasOwnProperty('image') && quiz[currentquestion]['image'] != ""){
                if($('#question-image').length == 0){
                    $(document.createElement('img')).addClass('question-image').attr('id', 'question-image').attr('src', quiz[currentquestion]['image']).attr('alt', htmlEncode(quiz[currentquestion]['question'])).insertAfter('#question');
                } else {
                    $('#question-image').attr('src', quiz[currentquestion]['image']).attr('alt', htmlEncode(quiz[currentquestion]['question']));
                }
            } else {
                $('#question-image').remove();
            }
            addChoices(quiz[currentquestion]['choices']);
            setupButtons();
            $('#submitbutton').css({'display':'none'});
        }
        /**
         * After a selection is submitted, checks if its the right answer
         *
         * @param {choice} number The li zero-based index of the choice picked
         */
        function processQuestion(choice){
            if(quiz[currentquestion]['choices'][choice] == quiz[currentquestion]['correct']){
		$('.choice').eq(choice).css({'background-color':'#50D943'});
                $('#explanation').html('<strong>Correct!</strong> ' + htmlEncode(quiz[currentquestion]['explanation']));
                score++;
                var audio = new Audio('sound.mp3');

                audio.play();
            } else {
                $('.choice').eq(choice).css({'background-color':'#D92623'});
                $('#explanation').html('<strong>Incorrect.</strong> ' + htmlEncode(quiz[currentquestion]['explanation']));
            }
	    optext = $('.choice').eq(picked).text();
            currentquestion++;
            $('#submitbutton').html('Continue &raquo;').on('click', function(){
                if(currentquestion == quiz.length){
                    endQuiz();
                } else {
                    $(this).text('Check Answer').css({'color':'#222'}).off('click');
                    nextQuestion();
                }
            });
            
        }
        /**
         * Sets up the event listeners for each button.
         */
        function setupButtons(){
            $('.choice').on('mouseover', function(){
                $(this).css({'background-color':'#e1e1e1'});
            });
            $('.choice').on('mouseout', function(){
                $(this).css({'background-color':colr[$(this).attr('data-index')]});
            })
            $('.choice').on('click', function(){
                picked = $(this).attr('data-index');
                $('.choice').removeAttr('style').off('mouseout mouseover');
                $(this).css({'border-color':'#222','font-weight':700,'background-color':'#c1c1c1'});
                if(submt){
                    submt=false;
                    $('#submitbutton').css({'color':'#000'}).on('click', function(){
                        $('.choice').off('click');
                        $(this).off('click');
                        processQuestion(picked);
                    });
                }
                $('#submitbutton').click();
                $('#submitbutton').css({'display':'block'});
            })
        }
        
        /**
         * Quiz ends, display a message.
         */
        function endQuiz(){
	    var chapter = <?php echo $chapter ?>;
	    var section = <?php echo $section ?>;
            $('#explanation').empty();
            $('#question').empty();
            $('#choice-block').empty();
            $('#submitbutton').remove();
            $('#question').text(""); 
            $(document.createElement('h2')).css({'text-align':'center', 'font-size':'4em'}).text(Math.round(score/quiz.length * 100) + '%').insertAfter('#question');
        	if (score == 0) {
		$(document.createElement('A')).attr('href', '../proto/contentreader/chapter.php?chapter=' + chapter + '&section=' + section + '').text('Read chapter again').insertAfter('#question').css({'text-align':'center', 'font-size':'2em', 'position':'relative', 'top':'100px'});
		}   else { 
			if (chapter < 4){
		$(document.createElement('A')).attr('href', '../proto/contentreader/chapter.php?chapter=' + (chapter + 1) + '&section=' + section + '').text('Go to next chapter!').insertAfter('#question').css({'text-align':'center', 'font-size':'2em', 'position':'relative', 'top':'100px'});
		} else {
			$(document.createElement('A')).attr('href', '../proto/index2.php').text('Go to next section!').insertAfter('#question').css({'text-align':'center', 'font-size':'2em', 'position':'relative', 'top':'100px'});
		}	
		}    
	jQuery.ajax({
            type: "POST",
            url: 'updateScore.php?chapter=<?php echo $chapter?>&section=<?php echo $section?>',
            dataType: 'json',
            data: {functionname: 'update', arguments: [score], option: optext },
            success: function (obj, textstatus) {
                        if( !('error' in obj) ) {
                            yourVariable = obj.result;
                        }
                        else {
                            console.log(obj.error);
                        }
                    }
        });
	jQuery.ajax({
            type: "POST",
            url: 'updateScore.php?chapter=<?php echo $chapter?>&section=<?php echo $section?>',
            dataType: 'json',
            data: {functionname: 'log', option: optext },
            success: function (obj, textstatus) {
                        if( !('error' in obj) ) {
                            console.log( obj.result);
                        }
                        else {
                            console.log(obj.error);
                        }
                    }
        });
        }
        /**
         * Runs the first time and creates all of the elements for the quiz
         */
        function init(){
            //add title
            if(typeof quiztitle !== "undefined" && $.type(quiztitle) === "string"){
                $(document.createElement('h1')).text(quiztitle).appendTo('#frame');
            } else {
                $(document.createElement('h1')).text("Quiz").appendTo('#frame');
            }
            //add pager and questions
            if(typeof quiz !== "undefined" && $.type(quiz) === "array"){
                //add pager
                $(document.createElement('p')).addClass('pager').attr('id','pager').text('Question 1 of ' + quiz.length).appendTo('#frame');
                //add first question
                $(document.createElement('h2')).addClass('question').attr('id', 'question').text(quiz[0]['question']).appendTo('#frame');
                //add image if present
                if(quiz[0].hasOwnProperty('image') && quiz[0]['image'] != ""){
                    $(document.createElement('img')).addClass('question-image').attr('id', 'question-image').attr('src', quiz[0]['image']).attr('alt', htmlEncode(quiz[0]['question'])).appendTo('#frame');
                }
                $(document.createElement('p')).addClass('explanation').attr('id','explanation').html('&nbsp;').appendTo('#frame');
            
                //questions holder
                $(document.createElement('ul')).attr('id', 'choice-block').appendTo('#frame');
            
                //add choices
                addChoices(quiz[0]['choices']);
            
                //add submit button
                $(document.createElement('div')).addClass('choice-box').attr('id', 'submitbutton').text('Check Answer').css({'font-weight':700,'color':'#222','padding':'30px 0', 'display':'none'}).appendTo('#frame');
            
                setupButtons();
            }
        }
        
        init();
    });
    </script>
    <style type="text/css" media="all">
        /*css reset */
        html,body,div,span,h1,h2,h3,h4,h5,h6,p,code,small,strike,strong,sub,sup,b,u,i{border:0;font-size:100%;font:inherit;vertical-align:baseline;margin:0;padding:0;} 
        article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block;} 
        body{line-height:1; font:normal 0.9em/1em "Helvetica Neue", Helvetica, Arial, sans-serif;} 
        ol,ul{list-style:none;}
        strong{font-weight:700;}
        #frame{max-width:620px;width:auto;border:1px solid #ccc;background:#fff;padding:10px;margin:3px;}
        h1{font:normal bold 2em/1.8em "Helvetica Neue", Helvetica, Arial, sans-serif;text-align:left;border-bottom:1px solid #999;padding:0;width:auto}
        h2{font-weight:200!important; 1.3em/1.2em "Lato", Helvetica, Arial, sans-serif;padding:0;text-align:center;margin:20px 0;}
        p.pager{margin:5px 0 5px; font:bold 1em/1em "Helvetica Neue", Helvetica, Arial, sans-serif;color:#999;}
        img.question-image{display:hidden;max-width:250px;margin:0px; auto;border:1px; position:relative; top:-30px; solid #ccc;width:100%;height:0px!important; margin-top:-30px;}
        #choice-block{display:block;list-style:none;margin:0;padding:0;}
        #submitbutton{background:#5a6b8c;}
        #submitbutton:hover{background:#7b8da6;}
        #explanation{margin:0 auto;padding:20px;width:75%;}
        .choice-box{display:block;text-align:center;margin:8px auto;font-size:20px; ;padding:15px 0;border:1px solid #666;cursor:pointer;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;}
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
      <div class="container">
        <a class="navbar-brand" href="../proto/index2.php">Home</a>
       
        <div>
         <ul class="navbar-nav ml-auto">
            <li class="nav-item nav-link">
            <?php  echo "hello <b>" . $_SESSION["name"] . "</b> :)";?>
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
    <center><div style="margin-top:70px; max-width:90%!important;" id="frame" role="content"></div></center>
    
  
    <!-- Bootstrap core JavaScript -->
        
    <script src="../proto/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
          

</body>
</html>