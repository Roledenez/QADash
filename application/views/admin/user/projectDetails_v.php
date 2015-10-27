<div class="row" style="width: 204%;">   
    <div class="col-md-6">
        <div class="panel panel-primary" >
            <div class="panel-heading">
                <h3 class="panel-title">Project Details</h3>

                    <div class="pull-right">
                        <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter"
                          data-container="body">
                                <i class="glyphicon glyphicon-filter"></i>
                        </span>
                    </div>
            </div>
            
            <table class="table table-hover" id="dev-table">
              <tbody>                                                           
                    <?php                                   
                    if(isset($value_1))
                    {          
                        echo '<tr>';
                            echo '<td><b>Project ID</b></td>';
                            echo '<td>';  
                            $pid = $value_1[0]->ProjectID;
                                echo $pid;
                            echo '</td>';
                        echo '</tr>';
                        echo '<tr>';
                            echo '<td><b>Project Name</b></td>';                                                                                    
                            echo '<td>';
                                echo $value_1[0]->ProjectName;
                            echo '</td>';
                        echo '</tr>';
                        echo '<tr>';
                            echo '<td><b>Project Description</b></td>';                                                                                    
                            echo '<td>';
                                echo $value_1[0]->ProjectDescription;
                            echo '</td>';
                        echo '</tr>';
                    }
                    else
                    {
                        echo 'data not set';
                    }

                    if(isset($value_2))
                    {                                                                   
                        echo '<tr style="text-align:left">';

                        echo '<td><b>Assignee</b></td>';
                        echo '<td>';

                        echo '<table width="100%">';
                        echo '<th width="30%">Assignee ID</th>';
                        echo '<th width="70%">Assignee Name</th>';
                        foreach ($value_2 as $result1) {                                                                                        
                        echo '<table class="table table-hover" id="dev-table">';
                            echo '<tr>';                                
                            echo '<td width="30%">';
                                echo $result1->AssigneeID;
                            echo '</td>';
                            echo '<td width="70%">';
                                echo $result1->Name;
                            echo '</td>';                                
                            echo '</tr>';                            
                        }
                        echo '</table>';
                        echo '</td>';

                        echo '</tr>';                                                                               
                    } 

                    else
                    {
                        echo 'data not set';
                    }
                        
                    if(isset($value_3)){
                        echo '<tr>';
                        echo '<td><b>Number of Testsuites</b></td>';
                            echo '<td>'; 
                            echo '<table width="100%">';
                            echo '<tr>';
                            echo '<td width="30%">';
                                echo $value_3[0]->numTestsuites; 
                                echo '</a>';
                            echo '</td>'; 
                            echo '<td width="100%">';  
                                if(($value_3[0]->numTestsuites)>0){
                                    echo '<a href="allTestsuites_c?var='.$pid.'">';
                                }
                                    echo 'View All Testsuites';
                                    echo '</a>';
                            echo '</td>';
                            echo '</tr>';
                            echo '</table>';
                            echo '</td>';
                        echo '</tr>';                                                                                
                    }  

                    else{
                        echo 'data not set';
                    }                       
                        
                    if(isset($value_4))
                        {
                            echo '<tr>';
                            echo '<td><b>Number of Open Testsuites</b></td>';
                                echo '<td>'; 
                                echo '<table width="100%">';
                                echo '<tr>';
                                echo '<td width="30%">';
                                    echo $value_4[0]->numOpenTestsuites; 
                                    echo '</a>';
                                echo '</td>'; 
                                echo '<td>';  
                                    if(($value_4[0]->numOpenTestsuites)>0){
                                        echo '<a href="openTestsuites_controller?var='.$pid.'">';
                                    }
                                        echo 'View Open Testsuites';
                                        echo '</a>';
                                echo '</td>';
                                echo '</tr>';
                                echo '</table>';
                                echo '</td>';
                            echo '</tr>';                                                                                
                            }  

                            else
                            {
                                echo 'data not set';
                            }

                            if(isset($value_5))
                            {
                                echo '<tr>';
                                echo '<td><b>Number of Closed Testsuites</b></td>';
                                    echo '<td>'; 
                                    echo '<table width="100%">';
                                    echo '<tr>';
                                    echo '<td width="30%">';
                                        echo $value_5[0]->numClosedTestsuites; 
                                        echo '</a>';
                                    echo '</td>'; 
                                    echo '<td>';  
                                        if(($value_5[0]->numClosedTestsuites)>0){
                                            echo '<a href="closedTestsuites_controller?var='.$pid.'">';
                                        }
                                            echo 'View Closed Testsuites';
                                            echo '</a>';
                                    echo '</td>';
                                    echo '</tr>';
                                    echo '</table>';
                                    echo '</td>';
                                echo '</tr>';                                                                                
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
                document.write('<u><a href = "javascript:history.back()">Back To Previous Page </a></u>');
            </script>
        </p>
        <!--<p><u><a href="projectLoader_c">Previous Page</a></u></p>-->
        <p><u><a href="dashboard">Home</a></u></p>
    </div>
</div>



