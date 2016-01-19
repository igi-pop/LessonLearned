<h1 ><?php  echo $this->lang->line('user_search_title');  ?></h1>
<h4 class="color-alt-grey">
	<?php  echo $this->lang->line('user_search_info');  ?>
</h4>

 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 title-h5" style="text-align:right;clear:both;">
  <div class="btn-group col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1  col-sm-12  col-xs-12">
  	
    <?php echo form_open($language.'/user/search/index/'.$this->input->post('search')); ?>
    <div class="row">
      <div class="pull-left">
  		<?php

  		$data = array(
			    'name'        => 'checkbox_group[]',
			    'value'       => '1',
			    'checked'     => $checkbox_checking[1],
			    'class'		  => 'pull-left',
			    'style'       => 'margin-left:15px; margin-right:3px;',
			    ); 
  		 echo form_checkbox($data); ?><label class="pull-left">&nbsp;<?php  echo $this->lang->line('user_search_author');  ?>&nbsp;</label> 
      </div>
       <div class="pull-left">
  		<?php 
  		$data = array(
			    'name'        => 'checkbox_group[]',
			    'value'       => '2',
			    'checked'     => $checkbox_checking[2],
			    'class'		  => 'pull-left',
			    'style'       => 'margin-left:15px; margin-right:3px;',
			    );
  		echo form_checkbox($data); ?><label >&nbsp;<?php  echo $this->lang->line('user_search_courses');  ?>&nbsp;</label>
  		</div>
      <div class="pull-left">
  		<?php 
  		$data = array(
			    'name'        => 'checkbox_group[]',
			    'value'       => '4',
			    'checked'     => $checkbox_checking[4],
			    'class'		  => 'pull-left',
			    'style'       => 'margin-left:15px; margin-right:3px;',
			    );
  		echo form_checkbox($data); ?><label class="pull-left">&nbsp;<?php  echo $this->lang->line('user_search_lessons');  ?>&nbsp;</label>
  		</div>
  	
  </div>
    <?php $data = array(
                      'name'        => 'search',
                      'id'          => 'search',
                      'placeholder' => $this->lang->line('user_search_place'),
                      'value'		    => decodeseoUrl($this->uri->segment(5)),
                      'maxlength'   => '50',
                      'type'        =>  'text',
                      'size'        => '50',
                      'class'       =>  'col-lg-6 col-md-9 col-sm-9 col-xs-12',
                      'style'       => 'margin-top:10px'
                      );
           
            
            echo form_input($data);
            ?>


            <?php
             $data = array(
                      'name'  => 'search_button',
                      'id'    => 'search_button',
                      'value' => $this->lang->line('user_search_btn'),
                      'class' => 'btn btn-primary col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 col-sm-offset-4 col-xs-9 col-xs-offset-1   login-button pull-left',
                      'style' => 'margin-top:10px'
                       );
            echo form_submit($data);
            ?>

    <?php echo form_close(); ?>
  </div>
</div>

  
       
          
           	<?php if($course_data): foreach($course_data as $course): ?>
  	<div class="col-lg-12 col-md-12 col-sm-12 col-sm-6 col-xs-12 challenges-list note" style="margin-top:10px;padding-right:0px ">
       	<div class="challenges-list-view mdB" style="clear:both" >
         <div id="contest-challenges-problem" class="content--list track_content ">
           	<div class=" row">
           	<section class="col-lg-12 col-md-10 col-sm-12 col-xs-8" style="padding:20px; padding-left:40px; padding-right:40px;">
            <div class="row challengecard-title bold"  style="">
            	
            	<span class="pull-left">
		            <span class=" small pull-left" style="margin-right:5px;font-size:1.5em;">
		            	<?php  echo $this->lang->line('user_search_result_course');  ?> 
		            </span> <br class="visible-xs-block" /> 
		            <span class="pull-left challengecard-title  bold" style="margin-30px;">
			             <a href="<?php echo base_url().$language.'/user/course/lesson/'.$course->c_slug.'/'; ?>" class=" title-link" style="margin-right:15px;">
			            <?php echo $course->title; ?> 
			              </a> 
		          	</span>
	          	</span>

              	<span class=" small pull-left" style="margin-right:5px;font-size:1.5em;">
	              	<span class=" small pull-left">
	              		<?php  echo $this->lang->line('user_search_result_lesson');  ?>
	              	</span> <br class="visible-xs-block" />
	              	<span class="pull-left challengecard-title  bold" style="margin-30px;">
			            <a href="<?php echo base_url().$language.'/user/course/lesson/'.$course->c_slug.'/'.$course->lesson_slug; ?>" class=" title-link" style="margin-right:15px;">
			             <?php echo $course->lesson_name; ?>
			            </a> 
	          		</span>
          	  	</span>

          	  	<span class="pull-right hidden-xs hidden-sm hidden-md" style="font-size:1.4em;">
	          	 	<span class="zeta small" >
	          	 		<?php echo $this->lang->line('course_author_plus'); ?> 
	          	 	</span><br class="visible-xs-block" />
	                <span class="zeta-data small" style="font-size:1em;">
	                        <?php echo $course->username; ?>
	                </span>
              	</span>   
                <span class=" visible-xs visible-sm visible-md-block" style="font-size:1.4em;padding-top:10px;clear:both">
                <span class="zeta small" style="">
                  <?php echo $this->lang->line('course_author_plus'); ?> 
                </span><br class="visible-xs-block" />
                  <span class="zeta-data small" style="font-size:1em;">
                          <?php echo $course->username; ?>
                  </span>
                </span>     
          	</div>
          	</section>
          	</div>

          </div>
       </div>
        </div>
          <?php endforeach;
          else: ?>
          <?php if($did_we_search == true){ ?>
          <div class="alert alert-info col-lg-6 col-lg-offset-3 col-md-10 col-md-offset-1 col-sm-12 col-xs-12 center">
            <?php echo $this->lang->line('user_search_no_result'); ?>
          </div>

           <?php } endif; ?>
       
 
 <div class="center col-xs-12 col-md-12 col-lg-8"> <?php echo $page_links; ?></div>