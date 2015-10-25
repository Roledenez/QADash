<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

  <div>
    <div class="row" style="width: 204%;">
        <div class="col-md-6">
            <div class="panel panel-primary" >
            <div class="panel-heading">

            
                <h3 class="panel-title">Create Issues</h3>
                </div>

                <div style="margin-bottom: 25px" class="input-group">
              <label for="issueCode" id="lblIssueCode">Issue Code</label>
                <?php
                    $attributes = array(
                                  'class' => 'form-control',
                                  'id' => 'txtIssueCode',
                                  'type' => "text",
                                  'name' => "issue_code",
                                  'placeholder' => "Issue Code",
                                  'value' => ""
                                  );

                                  echo form_input($attributes);
                  ?>
              </div>

                <div style="margin-bottom: 25px" class="input-group">
                  <label for='issueType'>Issue Type</label>
                    <!-- <span class="input-group-addon"></span> -->
                      <?php
                        $options = array(
                                   'new_feature'  => 'New Feature',
                                   'blocker'    => 'Blocker',
                                   'bug'   => 'Bug',
                                   'improvement' => 'Improvement',
                                   'support_request' => 'Support Request',
                                   'third_party_issues' => 'Third Party Issue',
                                    );

                    echo form_dropdown('issue_type', $options, 'new_feature');
                      ?>
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                  <label for='priority'>Priority</label>                    
                      <?php
                        $options = array(
                                   'blocker'  => 'Blocker',
                                   'critical'    => 'Critical',
                                   'major'   => 'Major',
                                   'minor' => 'Minor',
                                   'trivial' => 'Trivial'                                   
                                    );

                    echo form_dropdown('priority', $options, 'blocker');
                      ?>
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                  <label for='versions'>Affected Versions :</label>                    
                       <?php
                       $i = 0;

                       $foo = array(
                            
                            'options' => array()
                        );

                      foreach ($versions as $row1) {
                        $foo['options'] = array (  
                              'label' => $row1->version_code                                              
                      );    
                          var_dump($foo);                          
                      }

                      echo form_dropdown('version', $foo, 'options');
                       ?>
                </div>

              <div style="margin-bottom: 25px" class="input-group">
              <label for="summaryText" id="lblSummary">Summary</label>
                <?php
                    $attributes = array(
                                  'class' => 'form-control',
                                  'id' => 'txtSummary',
                                  'type' => "text",
                                  'name' => "summary",
                                  'placeholder' => "Summary",
                                  'value' => ""
                                  );

                                  echo form_input($attributes);
                  ?>
              </div>

              <div class="btn-group">                      
                <?php echo form_label('Security Level :', 'security');?>            
               
                  <select id="ddlSecurityLevel">                    
                      <option>Logged-in users</option>
                      <option>Issue Reporters and developers</option>
                  </select>
                </div> 
              
              <div>
                <label for="dueDate">Due Date</label>
              </div>

                <div style="margin-top:10px" class="form-group">
                                <!-- Button -->
                                <div class="col-sm-12 controls">
                                    <?php
                                   
                                        $attributes = array(
                                        'class' => 'btn btn-primary',
                                        'id' => 'btnCreateIssue',
                                        'type' => "submit",
                                        'name' => "submit",
                                        'value' => "Create"
                                        );

                                     echo form_submit($attributes);
                                     ?>
                                </div>
                </div>
                </div>
                   <h4 style="color:red"> <?php echo validation_errors(); ?> </h4>
                </div>
              </div>                 
              
            </div>
          </div>

          
        </div>
      </div>  
</form>