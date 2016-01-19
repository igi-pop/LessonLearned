<!-- Challenges -->
        <div class="col-lg-9 col-sm-8 track_contentList  pull-right" style="min-width: 200px;min-height:400px;">
         <h5 class="title-h5 pull-left bold"> 
            <?php if($main_view_data  != NULL) {echo $main_view_data->category_name;} 
                    else{echo "select your course";} ?>
            <?php if(isset($main_view_data1)) var_dump( $main_view_data1); ?></h5>
         
         <div class="pull-right title-h5">
         <div class="btn-group pull-right">
                <?php if($main_view_data  != NULL) {echo $difficulty_links;} ?>
        </div>
        </div>
<div class="clear"></div>
    <div class="challenges-list">

<?php  //var_dump($main_view_data); ?>
<?php if($main_view_data  != NULL OR $view_all_data == true ) { 
	if($main_view_formated==''){
		echo "<div class=\"center alert alert-info col-lg-3 col-lg-offset-3\" style=\"clear:both\"> ".$this->lang->line('error_no_course_available')." </div>";
	}else{
	echo $main_view_formated;
}
}
?>

</div>

   <?php if($main_view_data  != NULL OR $view_all_data == true) { echo $links; }?>
  
</div>