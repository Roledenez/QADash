<?php $this->load->view('components/page_head'); ?>
<body style="background: white">

<!-- Trigger the modal with a button
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
-->
<!-- Modal -->
<!-- <div id="myModal" class="modal show" role="dialog">
  <div class="modal-dialog"> -->

	<?php $this->load->view($subview); // subview is loaded in controller ?>
     <!--  <div class="modal-footer">
      	&copy; <?php //echo $meta_title; ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    <!-- </div>

  </div> -->
</body>


 <?php $this->load->view('components/page_tail'); ?>