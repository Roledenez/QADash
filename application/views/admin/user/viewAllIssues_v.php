<div class="row" style="width: 204%;">
    <div class="col-md-6">
        <div class="panel panel-primary" >
            <div class="panel-heading">
                <h3 class="panel-title">Issues</h3>
                <div class="pull-right">
                    <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter"
                              data-container="body">
                        <i class="glyphicon glyphicon-filter"></i>
                    </span>
                </div>
            </div>
            <div class="panel-body" >
                <input type="text" class="form-control" id="dev-table-filter" data-action="filter"
                       data-filters="#dev-table" placeholder="Filter Issues by Issue Code" />
                <br />
                <br />
                <table width="100%">
                    <tr width="100%">
                        <td width="13%">
                            <select>                    
                                <option>-Select version-</option>
                            <?php 
                                if (isset($versions)) 
                                {
                                    foreach ($versions as $row) 
                                    {
                                        echo '<option>'.$row->version_code.'</option>';                            
                                    }
                                }
                            ?>
                            </select>
                        </td>

                        <td width="13%">
                            <select>
                                <option>-Select Status-</option>
                                <option>Open</option>
                                <option>Close</option>
                                <option>In-progress</option>
                            </select>
                        </td>

                        <td width="13%">
                            <select>
                                <option>-Select Priority-</option>
                                <option>Blocker</option>
                                <option>Critical</option>
                                <option>Major</option>
                                <option>Minor</option>
                                <option>Trivial</option>
                            </select>
                        </td>

                        <td width="15%">
                            <select>
                                <option>-Select Issue Type-</option>
                                <option>New Feature</option>
                                <option>Blocker</option>
                                <option>Bug</option>
                                <option>Improvement</option>
                                <option>Support Request</option>
                                <option>Third Party Issue</option>
                            </select>
                        </td>

                        <td width="13%">
                            <button type="button" value="Filter" onclick="<?php echo base_url('viewAllIssues_c/filterIssues');?>">Filter</button>
                        </td>

                        <td width="63%" align="right">
                            <a onclick="deleteIssues();"><span class='glyphicon glyphicon-trash' /></a>
                        </td>
                    </tr>
                </table>
            </div>

            <table class="table table-hover" id="dev-table" width="100%">

              <tbody> 
                  <th><input type="checkbox" id="chkSelectAll" name="issue" onclick="checkUncheckAll();" /></th>  
                  <th>IssueCode</th> 
                  <th>Created By</th>
                  <th>Assignee</th>
                  <th>Status</th>       
                  <th>Issue Type</th>                          

                    <?php

                        if(isset($issues))
                        {   
                            foreach ($issues as $row) {


                                echo '<tr width="100%">'; 
                                    echo '<td width="5%"><input type="checkbox" name="issueCheck" onclick="checkChkBoxes();" /></td>';                                                                      
                                    echo '<td width="19%">';  
                                    $res1 = $row->issue_id;                                                                      
                                        echo '<a href="viewIssueDetails_c?var='.$res1.'">';                                    
                                            echo $row->issue_code;
                                        echo '</a>';
                                    echo '</td>';

                                    echo '<td width="19%">';
                                        echo $row->issueCreator;
                                    echo '</td>';

                                    echo '<td width="19%">';
                                        echo $row->AssignedTo;
                                    echo '</td>';

                                    echo '<td width="19%">';
                                        echo $row->status;
                                    echo '</td>';  

                                    echo '<td width="19%">';
                                        echo $row->issue_type;
                                    echo '</td>';                                                              
                                echo '</tr>';  
                            }                                                               
                        }      	
                        else
                        {
                            echo 'data not set';
                        }
                    ?>							

              </tbody>
            </table>  
        </div>
        <p>
            <script>
                document.write('<u><a href = "javascript:history.back()">Previous Page </a></u>');
            </script>
        </p>
        <p><u><a href="dashboard">Home</a></u></p>
    </div>
</div>


<script type="text/javascript">
    
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

    function deleteIssues()
    {
        alert("Hello Binz!");
    }
</script>


