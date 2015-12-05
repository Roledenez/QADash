<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>

<script type="text/javascript">
    
    /**
    *
    * @package     application
    * @category    view
    * @author      Binalie Liyanage 
    *@method name  checkUncheckAll
    *@parameters   no parameters
    *@desciption   Checks all checkboxes when header checkbox is checked
    */
    function checkUncheckAll()
    {
        var x = $("input[name='issueCheck']").length;

        for(var i = 0; i<x; i++)
        {     
            if ($('#chkSelectAll').prop("checked") == true)            
            {
                $("input[name='issueCheck']").prop("checked",true);
            }

            else
            {
                $("input[name='issueCheck']").prop("checked",false);
            }
        }
        
    }

    /**
    *
    * @package     application
    * @category    view
    * @author      Binalie Liyanage 
    *@method name  DeleteMultipleIssues
    *@parameters   result
    *@desciption   Deletes selected issues from the table
    */
    function DeleteMultipleIssues(result)
    {
        var id;
        var checked = 0;
        if (result == 1) 
        {
            var x = $("input[name='issueCheck']").length;
            var issueCode;

            for(var i = 0; i<x; i++)
            {     
                id = 0;
                if ($('#'+i+'_'+id).prop("checked"))            
                {
                    checked++;
                    id = id + 1;
                    issueCode = $('#'+i+'_'+id).text();   
                    //$('#'+i+'_'+id).closest('tr').remove();
                    $('#cccc').attr("href","View_issue_details_controller/delete_multiple_issue/"+issueCode);
                    $('#cccc')[0].click();
                    
                }
            }          
            $('#chkSelectAll').prop("checked",false);        
            
            window.location.href = "View_all_issues_controller";
        }
    }

  /**
    *
    * @package     application
    * @category    view
    * @author      Binalie Liyanage 
    *@method name  Navigation
    *@parameters   issueId
    *@desciption   Navigate to view issue details page when cliocked on the issue code
    */
    function Navigation(issueId)
    {
        $('#lnkIssueId').attr('href','<?php echo base_url(); ?>View_issue_details_controller?var='+issueId);      
    }

    /**
    *
    * @package     application
    * @category    view
    * @author      Binalie Liyanage 
    *@method name  Navigation
    *@parameters   issueId
    *@desciption   Navigate to view issue details page when cliocked on the issue code
    */
    function DeleteSingleRecord(me)
    {      
      var y = me.id;
      var issueCode = y.slice(1,8);

      $('#dddd').attr("href","View_issue_details_controller/delete_issue/"+issueCode);
      $('#dddd')[0].click();
    }

    /**
    *
    * @package     application
    * @category    view
    * @author      Binalie Liyanage 
    *@method name  EditRecord
    *@parameters   me
    *@desciption   Navigate to the display issue details page
    */
    function EditRecord(me)
    {      
      //get the id of the clicked edit button
      var y = me.id;

      //seperate the issue code from the id
      var issueId = y.slice(1,8);

      //declare href for the hidden lnnk and programmatically click it
      $('#eeee').attr("href","View_issue_details_controller?var="+issueId);
      $('#eeee')[0].click();
    }

    /**
    *
    * @package     application
    * @category    view
    * @author      Binalie Liyanage 
    *@method name  setPriority
    *@parameters   no parameters
    *@desciption   set the value seletcted from the drownlist as the value of a hidden textinput
    */
    function SetPriority()
    {
        //obtaining the priority selected from the drop down
        var priority = $('#cmbPriority option:selected').text();

        //set it as value of text input
        $('#txtPriority').val(priority);
    }

     /**
    *
    * @package     application
    * @category    view
    * @author      Binalie Liyanage 
    *@method name  SetStatus
    *@parameters   no parameters
    *@desciption   set the value seletcted from the drownlist as the value of a hidden textinput
    */
    function SetStatus()
    {
      //obtaining the status selected from the drop down
        var status = $('#cmbStatus option:selected').text();

        //set it as value of text input
        $('#txtStatus').val(status);
    }

    /**
    *
    * @package     application
    * @category    view
    * @author      Binalie Liyanage 
    *@method name  SetIssueType
    *@parameters   no parameters
    *@desciption   set the value seletcted from the drownlist as the value of a hidden textinput
    */
    function SetIssueType()
    {
        //obtaining the issue type selected from the drop down
        var type = $('#cmbIssueType option:selected').text();

        //set it as value of text input
        $('#txtIssueType').val(type);
    }

    function hello()
    {
        alert("Binallie");
    }
</script>

