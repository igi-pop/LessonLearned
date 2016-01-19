<?php //if(isset($main_view_data1)) var_dump( $main_view_data1); ?>



<div class="col-lg-9 col-lg-offset-1  challenges-list" style="margin-top:25px;margin-Bottom:100px">
    <h3><?php  echo $this->lang->line('block_edit');  ?> </h3>
    <div  class=" track_content"  >
        <section class="track_content-footer " >
        <div class="col-md-11 col-lg-12 hr_tour-problem-statement problem-statement" >
	               

	       <div class="content-text challenge-text mlB">
            <?php echo validation_errors();  ?>
           
            <p><?php  echo $this->lang->line('block_create_information');  ?></p>
           
              <?php if($this->session->flashdata('message')){ ?><div class="alert alert-success col-lg-7 col-lg-offset-2 bold" style="text-align:center;clear:both;margin:10px" role="alert"><?php echo $this->session->flashdata('message'); ?></div> <?php } ?>
            <?php echo form_open('/'.$language.'/developer/block/edit/'.$block_data[0]->block_id );?><br />
          
                
                    <table class="table">
                        <?php// echo form_hidden('mod-date', $course_current); ?>
                        <tr>
                            <td><?php  echo $this->lang->line('block_title');  ?></td>
                            <?php $array=array('name'         => 'title',
                                                'id'          => 'title',
                                                'placeholder' => $this->lang->line('block_placeholder_title'),
                                                'type'        =>  'text',
                                                'class'       =>  'col-lg-12 ',
                                                'value'       =>  $block_data[0]->title,);?>
                            <td><?php echo form_input($array); ?></td>
                        </tr>
                        <tr>
                            <td><?php  echo $this->lang->line('block_des');  ?></td>
                            <?php $array=array(
                                      'name'        => 'description',
                                      'id'          => 'description',
                                      'placeholder' => $this->lang->line('block_placeholder_desc'),
                                      'rows'        =>  '4',
                                      'type'        =>  'text',
                                      'class'       =>  'col-lg-12 ',
                                      'value'       =>  htmlspecialchars_decode($block_data[0]->description),
                                      );
                                      ?>
                            <td><?php echo form_textarea($array);  ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $this->lang->line('block_note'); ?></td>
                            <?php $array=array(
                                      'name'        => 'note',
                                      'id'          => 'note',
                                      'placeholder' => $this->lang->line('block_placeholder_note'),
                                      'value'       =>  $block_data[0]->note,
                                      'type'        =>  'text',
                                      'class'       =>  'col-lg-12 ',
                                      
                                      );
                                      ?>
                            <td><?php echo form_input($array);  ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $this->lang->line('block_video'); ?></td>
                            <?php $array=array(
                                      'name'        => 'video_url',
                                      'id'          => 'video_url',
                                      'placeholder' => $this->lang->line('block_video_placeholder'),
                                      'value'       =>  $block_data[0]->video_url,
                                      'type'        =>  'text',
                                      'class'       =>  'col-lg-12 ',
                                      
                                      );
                                      ?>
                            <td><?php echo form_input($array);  ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $this->lang->line('block_code'); ?></td>
                            <?php $array=array(
                                      'name'        => 'code',
                                      'id'          => 'code',
                                      'placeholder' => $this->lang->line('block_placeholder_code'),
                                      'class'       =>  'col-lg-12 ',
                                      'rows'        =>  '4',
                                      'value'       =>  htmlspecialchars_decode($block_data[0]->code),
                                      );
                                      ?>
                            <td><?php echo form_textarea($array);  ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $this->lang->line('block_output'); ?></td>
                            <?php $array=array(
                                      'name'        => 'output',
                                      'id'          => 'output',
                                      'placeholder' => $this->lang->line('block_placeholder_output'),
                                      'rows'        =>  '4',
                                      'type'        =>  'text',
                                      'class'       =>  'col-lg-12 ',
                                      'value'       =>  htmlspecialchars_decode($block_data[0]->output),
                                      );
                                      ?>
                            <td><?php echo form_textarea($array);  ?></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td><a href="<?php echo base_url().$language.'/developer/course/lesson/'.$lesson_data[0]->lesson_id; ?>" class="btn btn-primary " style="margin-right:25px">
                              <?php echo $this->lang->line('go_back');  ?>
                            </a>
                            <?php echo form_submit('submit', $this->lang->line('save'), 'class="btn btn-primary "'); ?></td>
                        </tr>
                        

                    </table>

                <?php echo form_close(); ?>
	       </div> 
        </div>
    </section>
    </div>
</div>

