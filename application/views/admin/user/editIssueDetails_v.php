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
            
            <table width="100%">
            <?php 
                if (isset($issueDetails)) 
                {
                    echo "<tr width='100%'>";
                        echo "<td width='70%' />";
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
                    echo '<tr>';                        
                        echo '<td>';
                            echo '<input type="text" id="txtSummary" disabled=true value='.$issueDetails[0]->summary.' onblur="HideBorder();" onfocus="ShowBorder();" />';
                        echo '</td>';
                    echo '</tr>';

                    echo '<tr>';                        
                        echo '<td>';
                        echo '<input type="text" id="txtDescription" disabled=true value='.$issueDetails[0]->description.' onblur="HideBorder();" onfocus="ShowBorder();" />';                            
                        echo '</td>';
                    echo '</tr>';

                    echo '<tr>';                        
                        echo '<td>';
                            echo 'Attachments';
                            echo '<div id="upload" style="display:none">' ;
                            echo '<input type="file" id="imageUpload" name="image" onchange="readURL(this);" />';           
                            echo '</div>';                   
                            echo '<a onclick="chooseImage();"><span class="glyphicon glyphicon-paperclip" /></a>';
                            echo '<br />';
                            echo '<div id="img" style="display:none">' ;
                            echo '<img id="abc" src="#" alt="your image" />';
                            echo '</div>';
                        echo '</td>';
                    echo '</tr>';
                }
                ?>
            </table>
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
    }

    function deleteIssue()
    {

    }

    function printIssue()
    {

    }

    function HideBorder()
    {
        var x = document.getElementById("txtSummary").style;
        x.borderStyle="none";
    }

    function ShowBorder()
    {
        var x = document.getElementById("txtSummary").style;
        x.borderStyle="solid";
    }

</script>