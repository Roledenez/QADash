<div class="row" style="width: 204%;">
    <div class="col-md-6">
        <div class="panel panel-primary" >
            <div class="panel-heading">
                <h3 class="panel-title">Log Tracker</h3>

                <div class="pull-right">
                    <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter"
                        data-container="body">
                            <i class="glyphicon glyphicon-filter"></i>
                    </span>
                </div>
            </div>
            
            <table class="table table-hover" id="dev-table">
                <thead>
                <tr>
                    <th>Session ID</th>
                    <th>IP Address</th>
                    <th>Users Name</th>
                    <th>Session Start Date</th>
                    <th>Session Start Time</th>
                    <th>Session End Date</th>
                    <th>Session End Time</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php                          

                    if (isset($result)) {                            
                        if (is_array($result) || is_object($result)){                                
                        foreach ($result as $row) {    
                            $res1 = $row->sessionID;
                            $res2 = $row->IPAddress;
                            $res3 = $row->usersName;
                            $res4 = $row->start_date;
                            $res5 = $row->session_start_time;
                            $res6 = $row->end_date;
                            $res7 = $row->session_end_time;
                            

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
                            echo $res6;
                            echo '</td>';

                            echo '<td class="center">';
                            echo $res7;
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
        <p>
        <script>
            document.write('<u><a href = "javascript:history.back()">Previous Page </a></u>');
        </script>
        </p>
        <!--<p><u><a href="projectDetails_c?var=<?php echo $pid; ?>">Previous Page</a></u></p>-->
        <p><u><a href="dashboard">Home</a></u></p>
    </div>
</div>
