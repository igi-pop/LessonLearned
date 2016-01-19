<?php if(isset($main_view_data1)) var_dump( $main_view_data1); ?>



<div class="col-lg-4 col-lg-offset-1  challenges-list" style="margin-top:25px;margin-Bottom:100px">
      <h3>Preview </h3>
      <h4><?php echo $this->lang->line('lessons_title'); ?> <?php echo $lesson_name; ?><br />
        <?php echo $this->lang->line('lessons_slug'); ?> <?php echo $lesson_slug; ?></h4>

         <div  class=" track_content"  >
          <section class="track_content-footer " >
                <div class="col-md-11 col-lg-12 hr_tour-problem-statement problem-statement" >
	               <?php if($lesson_404 ==false && $lesson_null ==false){ ?>


  <script>
$(function() {
    $( "#sortable" ).sortable({
      placeholder: "ui-state-highlight"
    });
    $( "#sortable" ).disableSelection();
  });
</script>
<script>
$(document).ready(function() {

        $( "#order" ).sortable({
            opacity: 0.6,
            cursor: 'move',

            update: function(event, ui){
 var order = $(this).sortable("serialize");
 console.log(order);

                $.ajax({
                    url: "http://localhost/codeigniter-LessonLearned/public_html/en/admin/lesson/view/1/2/13/order",
                    type: 'POST',
                    data: order,
                    success: function (data) {
                       // alert("it done"+data);
                        $("#test").html(data);
                    }

                });
                }

            });

});
</script>
  </script>

<?php ?> 
	<div class="content-text challenge-text mlB">
		<?php //echo $print_lesson; ?>

      <ul id="order" class="sortable ui-sortable">
        <?php foreach($direct_block as $block): 

          echo "<li id=\"item-".$block->block_id."\" class=\"col-lg-4 col-lg-offset-4 order-item\" style=\"background-color:#e5e5e5; padding:10px;\">
              ".$block->title." (Block - ".$block->block_id.")
              </li>";

        endforeach; ?>

   
   
</ul>

	</div>
    
     




     <?php }
     elseif($lesson_404 == true && $lesson_null == true){
     echo "<h3><strong>Lesson list</strong></h3>";
     	echo $main_links;

     }
     else{
     	?>
     	 <div class="" style="text-align:center;min-width: 200px;margin-top:50px;margin-bottom:50px;">
         <p style="font-size: 110px; text-shadow: 0 5px 20px rgba(0,0,0,0.4);" class="text-center col-lg-12 "><strong><?Php echo $this->lang->line('404'); ?></strong></p>     
         <h3  class=" col-lg-12 color-green  bold lobster" > <?Php echo $this->lang->line('404_desc'); ?>  </h3>
            <div class="small bold col-lg-12">
                <span class="zeta ">
                    <?Php echo $this->lang->line('404_paragraph'); ?>
                  <?Php echo $this->lang->line('404_url'); ?>    
                <br />
            </div>
        </div>
     	<?php
     } ?>
</div>


</section>
</div>

</div>
