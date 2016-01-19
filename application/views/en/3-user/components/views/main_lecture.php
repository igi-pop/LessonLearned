<?php if(isset($main_view_data1)) var_dump( $main_view_data1); ?>
<div class="col-md-11 col-lg-9 hr_tour-problem-statement problem-statement" style="padding-bottom:160px;">
	<?php if($lesson_404 ==false && $lesson_null ==false){ ?>




	<div class="content-text challenge-text mlB">
		<?php if($lesson_404 ==false && $comments_null == true && $lesson != null) {echo $lesson;}else{ ?>
        
        <?php } ?>
	</div>
        <?php if($lesson_404 ==false && $comments_null == false) $this->load->view('en/3-user/components/views/main_comments');  ?>


     <?php }

     elseif($lesson_404 == true && $lesson_null == true){
     echo "<h3><strong>".$this->lang->line('lessons_lesson_list')."</strong></h3>";
     	echo $all_large_links;

     }
     else{
     	?>
     	<div class="" style="text-align:center;min-width: 200px;margin-top:50px;margin-bottom:50px;">
         <p style="font-size: 110px; text-shadow: 0 5px 20px rgba(0,0,0,0.4);" class="text-center col-lg-12 ">
            <strong><?Php echo $this->lang->line('404'); ?></strong>
        </p>     
         <h3  class=" col-lg-12 color-green  bold lobster" > <?Php echo $this->lang->line('404_desc'); ?>  </h3>
            <div class="small bold col-lg-12">
                <span class="zeta ">
                    <?php echo $this->lang->line('404_paragraph'); ?>
                    
                <br />
            </div>
        </div>
     	<?php
     } ?>



</div>