<div class="container">
	<div class="row">
        <div class="col-md-11">
          <div class="panel panel-primary" >
            <div class="panel-heading">
              <h3 class="panel-title">Issues</h3>
              </div>
              <br />
              <br />
          
        <div class="table-responsive">                
              <form method='post' action='<?php echo base_url();?>engineer/View_all_issues_controller/filter_issues'>
                <table width="100%">
                    <tr width="100%"> 
                    <td style='width:1%'></td>
                        <td width="13%">
                            <select id='cmbStatus' onchange='SetStatus();'>
                                <option>-Select Status-</option>
                                <option>Open</option>
                                <option>Close</option>
                                <option>In-progress</option>
                            </select>
                            <input type='hidden' id='txtStatus' name='status'>
                        </td>

                        <td width="15%">
                            <select id='cmbIssueType' onchange='SetIssueType();'>
                                <option>-Select Issue Type-</option>
                                <option>New Feature</option>
                                <option>Blocker</option>
                                <option>Bug</option>
                                <option>Improvement</option>
                                <option>Support Request</option>
                                <option>Third Party Issue</option>
                            </select>
                            <input type='hidden' id='txtIssueType' name='issueType'>
                        </td>

                        <td width="13%">
                            <select id='cmbPriority' onchange='SetPriority();'>
                                <option>-Select Priority-</option>
                                <option>Blocker</option>
                                <option>Critical</option>
                                <option>Major</option>
                                <option>Minor</option>
                                <option>Trivial</option>
                            </select>
                            <input type='hidden' id='txtPriority' name='priority'>
                        </td>                        

                        <td width="57%">
                            <button type="submit" value="Filter">Filter</button>                            
                        </td>
                    </tr>
                </table>
                </form>

                <br />
                <table>
                  <tr>
                    
                    <td width="30%">
                    </td>
                    
                    <td width="68%" align="left">
                      <!-- <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="glyphicon glyphicon-trash" data-title="Delete" data-toggle="modal" data-target="#delete" ></button></p> -->
                      <p data-placement="top" data-toggle="tooltip" title="Delete Multiple"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p>
                    </td>

                    <td style='width:7%'>
                    </td>
                  
                  </tr>
                </table>
                <br />

              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   <th><input type="checkbox" id="chkSelectAll" name="issue" onclick="checkUncheckAll();" /></th>  
                   <th>IssueCode</th> 
                  <th>Status</th>       
                  <th>Issue Type</th>                          
                  <th>Priority</th>
                      <th>Edit</th>
                      
                       <th>Delete</th>
                   </thead>
    <tbody>
    <?php

        if(isset($issues))                            
          {
            $x = 0;
            foreach ($issues as $row) 
            {
              $y = 0;

              echo '<tr width="100%" id='.$x.'>'; 
                                    echo '<td><input type="checkbox" name="issueCheck" id='.$x."_".$y.' /></td>';                                                                      
                                    $y = $y + 1;
                                    echo '<td id='.$x."_".$y.'>';  
                                    $res1 = $row->issue_id;  
                                    //$a = base_url();                                                                    
                                        echo '<a id="lnkIssueId" href="View_issue_details_controller?var='.$res1.'">';                                    
                                            echo $row->issue_code;
                                            echo "<input type='hidden' id='txtStoreId' name='storeId' />";
                                            echo '<a id="cccc"></a>';
                                        echo '</a>';
                                    echo '</td>';  

                                    $y = $y + 1;

                                    echo '<td id='.$x."_".$y.'>';
                                        echo $row->status;
                                    echo '</td>';  

                                    $y = $y + 1;

                                    echo '<td id='.$x."_".$y.'>';
                                        echo $row->issue_type;
                                    echo '</td>';

                                    $y = $y + 1;  

                                    echo '<td id='.$x."_".$y.'>';
                                        echo $row->priority_type;
                                    echo '</td>';

                                    $y = $y + 1;                                                              

                                    echo '<td id='.$x."_".$y.'><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" id=e'.$row->issue_id.' onclick="EditRecord(this);"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
                                    echo '<a id="eeee"></a>';

                                    $y = $y + 1; 
                                    
                                    echo '<td id='.$x."_".$y.'><p data-placement="top" data-toggle="tooltip" title="Delete"><button name="singleDelete" class="btn btn-danger btn-xs" id=d'.$row->issue_code.' onclick="DeleteSingleRecord(this);"><span class="glyphicon glyphicon-trash"></span></button></p></td>';
                                    //echo '<td id='.$x."_".$y.'><p data-placement="top" data-toggle="tooltip" title="Delete"><button id=d'.$row->issue_code.' name="singleDelete" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="hello();"><span class="glyphicon glyphicon-trash" /></button></p></td>';
                                    echo '<a id="dddd"></a>';

                                echo '</tr>';
                                $x = $x + 1;
                              }
                            }
                            ?>

                      </tbody>
                          
                  </table>
                  </div>

                  <div class="clearfix"></div>
                  <ul class="pagination pull-right">
                    <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                  </ul>
                
            </div>
            
        </div>
	</div>
</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Mohsin">
        </div>
        <div class="form-group">
        
        <input class="form-control " type="text" placeholder="Irshad">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
    
        
        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
    
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" id="btnYes" class="btn btn-success" data-dismiss="modal" onclick="DeleteMultipleIssues(1);"><span class="glyphicon glyphicon-ok-sign" ></span>Yes</button>
       <button type="button" id="btnNo" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
    <!-- /.modal-dialog --> 
    </div>
