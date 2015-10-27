<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

  <div>
    <div class="row" style="width: 204%;">
      <div class="col-md-6">
        <div class="panel panel-primary" >
          <div class="panel-heading">
            <h3 class="panel-title">Create Issues</h3>
          </div>
          <?php
            $attributes = array('class' => 'form-horizontal', 'id' => 'createIssue', 'role'=>'form');                  
            echo form_open("admin/createIssue_c/createIssue",$attributes);
          ?>
          <table style="width:100%">
            <div style="margin-bottom:25px" class="input-group">
              <tr style="width:100%">
                <td style="width:10%">
                  <label for="issueCode" id="lblIssueCode">Issue Code</label>
                </td>
                <td style="width:90%">
                  <?php
                    $attributes = array(
                                          'class' => 'form-control',
                                          'id' => 'issue_code',
                                          'type' => "text",
                                          'name' => "issue_code",
                                          'placeholder' => "Issue Code",
                                          'value' => $this->input->post('issue_code')
                                          );

                    echo form_input($attributes);
                  ?>
                </td>
              </tr>
            </div>                

            <!-- <div style="margin-bottom: 25px" class="input-group">                     -->
              <tr style="width:100%">
                <td style="width:10%">
                  <label for='issueType'>Issue Type</label>
                </td>
                <td>
                  <?php
                    $options = array(
                                     'new_feature'  => 'New Feature',
                                     'blocker'    => 'Blocker',
                                     'bug'   => 'Bug',
                                     'improvement' => 'Improvement',
                                     'support_request' => 'Support Request',
                                     'third_party_issues' => 'Third Party Issue',
                                      );

                    echo form_dropdown('issue_type', $options, set_value('new_feature'));
                  ?>
                </td>
              </tr>
            <!-- </div> -->

            <!-- <div style="margin-bottom: 25px" class="input-group"> -->
              <tr>
                <td>
                  <label for='priority'>Priority</label>                    
                </td>
                <td>
                  <?php
                    $options = array(
                                     'blocker'  => 'Blocker',
                                     'critical'    => 'Critical',
                                     'major'   => 'Major',
                                     'minor' => 'Minor',
                                     'trivial' => 'Trivial'                                   
                                    );

                    echo form_dropdown('priority', $options, set_value('blocker'));
                  ?>
                </td>
              </tr>
            <!-- </div>                 -->

            <!-- <div style="margin-bottom: 25px" class="input-group"> -->
              <tr>
                <td>
                  <label for="summaryText" id="lblSummary">Summary</label>
                </td>
                <td>
                  <?php
                      $attributes = array(
                                        'class' => 'form-control',
                                        'id' => 'summary',
                                        'type' => "text",
                                        'name' => "summary",
                                        'placeholder' => "Summary",
                                        'value' => $this->input->post('summary')
                                        );

                      echo form_input($attributes);
                  ?>
                </td>
              </tr>
            <!-- </div> -->

            <!-- <div class="btn-group">   -->
              <tr>
                <td>
                  <?php echo form_label('Security Level :', 'security');?>            
                </td>                       
                <td>                       
                  <select id="ddlSecurityLevel">                    
                    <option>Logged-in users</option>
                    <option>Issue Reporters and developers</option>
                  </select>
                </td>
              </tr>
            <!-- </div>  -->
                
            <!-- <div> -->
              <tr>
                <td>
                  <label for="dueDate">Due Date</label>
                </td>
              </tr>
            <!-- </div> -->

            <!-- <div style="margin-top:10px" class="form-group"> -->
              <!-- <div class="col-sm-12 controls"> -->
                <tr>
                  <td>     
                    <?php
                            $attributes = array(
                                'class' => 'btn btn-primary',
                                'id' => 'form-submit',
                                'type' => "submit",
                                'name' => "submit",
                                'value' => "Create Issue"
                            );

                            echo form_submit($attributes);
                    ?>               
                    <!-- <button type="submit" class="btn btn-primary" id="btnCreateIssue" name="submit" value="Create">Create</button> -->
                  </td>
                </tr>
              <!-- </div> -->
            <!-- </div> -->
          </table>
        </div>
        <h4 style="color:red"> <?php echo validation_errors(); ?> </h4>
      </div>
    </div>                 
  </div> 
</form>