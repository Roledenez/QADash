<section class="content">
    
     <?php echo form_open('admin/projectSprint_controller/SprintLoad'); ?> 
    <div class="row" style=" margin-left: 10px; margin-top: 15px;">
        <h5 class="box-title">Projects List &nbsp;&nbsp;&nbsp; : &nbsp; <?php echo form_dropdown('projects', $projects, 'id'); ?> </h5>
        <div>
            <input type="submit" style="width:200px;" class="btn btn-block btn-primary" value="Show Project Sprint Details" /></div>    
    </div>
    <?php echo form_close();
    
    if (count($sprint) > 0) {
        for ($x = 0; $x < count($sprint); $x++) {
            ?>
    <!-- row -->
    <br><br>
          <div class="row">
            <div class="col-md-12">
              <!-- The time line -->
              <ul class="timeline">
                <!-- timeline time label -->
                <li class="time-label">
                  <span class="bg-red">
                    <?php echo $sprint[$x]->starting_date; ?>
                  </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-paw bg-blue"></i>
                  <div class="timeline-item">
<!--                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>-->
                    <h3 class="timeline-header"><a href="#"><?php echo $sprint[$x]->name; ?></a></h3>
                    <div class="timeline-body">
                      <?php echo $sprint[$x]->description; ?>
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline time label -->
                <li class="time-label">
                  <span class="bg-green">
                    <?php echo $sprint[$x]->ending_date; ?>
                  </span>
                </li>
                <!-- /.timeline-label -->
              </ul>
            </div><!-- /.col -->
          </div><!-- /.row -->
    <?php } 
    
    }?>     
   
</section>