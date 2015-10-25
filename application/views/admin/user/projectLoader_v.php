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
                       data-filters="#dev-table" placeholder="Filter Projects by Name"/>
            </div>
            <table class="table table-hover" id="dev-table">
                <thead>
                <tr>
                    <th>Project ID</th>
                    <th>Project Name</th>
                    <th>Project Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php                          

                        if (isset($result)) {                            
                            if (is_array($result) || is_object($result)){                                
                            foreach ($result as $row) {    
                                $res1 = $row->project_id;
                                $res2 = $row->name;
                                $res3 = $row->description;
                                $res4 = $row->starting_date;
                                $res5 = $row->ending_date;

                                echo '<tr>';

                                echo '<td class="center">';                                
                                echo $res1;                                
                                echo '</td>';

                                echo '<td class="center">';
                                echo $res2;
                                echo '</td>';

                                echo '<td class="center">';
                                echo $res3;
                                echo '</td>';

                                echo '<td class="center">';
                                echo $res4;
                                echo '</td>';

                                echo '<td class="center">';
                                echo $res5;
                                echo '</td>';

                                echo '<td class="center">';
                                echo '<a href="projectDetails_c?var='.$res1.'">';
                                echo 'View Project Details';
                                echo '</a>';
                                echo '</td>';

                                echo '</tr>';
                            }
                        }} else {
                            echo 'data not set';
                        }
                    ?>
                </tr>                    
                </tbody>                    
            </table>                
        </div>
        <a href="dashboard">Back To Homepage </a>
    </div>
</div>
