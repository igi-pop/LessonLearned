<?php if(isset($main_view_data1)) var_dump( $main_view_data1); ?>



<div class="col-lg-8 col-lg-offset-2 col-md-offset-1 col-md-10  challenges-list" style="margin-top:25px;margin-Bottom:100px">
  <?php if($lesson_404 ==false && $lesson_null ==false){ ?>
      <h3><?php echo $this->lang->line('block_editor');  ?>  <span class="dark-limegreen-link"><?php echo $lesson_name; ?></span></h3>

      
          <a href="<?php echo base_url(). $language."/admin/lesson/view/$category->category_id/$course_current/$lesson_current/order";?>"class="btn btn-primary" style="margin:10px;">
           <?php echo $this->lang->line('lesson_order_blocks');  ?> 
           <i class="glyphicon glyphicon-sort-by-attributes"></i>
         </a>
          <div  class=" track_content"  >
          <section class="track_content-footer " >
                <div class="col-md-11 col-lg-12 hr_tour-problem-statement problem-statement" >
	               


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
                    url: "http://localhost/codeigniter-LessonLearned/public_html/en/admin/lesson/view/1/2/13",
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
		<?php echo $print_lesson; ?>


	</div>
    
     



     <?php }
     elseif($lesson_404 == true && $lesson_null == true){
     echo "<h3><strong>".$this->lang->line('lessons_lesson_list')."</strong></h3>";
      echo $main_links;

     }
     else{
      ?>
      <div class="" style="text-align:center;min-width: 200px;margin-top:50px;margin-bottom:50px;">
         <p style="font-size: 110px; text-shadow: 0 5px 20px rgba(0,0,0,0.4);" class="text-center col-lg-12 ">
            <strong>
              <?php echo $this->lang->line('404');  ?>
            </strong>
          </p>     
         <h3  class=" col-lg-12 color-green  bold lobster" >
          <?php echo $this->lang->line('404_desc');  ?>
          </h3>
          <div class="small bold col-lg-12">
            <span class="zeta ">
              <?php echo $this->lang->line('404_paragraph');  ?>
              <?php echo $this->lang->line('404_url');  ?>
            </span>
            <br />
          </div>
    </div>
      <?php
     } ?>
</div>


</section>
</div>

</div>
