<!-- Challenges -->
        <div class="col-lg-12  col-sm-12 col-md-12 " style="min-width: 200px;min-height:400px;margin-bottom:115px;">
         <h5 class="title-h5 pull-left col-lg-12 col-md-12">
          <?php  echo $this->lang->line('category_main_information');  ?>
          <?php if(isset($main_view_data1)) var_dump( $main_view_data1); ?>
        </h5>
         
        
<br class="visible-md-block" />
<div class="clear row categories" >
   

<?php $i=0;$static=9999; $rows=0;  foreach($main_view_formated as $key => $course) {
$rand[$i]=rand ( 100000 , 2000000 );
foreach($rand as $r){
    if($r==$rand[$i]){
        $rand[$i]=rand ( 100000 , 2000000 );
    }
}



echo '<div id="newton'.$i.'" class="col-xs-12 col-sm-6 col-md-6 col-lg-4  challenges-list clearfix" style="margin-top:25px">
       <div class="challenges-list-view mdB" style="clear:both" style="border:blue 1px solid;">
         <div id="contest-challenges-problem" class="content--list track_content ">
           <div class="content--list_body row">
             <img class=" col-lg-4 col-md-6" src="'. $course['image'].'" style="max-width:100px;max-height:100px;"/>
            <section class="track_content-footer col-lg-7" >
                <h4 class="challengecard-title  " >
                  <a  class="title-link" >'.$course['category_name'].'</a>    
                </h4>
                <div class="small bold  pull-left">
                    <span class="zeta small">'.$this->lang->line('category_main_available_c').' <h5 class="color-green inline bold" style="display:inline;">'.$course['active'].'</h5></span> <Br />
                    <span class="zeta small">'.$this->lang->line('category_main_development_c').' <h5 class="color-green inline bold" style="display:inline;">'.$course['non_active'].'</h5></span> <Br />
                </div>
            </section> 
           </div>
            <footer class="container-fluid">
            <p>'.$course['description'].'</p>
        	
            <button type="button" class="btn btn-primary col-lg-5" style="margin:10px" data-toggle="modal" data-target="#hr-dialog-'.$rand[$i].'">
            '.$this->lang->line('category_main_btn_choose').'
            </button> 
            </footer>
    	 </div>
      </div>
	</div>';
 



  echo "

<!-- Modal start -->
<div  id=\"hr-dialog-".$rand[$i]."\" class=\"modal modal-above\" role=\"dialog\" >
<div class=\"hr-dialog col-xs-8 col-sm-8 col-md-8 \" role=\"dialog\" style=\"\"> 
    <div class=\"hr-dialog-border modal-dialog\" style=\"\"> 
        <div class=\"hr-dialog-main-window \" style=\"background: transparent !important; position: relative;z-index:770\">
            <div class=\"hr-dialog-header\">  
                <button type=\"button\" class=\"close\" style=\"font-size:28px;position:relative;bottom:10px;\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            </div>
            <div class=\"nav nav-tabs hr-dialog-body \" id=\"login-tabs\">
            <h2 class=\"color-green\">
            <img class=\" col-lg-4 col-xs-6\" src=\"". $course['image']."\" style=\"max-width:80px;max-height:80px;\"/>".$course['category_name']."</h2>
                <div style=\"padding:15;padding-top:0px;\">
                    <h3 class=\"bold\" style=\"font-size:16px\"> ".$this->lang->line('category_modal_title')."</h3>
                    <p class=\"hidden-xs\">
                      <span >".$this->lang->line('category_modal_intro')."</span>".$this->lang->line('category_modal_description')."
                    </p>
                    <br />
                    <div class=\"row\">
                        <div class=\"col-lg-3 \" style=\"margin-top:5px;\">
                          <a href=\"".base_url().$language."/developer/course/create/\" class=\"btn btn-primary\">
                            ".$this->lang->line('category_modal_new_course')."
                          </a> 
                        </div>";
                        if(isset($course['course_id'])){
                          echo form_open($language.'/developer/course/redirect/');
                          echo form_hidden('category_id', $course['category_id']);
                          echo "<div class=\"col-lg-8 col-xs-12 col-sm-8 \" style=\"margin-top:5px;margin-right:5px;\">";
                          echo "<select name=\"course_id\"  class=\"col-xs-8\">";
                            foreach($course['course_id'] as $key => $value)
                                echo "<option value=\"".$value."\"  >".$course['course_title'][$key]."</option>";
                          echo "</select>                            
                             <button class=\"btn btn-primary col-xs-4 col-sm-3 col-sm-offset-1\" name=\"course\">
                             ".$this->lang->line('select')."
                             </button> 
                             </div>";
                         echo form_close();
                         }   
            echo " </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal END -->";


$i++;
}

?>







</div>

</div>