<?php // var_dump($sidebar_data[0]->category_id); ?>



<!-- This is the categories -->
<div class="col-lg-3"  >
<div class="account_checklists">
</div>
<h5 class="title-h5">Categories</h5>
<ul class=" chapter-cards lg lg-block" id="challengeAccordion">

<?php 
if($main_view_data  != NULL) { 
foreach($sidebar_data as $category)
{	?>
	<li class="chapter-item lg-block_head  <?php if($main_view_data->cat_slug == $category->cat_slug)  echo ' current';else echo 'card-nav-link'; ?> ">
		<a href="<?php echo  site_url('/en/user/course/select/'.$category->cat_slug); ?>">
			<?php  echo $category->category_name; ?> 
		</a>
	</li>
<?php 	
}
}
?>


</ul>
        </div>
    </div>

    <!-- This is for onboarding, please do not remove it -->
    
</div>
</div>
</div></div>