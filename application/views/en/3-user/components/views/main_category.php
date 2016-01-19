
        <div class="col-lg-12 col-sm-12 col-md-12 " style="min-width: 200px;min-height:400px;clear:both;margin-bottom:115px;">
         <h5 class="title-h5 pull-left col-lg-12 col-sm-12">
          <?php  echo $this->lang->line('category_main_user_information');  ?>
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



echo '<div id="newton'.$i.'" class="col-xs-12 col-sm-6 col-md-6 col-lg-4  challenges-list clearfix" style="margin-top:25px;min-height:300px;">
       <div class="challenges-list-view mdB" style="clear:both" style="border:blue 1px solid;">
         <div id="contest-challenges-problem" class="content--list track_content ">
           <div class="content--list_body row">
             <img class="category-logo col-lg-4 col-md-6" src="'. $course['image'].'" style=""/>
            <section class="track_content-footer col-lg-7" >
                <h4 class="challengecard-title  " >
                  <a href="'.site_url($language."/user/course/select/".$course['cat_slug']).'" class="title-link" >'.$course['category_name'].'</a>    
                </h4>
                <div class="small bold  pull-left">
                    <span class="zeta small">'.$this->lang->line('category_main_available_c').' <h5 class="color-green inline bold" style="display:inline;">'.$course['active'].'</h5></span> <Br />
                    <span class="zeta small">'.$this->lang->line('category_main_development_c').' <h5 class="color-green inline bold" style="display:inline;">'.$course['non_active'].'</h5></span> <Br />
                    
                    
                </div>
            </section> 
           </div>
            <footer class="container-fluid" style="max-height:300px;position:relative;">
            <span class="zeta small bold " style="display:block;color:#229B09;min-height:40px;">
                      '.$this->lang->line('category_main_related_c');
                    foreach($course['related'] as $relative){
                      echo "<h5 class=\"color-green inline bold\" style=\"display:inline;\"> 
                          <a href=\"".$relative->url."\" class=\"limegreen-link\" >
                          ".$relative->category_name."
                          </a>
                        </h5>,"; 
                      }
      
          echo  '</span>
            <p>'; 
            if($this->uri->segment(1)== 'sr'  AND $course['description_sr'] != null )
              {echo substr($course['description_sr'], 0, 200);}
            else{echo substr($course['description'], 0, 200);} 
              echo '</p>
            <a href="'.site_url($language."/user/course/select/".$course['cat_slug']).'" class="btn btn-primary col-lg-5" style="margin:10px;z-index:10" >
            '.$this->lang->line('category_main_btn_choose').'
            </a> 
            </footer>
       </div>
      </div>
  </div>';
 }
?>




</div>

</div>