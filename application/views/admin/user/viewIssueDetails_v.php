<div class="row" style="width: 204%;">   
    <div class="col-md-6">
        <div class="panel panel-primary" >
            <div class="panel-heading">
            <?php 
                if (isset($issueDetails)) 
                {                    
                    echo '<h3 class="panel-title">'.$issueDetails[0]->issue_code.'</h3>';
                }
            ?>
                    <div class="pull-right">
                        <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter"
                          data-container="body">
                                <i class="glyphicon glyphicon-filter"></i>
                        </span>
                    </div>
            </div>

            <style type="text/css">
                .test input
                {
                    border:0;
                }

                input[type=text]:disabled
                {
                    background-color: white;
                }

            </style>
            
            
            <?php 
            
                if (isset($issueDetails)) 
                {
                    foreach ($issueDetails as $res)
                    {
                        echo "<table width='100%'>";
                            echo '<tr width="100%">';
                                
                                echo "<td width='94%' />";
                                echo "</td>";
                                
                                echo "<td width='2%'>";
                                    echo "<a><span class='glyphicon glyphicon-edit' onclick='editIssue();' /></a>";
                                echo "</td>";
                                
                                echo "<td width='2%'>";
                                    echo "<a><span class='glyphicon glyphicon-trash' onclick='deleteIssue();' /></a>";
                                echo "</td>";
                                
                                echo "<td width='2%'>";
                                    echo "<a><span class='glyphicon glyphicon-print' onclick='printIssue();' /></a>";
                                echo "</td>";                        
                            
                            echo "</tr>";
                        echo "</table>";
            

                        echo "<table width='100%'>";
                            
                            echo "<tr width=100%'>"; 
                                
                                echo "<td width='10%'>";  
                                    echo "<label for='summary'>"."Summary".'</label>';  
                                echo "</td>";  
                                
                                echo "<td width='90%'>";              
                                echo '<span class="test"><input type="text" id="txtSummary" disabled=true>'.$res->summary.'</input></span>';
                                echo "</td>"; 
                            
                            echo "</tr>";

                            echo "<tr>"; 
                                
                                echo "<td>";
                                    echo "<label for='desc'>"."Description".'</label>';
                                echo "</td>";
                                
                                echo "<td>";
                                    echo '<span class="test"><input type="text" id="txtDescription" disabled=true>'.$res->description.'</input></span>';                            
                                echo "</td>";
                            
                            echo "</tr>";
                        
                            echo "<tr width=100%'>";
                                
                                echo "<td width='10%'>";  
                                    echo "<label for='createdBy'>"."QA Engineer".'</label>';
                                echo "</td>";
                                
                                echo "<td width='90%'>";
                                    echo '<span class="test"><input type="text" id="txtCreatedBy" disabled=true>'.$res->created_by.'</input></span>';
                                    echo "<select id='cmbCreatedBy' style='Display:none'>";     
                                        echo "<option>".$res->created_by."</option>";
                                    echo "</select>";                                
                                echo "</td>";

                            echo "</tr>";

                            echo "<td style='width:100%'>"
                                echo "<label for>";
                            echo "</td>";

                        echo "</table>";
                    
                        echo "<table width='100%'>";
                            echo "<tr>"; 
                                
                                echo "<td>";
                                    echo 'Attachments';
                                    echo '<div id="upload" style="display:none">' ;
                                    echo '<input type="file" id="imageUpload" name="image" onchange="readURL(this);" />';           
                                    echo '</div>';                   
                                    echo '<a onclick="chooseImage();"><span class="glyphicon glyphicon-paperclip" /></a>';
                                    echo '<br />';
                                    echo '<div id="img" style="display:none">' ;
                                    echo '<img id="abc" src="#" alt="your image" />';
                                    echo '</div>';
                                echo "</td>";
                            
                            echo "</tr>";
                        echo "</table>";
                }
            }

                echo "<button type='button' id='btnSave' style='display:none'>Save</button>";
                echo "</table>";
                ?>
            
        </div>
        <p>
            <script>
                document.write('<u><a href = "javascript:history.back()">Back To Previous Page </a></u>');
            </script>
        </p>
        <p><u><a href="dashboard">Home</a></u></p>
    </div>

</div>

<script type="text/javascript">

    function chooseImage()
    {        
        $('#imageUpload').click();
    }

    function readURL(input)
    {
        $('#img').show();
        if (input.files && input.files[0]) 
        {   
            var reader = new FileReader();
            reader.onload = function(e)
            {              
                $('#abc').attr('src',e.target.result).width(100).height(100);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function editIssue()
    {
        $('#txtSummary').prop('disabled',false);
        $('#txtDescription').prop('disabled',false);
        //$('#txtCreatedBy').prop('disabled',false);
        $('#btnSave').show();
        $('#txtCreatedBy').hide();
        $('#cmbCreatedBy').show();
    }

    function deleteIssue()
    {

    }

    function printIssue()
    {

    }
</script>