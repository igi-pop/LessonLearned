











    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo site_url('js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo site_url('js/main.js'); ?>"></script>
    <script src="<?php echo site_url('js/jquery.hoverflow.min.js'); ?>"></script>
    <script src='<?php echo site_url('js/css3-animate-it.js'); ?>'></script>
    



   


<script type="text/javascript">
// external js: isotope.pkgd.js

$(document).ready( function() {
  // init Isotope
  var $grid = $('.grid').isotope({
    itemSelector: '.mix'
  });

  // store filter for each group
  var filters = {};

  $('.filters').on( 'click', '.button', function() {
    var $this = $(this);
    // get group key
    
    var $buttonGroup = $this.parents('.button-group');
    var filterGroup = $buttonGroup.attr('data-filter-group');
    // set filter for group
    filters[ filterGroup ] = $this.attr('data-filter');
    // combine filters
    var filterValue = concatValues( filters );
    // set filter for Isotope

    $grid.isotope({ filter: filterValue });
  });

  // change is-checked class on buttons
  $('.button-group').each( function( i, buttonGroup ) {
    var $buttonGroup = $( buttonGroup );
    $buttonGroup.on( 'click', 'button', function() {
        alert("clikced");
      $buttonGroup.find('.diamond-active').removeClass('diamond-active');
      $( this ).addClass('diamond-active');
    });
  });
  
});

// flatten object by concatting values
function concatValues( obj ) {
  var value = '';
  for ( var prop in obj ) {
    value += obj[ prop ];
  }
  return value;
}

</script>



  </body>
</html>