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
                        foreach ($value_1 as $row) {
                            echo '<tr>';
                            echo '<td><b>Testsuite ID</b></td>';
                                echo '<td>';  
                                $pid = $row->testsuitesID;
                                    echo $pid;
                                echo '</td>';
                            echo '</tr>';
                            echo '<tr>';
                                echo '<td><b>Project ID</b></td>';                                                                                    
                                echo '<td>';
                                    echo $row->projectID;
                                echo '</td>';
                            echo '</tr>';
                            echo '<tr>';
                                echo '<td><b>Testsuite Name</b></td>';                                                                                    
                                echo '<td>';
                                    echo $row->testsuiteName;
                                echo '</td>';
                            echo '</tr>';
                            echo '<tr>';
                                echo '<td><b>Testsuite Description</b></td>';                                                                                    
                                echo '<td>';
                                    echo $row->testsuiteDescription;
                                echo '</td>';
                            echo '</tr>';
                            echo '<tr>';
                                echo '<td><b>Status</b></td>';                                                                                    
                                echo '<td>';
                                    echo $row->testsuiteStatus;
                                echo '</td>';
                            echo '</tr>';
                            echo '<tr>';
                                echo '<td><b>Number of testcases</b></td>';                                                                                    
                                echo '<td>';
                                    echo $row->numTestcases;
                                echo '</td>';
                                echo '<td>';
                                    echo '<a href = "allTestcases_c?var='.$pid.'">';
                                    echo 'View All testcases';
                                echo '</td>';
                            echo '</tr>';
                        }

                        }

                        else
                        {
                            echo 'data not set';
                        }

                        if(isset($value_2))
                        {
                            foreach ($value_2 as $row2) {
                                echo '<tr>';
                                    echo '<td><b>Number of closed testcases</b></td>';                                                                                    
                                    echo '<td>';
                                        $closedNum = $row2->numClosedTestcases;
                                        echo $closedNum;
                                    echo '</td>';
                                    echo '<td>';
                                    if($closedNum>0)
                                    {
                                        echo '<a  href = "closedTestcases_c?var='.$pid.'">';
                                            echo 'View Closed Testcases';
                                        echo '</a>';
                                    }
                                    echo '</td>';
                                echo '</tr>';
                            }

                            }
                            else
                            {
                                echo 'data not set';
                            }
                            
                        if(isset($value_3))
                        {
                            foreach ($value_3 as $row3) {
                                echo '<tr>';
                                    echo '<td><b>Number of open testcases</b></td>';                                                                                    
                                    echo '<td>';
                                        $openNum = $row3->numOpenTestcases;
                                        echo $openNum;
                                    echo '</td>';
                                    echo '<td>';
                                    if($openNum>0)
                                    {
                                        echo '<a  href = "openTestcases_c?var='.$pid.'">';
                                            echo 'View Open Testcases';
                                        echo '</a>';
                                    }
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
    </div>
    </div>
</div>


