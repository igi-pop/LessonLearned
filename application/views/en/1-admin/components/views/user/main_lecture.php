<?php if(isset($main_view_data1)) var_dump( $main_view_data1); ?>
<div class="col-md-11 col-lg-9 hr_tour-problem-statement problem-statement">
	<?php if($lesson_404 ==false && $lesson_null ==false){ ?>




	<div class="content-text challenge-text mlB">
		<?php if($lesson_404 ==false) echo $lesson; ?>
	</div>
    <footer>
    <a href="#" class="btn btn-line js-suggest-edits small fade in challenge_suggestion-toggle fullscreen-hide" >Suggest Edits</a></footer>
    <p class="psB plT" style="font-size: 10px;">Copyright © 2015 LessonLearned.<br>
     All Rights Reserved</p>
     




     <?php }
     elseif($lesson_404 == true && $lesson_null == true){
     echo "<h3><strong>Lesson list</strong></h3>";
     	echo $main_links;
     }
     else{
     	?>
     	<div class="" style="text-align:center;min-width: 200px;margin-top:50px;margin-bottom:50px;">
     	
         <p style="font-size: 110px; text-shadow: 0 5px 20px rgba(0,0,0,0.4);" class="text-center col-lg-12 "><strong>404</strong></p>     
         <h3  class=" col-lg-12 color-green  bold lobster" > Page not found </h3>
         
            <div class="small bold col-lg-12">
              
            <span class="zeta ">The page you are looking for doesn't exit.
            	<br /> Maybe you have miss typed the  URL OR the link has expired and deleted <br /><br /> 
              Please follow the next link to the  <a class="color-green bold" href="<?php echo site_url('en/home'); ?>">Home</a> page
            </span>
      <br />
            </div>


    </div>
     	<?php
     } ?>
</div>