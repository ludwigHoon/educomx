<?php
session_start();
if ($_SESSION["name"] == ""){
header("Location: ../proto/index.php");
}
$chapter = $_GET["chapter"];
$section = $_GET["section"];
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
        <link rel="stylesheet" href="ideal-image-slider-js/ideal-image-slider.css">
        <link rel="stylesheet" href="ideal-image-slider-js/themes/default/default.css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="../css/one-page-wonder.min.css" rel="stylesheet">
    <body>
            
<style type = "text/css">
/* #slider {

    height: 400px;
} */
.iis-slide:last-child{
	width: 50%!important;
	height: 50%!important;
}

.iis-next-nav, .iis-previous-nav {
    position: fixed!important;
    display: initial!important;
}

</style>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
      <div class="container">
        <a class="navbar-brand" href="../index2.php">Home</a>
       
        <div>

        </div>
      </div>
    </nav>
	<audio id="my_audio" src="images/<?php echo $section ?>/sound.mp3" style="display:none;"></audio>

        <div id="slider" style: "height: 256px">
        <!-- Comic book pages -->
	<?php   
	if($chapter == 1){      
	echo '<img data-src="images/' . $section . '/page1.jpg">
        <img data-src="images/' . $section . '/page2.jpg">
        <img data-src="images/' . $section . '/page3.jpg">
	<a href="../../quiz/quizdb.php?chapter=' . $chapter . '&section=' . $section . '"><img data-src="startquiz.png" style="max-width:50%!important; max-height: 200px!important;"></a>';
	}
	elseif($chapter == 2){      
	echo '<img data-src="images/' . $section . '/page4.jpg">
        <img data-src="images/' . $section . '/page5.jpg">
        <img data-src="images/' . $section . '/page6.jpg">
	<a href="../../quiz/quizdb.php?chapter=' . $chapter . '&section=' . $section . '"><img data-src="startquiz.png" style="max-width:50%!important; max-height: 200px!important;"></a>';
	}
	elseif($chapter == 3){      
	echo '<img data-src="images/' . $section . '/page7.jpg">
        <img data-src="images/' . $section . '/page8.jpg">
        <img data-src="images/' . $section . '/page9.jpg">
	<a href="../../quiz/quizdb.php?chapter=' . $chapter . '&section=' . $section . '"><img data-src="startquiz.png" style="max-width:50%!important; max-height: 200px!important;"></a>';
	}
	elseif($chapter == 4){      
	echo '<img data-src="images/' . $section . '/page10.jpg">
        <img data-src="images/' . $section . '/page11.jpg">
        <img data-src="images/' . $section . '/page12.jpg">
	<a href="../../quiz/quizdb.php?chapter=' . $chapter . '&section=' . $section . '"><img data-src="startquiz.png" style="max-width:50%!important; max-height: 200px!important;"></a>';
	}
	?>
        </div>

        <script src="ideal-image-slider-js/ideal-image-slider.js">
        </script>
        <script src="../vendor/jquery/jquery.js"></script>
        <script>
	window.onload = function(){
		document.getElementById("my_audio").play();
           }

            //new IdealImageSlider.Slider('#slider');
            var pagecounter = 0;
            var slider = new IdealImageSlider.Slider( {
            selector: '#slider',
            interval: 300000,
            transitionDuration: 400,
               onInit: function() {
                   $(window).keydown(function(e) {
                        if (e.which == 39)
                            pagecounter++;
                        if (e.which == 37){
                        }
                   });
                   $(".iis-next-nav").click(function(e) {
                       pagecounter++;
                   });

                   $(".iis-previous-nav").click(function(e) {
                        pagecounter--;
                   });
              },
             
              afterChange: function() {
		window.scrollTo(0,0);
                if (pagecounter > 12)
                    window.location = "../../quiz/quiz.php";
              },

              beforeChange: function() {
                  
                //  $(".iis-previous-nav").click(function(e) {
                    //  if (pagecounter <= 0) {
                    //      slider.gotoSlide(1);
                    //      pagecounter=0; 
                    //  }else{
                    //      slider.previousSlide();
                    //      pagecounter--;
                    //  };
                    // });
                 
                //  $(".iis-next-nav").click(function(e) {
                    //  pagecounter++;
                    //  slider.nextSlide();
                    // });
                 }
              });
        slider.start();
        </script>
    </body>
</head>
</html>