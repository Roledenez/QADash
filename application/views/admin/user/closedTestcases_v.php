<div class="row" style="width: 204%;">   
    <div class="col-md-6">
        <div class="panel panel-primary" >
            <div class="panel-heading">
                <h3 class="panel-title">Closed Testcases</h3>

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
                <div class="box-content">
        <table class="table">

          <tbody> 
              <th>Testcase ID</th>
              <th>Description</th>
              <th>Assignee ID</th>
              <th>Assignee Name</th>

                    <?php

                        if(isset($value_1))
                        {           
                            foreach ($value_1 as $row)
                            {                                                                        

                                echo '<tr>';

                                    echo '<td>';   
                                        $tcid = $row->testcaseID;
                                        echo $tcid;
                                    echo '</td>';

                                    echo '<td>';
                                        echo $row->testcaseDesc;
                                    echo '</td>';

                                    echo '<td>';                                                                                
                                        echo $row->AssigneeID;                                                                                                                                                                        
                                    echo '</td>';

                                    echo '<td>';                                                                                
                                        echo $row->name;                                                                                                                                                                        
                                    echo '</td>';
                                    echo '<td>';
                                        echo '<a href = "testSteps_controller?var='.$tcid.'">';
                                        echo 'View Teststeps';
                                        echo '</a>';
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
                document.write('<u><a href = "javascript:history.back()">Back To Previous Page </a></u>');
            </script>
        </p>
        <!--<p><u><a href="projectLoader_c">Previous Page</a></u></p>-->
        <p><u><a href="dashboard">Home</a></u></p>
        </div>
    </div>
</div>
