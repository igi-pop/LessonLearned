
  <div class="col-lg-3  challenges-list" style="margin-top:25px">
       <div class="challenges-list-view mdB" style="clear:both" >
         <div id="contest-challenges-problem" class="content--list track_content"  >
          <section class="" style="z-index:75!important">
            <h4 class="challengecard-title  " >
              <a href="#" class=" title-link" style="padding:10px;">Quick statistics</a>    
            </h4>
            <?php if( $this->session->flashdata('links')):?><div class="alert alert-success color-green bold" role="alert">  <?php echo $this->session->flashdata('links'); ?></div><?php endif;?>
            
        <table class="table table-striped col-lg-12" style="z-index:10 !important;border:0px solid #D7E7CF;  border-bottom-width: 3px">
          <thead>
            <tr>
              <th style="text-align:center" colspan="2">Category information</th>
              
              
            </tr>
          </thead>
          <tbody style="text-align:left;">
          <tr style="text-align:center">
            <td class="bold" style="text-align:center; text-align:left;">Category: </td>
            <td style="text-align:center; "><img src="<?php  echo $this->category_m->image_path($category->image); ?>" style="max-width:40px;max-height:40px"/><?php echo $category->category_name; ?></td>
 
          </tr>
           <tr style="text-align:center">
            <td class="bold"  style=" text-align:left;">Category slug: </td>
            <td style=" text-align:center;"><?php echo $category->cat_slug; ?></td>
 
          </tr>
          <tr style="text-align:center">
            <td class="bold"  style=" text-align:left;">Total courses: </td>
            <td style="text-align:center"><?php  echo $category->total; ?></td>
 
          </tr>
          <tr style="text-align:center">
            <td class="bold"  style=" text-align:left;">Active courses: </td>
            <td style="text-align:center"><?php  echo $category->active; ?></td>
 
          </tr>
          <tr style="text-align:center">
            <td class="bold"  style=" text-align:left;">Developing&nbsp;courses: </td>
            <td style="text-align:center"><?php  echo $category->develop; ?></td>
 
          </tr>
          </tbody>
        </table>  






 <table class="table table-striped col-lg-12" style="z-index:10 !important;border:0px solid #D7E7CF;  border-bottom-width: 3px">
          <thead>
            <tr>
              <th style="text-align:center;padding:5px;" colspan="2">Author Information:</th>
              
              
            </tr>
          </thead>
          <tbody style="text-align:left;">
           
           <tr style="text-align:center">
            <td class="bold">username: </td>
            <td style="text-align:center"><?php echo $author->username; ?></td>
 
          </tr>
          <tr style="text-align:center">
            <td class="bold">Full name: </td>
            <td style="text-align:center"><?php echo $author->first_name.' '.$author->last_name; ?></td>
 
          </tr>
           <tr style="text-align:center">
            <td class="bold">Total courses published: </td>
            <td style="text-align:center"><?php echo $author->total; ?></td>
 
          </tr>
          
          </tbody>
        </table>  












         <table class="table table-striped col-lg-12" style="z-index:10 !important;border:0px solid #D7E7CF;  border-bottom-width: 3px">
          <thead>
           <tr style="text-align:center">
            <th class="bold" colspan="2">Courses Information: </th>
            
 
          </tr>
          </thead>
          <tbody style="text-align:left;">
           
           <tr style="text-align:center">
            <td class="bold">Course: </td>
            <td style="text-align:center"><?php echo $course[0]->title; ?></td>
 
          </tr>
          <tr style="text-align:center">
            <td class="bold">Course slug: </td>
            <td style="text-align:center"><?php echo $course[0]->c_slug; ?></td>
 
          </tr>
          <tr style="text-align:center">
            <td class="bold">Approved: </td>
            <td style="text-align:center"><?php if($course[0]->approved){echo 'Yes';}else{ echo "No"; } ?></td>
 
          </tr>
          <tr style="text-align:center">
            <td class="bold">Total lessons: </td>
            <td style="text-align:center"><?php echo $course[0]->total; ?></td>
 
          </tr>
          <tr style="text-align:center">
            <td class="bold">Active lessons: </td>
            <td style="text-align:center"><?php echo $course[0]->active; ?></td>
 
          </tr>
          <tr style="text-align:center">
            <td class="bold">Developing&nbsp;lessons: </td>
            <td style="text-align:center"><?php echo $course[0]->develop; ?></td>
 
          </tr>

    </tbody>
        </table>  


          
 <table class="table table-striped col-lg-12" style="z-index:10 !important;border:0px solid #D7E7CF;  border-bottom-width: 3px">
          <thead>
           <tr style="text-align:center">
            <th class="bold" colspan="2">Lesson Information: </th>
            
 
          </tr>
          </thead>
          <tbody style="text-align:left;">
         
           <tr style="text-align:center">
            <td class="bold">Lesson: </td>
            <td style="text-align:center"><?php echo $lesson_side[0]->lesson_name; ?></td>
 
          </tr>
          <tr style="text-align:center">
            <td class="bold">lesson slug: </td>
            <td style="text-align:center"><?php echo $lesson_side[0]->lesson_slug; ?></td>
 
          </tr>

          <tr style="text-align:center">
            <td class="bold">Approved: </td>
            <td style="text-align:center"><?php if($lesson_side[0]->approved){echo 'Yes';}else{ echo "No"; } ?></td>
 
          </tr>
          <tr style="text-align:center">
            <td class="bold">Created: </td>
            <td style="text-align:center"><?php echo $lesson_side[0]->created; ?></td>
 
          </tr>
          <tr style="text-align:center">
            <td class="bold">Modified: </td>
            <td style="text-align:center"><?php echo $lesson_side[0]->modified; ?></td>
 
          </tr>
          </tbody>
        </table>  

            </section> 
          
       </div>
      </div>
  </div>
