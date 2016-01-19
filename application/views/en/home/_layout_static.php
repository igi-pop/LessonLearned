<?php $this->load->view('en/0-components/headers/page_head'); ?>
 <body>
    
   

    <?php $this->load->view('en/0-components/navigations/navigation', $this->data); ?>

<?php
      $this->load->view($subview);
   ?>



<?php $this->load->view('en/0-components/footers/page_tail'); ?>

    