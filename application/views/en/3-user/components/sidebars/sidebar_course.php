<?php // var_dump($sidebar_data[0]->category_id); ?>



<!-- This is the categories -->
<div class="col-lg-3 col-sm-4 hidden-xs"  >
<h5 class="title-h5"><?php echo $this->lang->line('categories'); ?></h5>
<ul class=" chapter-cards lg lg-block" id="challengeAccordion">

<?php 
foreach($sidebar_data as $category){
	$class= 'card-nav-link'; ?>
	<?php if($main_view_data != NULL) {
		if($main_view_data->cat_slug == $category->cat_slug) 
			$class=' current';
		else 
			$class= 'card-nav-link'; } ?> 
	<li class="chapter-item lg-block_head  <?php echo $class; ?>">
	


		<a href="<?php echo  site_url('/'.$language.'/user/course/select/'.$category->cat_slug); ?>">
			<?php  echo $category->category_name; ?> 
		</a>
	</li>
<?php 	
}

?>


</ul>
        </div>
    </div>

  
    
</div>
</div>
</div></div>