            <div class="right-side">
                <div class="row" style="width: 204%;">
                    <div class="col-md-6">
                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                    <h3 class="panel-title">Projects</h3>

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
                                  <th>Testsuite ID</th>
                                  <th>Project ID</th>
                                  <th>Name</th>
                                  <th>Description</th>                                  

                                        <?php

                                            if(isset($value_1))
                                            {   
                                                foreach ($value_1 as $row) {


                                                            echo '<tr>';                                                                                    
                                                                echo '<td>';   
                                                                    echo $row->testsuites_id;
                                                                echo '</td>';

                                                                echo '<td>';
                                                                    echo $row->project_id;
                                                                echo '</td>';

                                                                echo '<td>';
                                                                    echo $row->name;
                                                                echo '</td>';

                                                                echo '<td>';
                                                                    echo $row->description;
                                                                echo '</td>';                                                                
                                                            echo '</tr>';  
                                                }                                                               
                                            }      	
                                            else{
                                                    echo 'data not set';
                                            }
                                        ?>							

                              </tbody>
                      </table>      
                </div>
                        </div>
                    </div>
            </div>




