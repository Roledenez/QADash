<div class="right-side">
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
            <div class="panel-body" >
    <input type="text" class="form-control" id="dev-table-filter" data-action="filter"
           data-filters="#dev-table" placeholder="Filter Testcases by Testcase ID"/>
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
                            echo '<tr>';

                            echo '<td><b>Assignee ID</b></td>';
                            echo '<td>';
                            foreach ($value_2 as $result1) {                                                                                        
                            echo '<table class="table table-hover" id="dev-table">';
                                echo '<tr>';
                                echo '<td style="text-align:left">';
                                    echo $result1->AssigneeID;
                                echo '</td>';
                                echo '<td style="text-align:left">';
                                    echo $result1->Name;
                                echo '</td>';
                                echo '</tr>';
                            }
                            echo '</td>';
                            echo '</table>';
                        echo '</tr>';                                                                               
                    } 

                    else{
                    echo 'data not set';
                    }

                        if(isset($value_3)){
                            echo '<tr>';
                            echo '<td><b>Number of Testsuites</b></td>';
                                echo '<td>';                                                                                    
                                    echo $value_3[0]->numTestsuites; 
                                    echo '</a>';
                                echo '</td>'; 
                                echo '<td>';  
                                    if(($value_3[0]->numTestsuites)>0){
                                        echo '<a href="allTestsuites_c?var='.$pid.'">';
                                    }
                                        echo 'View All Testsuites';
                                        echo '</a>';
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
                            }  

                            else
                            {
                              echo 'data not set';
                            }
                        ?>				
              </tbody>
          </table>            

        </div>
    </div>
    </div>
</div>


