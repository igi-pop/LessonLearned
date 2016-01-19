<!-- Challenges -->
<div class="col-lg-9 track_contentList  pull-right" style="min-width: 200px;min-height:400px">
    <h5 class="title-h5 pull-left">Category: 
         <?php echo $main_view_data->category_name; ?>
         <?php if(isset($main_view_data1)) var_dump( $main_view_data1); ?></h5>
    <div class="pull-right title-h5">
        <div class="btn-group pull-right">
        <?php echo $difficulty_links; ?>
        </div>
    </div>
    <div class="challenges-list">
    <?php  //var_dump($main_view_data); ?>
    <?php echo $main_view_formated;     ?>
    </div>
    <?php echo $links; ?>
</div>