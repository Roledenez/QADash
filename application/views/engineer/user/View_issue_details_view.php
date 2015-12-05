-<section class="content">

<script src ="<?php echo site_url('js/cjs/jquery-1.11.1.min.js') ?>"></script>
<script src ="<?php echo site_url('js/cjs/jquery.dataTables.min.js') ?>"></script>
<script src ="<?php echo site_url('js/cjs/dataTables.jqueryui.js') ?>"></script>
<script src ="<?php echo site_url('js/cjs/jquery-ui.js') ?>"></script>

<br /> <br />
<div class="container">   
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
              
            <?php 
                if (isset($issueDetails)) 
                {                    
                    echo '<h3 class="panel-title">'.$issueDetails[0]->issue_code.'</h3>';
                }
            ?>
            </div>

            <style type="text/css">
                .test input
                {
                    border:1;
                }

                input[type=text]:disabled
                {
                    background-color: white;
                }

                .test1 textarea
                {
                    border:0;
                    background-color: white;
                    width: 500px;
                    min-height:75px;
                    font-family: Arial, sans-serif;
                    font-size: 13px;
                    padding:5px;                
                }

                .txtStuff
                {
                    overflow: hidden;
                }

                .hiddendiv
                {
                    display: none;
                    white-space: pre-wrap;
                    width: 500px;
                    min-height: 50px;
                    font-family: Arial, sans-serif;
                    font-size: 13px;
                    padding: 5px;
                    word-wrap:break-word;                    
                }

                .common
                {
                    width: 500px;
                    min-height: 50px;
                    font-family: Arial, sans-serif;
                    overflow: hidden;
                }

                .lbr
                {
                    line-height: 3px;
                }

                .selectpicker
                {
                    style: 'btn-info';
                    size: 4;
                }

                .rcorners2 {
                    border-radius: 25px;
                    border: 2px solid #8AC007;
                    padding: 20px; 
                    width: 200px;
                    height: 150px; 
                }
}

            </style>

<script type="text/javascript">

    $(function()
    {
        var txt = $('#txtSummary');
        var hiddenDiv = $(document.createElement('div'));
        content = null;

        txt.addClass('txtStuff');
        hiddenDiv.addClass('hiddendiv common');

        $('body').append(hiddenDiv);

        txt.on('keyup',function()
        {
            content = content.replace(/\n/g, '<br>');
            hiddenDiv.html(content + '<br class="lbr">');

            $(this).css('height',hiddenDiv.height());
        });
     });

    function chooseImage()
    {        
        $('#imageUpload').click();
    }

    /*function readURL(input)
    {
        //$('#img').show();
        if (input.files && input.files[0])
        {   
            var reader = new FileReader();
            reader.onload = function(e)
            {              
                $('#abc').attr('src',e.target.result).width(100).height(100);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }*/

    function editIssue()
    {
        $('#txtSummary').prop('disabled',false);
        $('#txtDescription').prop('disabled',false);        
        $('#btnSave').show();
        $('#btnSave').prop('disabled',false);
        $('#cmbStatus').prop('disabled',false);
        $('#cmbPriority').prop('disabled',false);
        $('#cmbIssueType').prop('disabled',false);

    }

    function setAssignee()
    {
        var assignee = $('#cmbAssignee option:selected').text();
        $('#txtAssignee').val(assignee);
    }

    function setPriority()
    {
        var priority = $('#cmbPriority option:selected').text();
        $('#txtPriority').val(priority);
    }

    function setStatus()
    {
        var status = $('#cmbStatus option:selected').text();
        $('#txtStatus').val(status);
    }

    function setIssueType()
    {
        var type = $('#cmbIssueType option:selected').text();
        $('#txtIssueType').val(type);
    }

    function DeleteIssue(value)
    {
        var issueCode = $('#txtCode').val();

        if (value == 1) 
        {
            $('#form1').attr('action','View_issue_details_controller/delete_issue/'+issueCode); 
            $("#form1").submit();           
        };        
    }

    function UpdateIssue(value)
    {
        if (value == 1)
        {            
            $("#form1").attr('action','View_issue_details_controller/update_issue');
            $("#form1").submit();
            alert('stupid alert');
        }        
    }

//     window.preview = function (input) {
//     if (input.files && input.files[0]) {
//         $(input.files).each(function () {
//             var reader = new FileReader();
//             reader.readAsDataURL(this);
//             reader.onload = function (e) {
//                 $("#previewImg").append("<img class='thumb' src='" + e.target.result + "' height='100' width='100' padding-left='10px'>");
//             }
//         });
//     }
// }

    function printIssue()
    {

    }

    function Hello()
    {
        alert("Hello!!!");
    }

</script>
            <div class="box-body">
            
            <?php 
            
                if (isset($issueDetails)) 
                {
                    foreach ($issueDetails as $res)
                    {
                        $issueCode = $res->issue_code;
                        echo "<form id='form1' name='form1' method='post'>";                      
                            echo '<div class="row" style=" margin-left: 10px; margin-top: 15px;">';
                        echo "<table width='100%'>";
                        
                            echo '<tr width="100%">';
                                
                                echo "<td width='88%' />";
                                echo "</td>";
                                
                                echo "<td width='4%'>";
                                    echo "<p><button class='btn btn-info btn-xs'><span class='glyphicon glyphicon-edit' onclick='editIssue()' /></button></p>";
                                echo "</td>";
                                
                                echo "<td width='4%'>";                                     
                                    echo '<p data-placement="top" data-toggle="tooltip" title="Delete"><button id="btnDelete" name="singleDelete" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash" /></button></p>';
                                echo "</td>";
                                
                                echo "<td width='4%'>";
                                    echo "<p><button class='btn btn-success btn-xs'><span class='glyphicon glyphicon-print' onclick='printIssue();' /></button></p>";
                                echo "</td>";                        
                            
                            echo "</tr>";
                            
                        echo "</table>";
            

                        echo "<table width='100%'>";                           
                        
                            echo "<tr width=100%'>"; 
                                echo '<div class="form-group">';
                                echo "<td width='20%'>";  
                                    echo "<label for='summary1' class='col-sm-100 control-label' style='text-align:left'>"."Summary".'</label>';  
                                    echo "<input type='hidden' id='txtCode' name='issueCode' value=".$issueCode.">";
                                echo "</td>";  
                                
                                echo "<td width='80%'>";                                
                                echo "<span class='test'><textarea id='txtSummary' name='summary' class='form-control' disabled=true rows='1' style='width:80%' cols='1'>$res->summary</textarea></span>";
                                echo "</td>"; 
                            echo "</div>";
                            echo "</tr>";
                        echo "</table>";
                            
                        echo "<table width='100%'>";
                            echo "<tr>"; 
                                echo '<div class="form-group">';
                                echo "<td width='20%'>";
                                    echo "<label for='desc' class='col-sm-100 control-label' style='text-align:left'>"."Description".'</label>';
                                echo "</td>";
                                
                                echo "<td width='80%'>";
                                    echo "<span class='test'><textarea id='txtDescription' name='description' class='form-control' disabled=true rows='8' style='width:80%'>$res->description</textarea></span>";  

                                echo '</td>'; 
                            echo "</div>";
                            echo "</tr>";
                        echo "</table>";
                        
                        echo "<table width='100%'>";
                            echo "<tr width=100%'>";
                                echo '<div class="form-group">';
                                echo "<td width='20%'>";  
                                    echo "<label for='createdBy' class='col-sm-100 control-label' style='text-align:left'>"."QA Engineer".'</label>';
                                echo "</td>";
                                
                                echo "<td width='80%'>";
                                    echo "<span class='test'><input type='text' id='txtCreatedBy' name='creator' class='form-control' style='width:22%' disabled=true value=".$res->created_by." /></input></span>";                                                                    
                                echo "</td>";
                                echo "</div>";
                            echo "</tr>";

                        echo "</table>";

                        echo "<table style='width:100%'>";

                            echo "<tr style='width:100%'>";
                            echo '<div class="form-group">';
                                echo "<td style='width:20%'>";
                                    echo "<label for='issueType' class='col-sm-100 control-label' style='text-align:left'>"."Issue Type"."</label>";
                                echo "</td>";

                                echo "<td style='width:80%'>";
                                    $type = $res->issue_type;                                    
                                    echo "<select id='cmbIssueType' name='issueType' class='btn btn-default btn-md dropdown-toggle' data-style='btn-primary' style='width:22%' disabled=true>";                                         
                                        echo "<option>"."New Feature"."</option>";
                                        echo "<option>"."Blocker"."</option>";
                                        echo "<option>"."Bug"."</option>";
                                        echo "<option>"."Improvement"."</option>";                                        
                                        echo "<option>"."Support Request"."</option>"; 
                                        echo "<option>"."Third Party Issue"."</option>"; 
                                    echo "</select>";
                                echo "</td>";
                                echo "</div>";                                
                                
                            echo "</tr>";
                            echo "</table>";

                            echo "<table style='width:100%'>";
                            echo "<tr style='width:100%'>"; 
                            echo '<div class="form-group">';  
                                echo "<td style='width:20%'>";
                                    echo "<label for='priority' class='col-sm-100 control-label' style='text-align:left'>"."Priority"."</label>";
                                echo "</td>";
                                echo "<td style='width:80%'>";
                                    $priority = $res->priority_type;
                                    echo "<select id='cmbPriority' name='priority' class='btn btn-default btn-md dropdown-toggle' data-style='btn-primary' style='width:22%' disabled=true >";                                         
                                        echo "<option>"."Blocker"."</option>";
                                        echo "<option>"."Critical"."</option>";
                                        echo "<option>"."Major"."</option>";
                                        echo "<option>"."Minor"."</option>";
                                        echo "<option>"."Trivial"."</option>";
                                    echo "</select>";
                                echo "</td>";
                                echo "</div>";
                                echo "</tr>";
                                echo "</table>";

                                echo "<table style='width:100%'>";
                                echo "<tr style='width:100%'>"; 
                                echo '<div class="form-group">';  
                                echo "<td style='width:20%'>";
                                    echo "<label for='status' class='col-sm-100 control-label' style='text-align:left'>"."Status"."</label>";
                                echo "</td>";
                                echo "<td style='width:80%'>";
                                    $status = $res->status;
                                    echo "<select id='cmbStatus' name='status' class='btn btn-default btn-md dropdown-toggle' data-style='btn-primary' style='width:22%' disabled=true>";                                         
                                        echo "<option>"."Open"."</option>";                                        
                                        echo "<option>"."ReOpen"."</option>";
                                        echo "<option>"."InProgress"."</option>";                                        
                                        echo "<option>"."Fixed"."</option>"; 
                                        echo "<option>"."Close"."</option>";
                                    echo "</select>";
                                echo "</td>";
                                echo "</div>";                       
                            echo "</tr>";

                        echo "</table>";
                    
                        echo "<table width='100%'>";

                            echo "<tr style='width:100%'>"; 

                                echo '<div class="form-group">';
                                // echo "<td style='width:20%'>";
                                //     echo '<input type="file" name="image" onchange="preview(this);" multiple="multiple" />';
                                //     echo '<div id="previewImg"></div>';
                                //     echo '<input id="uploadBtn" type="submit" onclick="handleFileSelect();" value="Upload" name="submit"></input>';
                                // echo "</td>";

                            echo "</div>";

                            echo "</tr>";

                        echo "</table>";

                        echo "<br />";

                        echo "<table style='width:100%'>";
                            echo "<tr style='width:100%'>";
                                echo "<td style='width:20%'></td>";
                                echo "<td style='width:80%'>";
                                    echo '<p data-placement="top" title="Save"><button id="btnSave" disabled=true class="btn btn-primary btn-md" style="width:22%" data-title="Update" data-toggle="modal" data-target="#update" >Update</button></p>';
                                echo "</td>";

                            echo "</tr>";
                        echo "</table>";
                echo "</div>";
            }
        }
        
                ?>
                </div>                           
        </div>
    </div>
        
</div>
<p>
    <script>
        document.write('<u><a href = "javascript:history.back()">Back To Previous Page </a></u>');
    </script>
</p>
<p><u><a href="dashboard">Home</a></u></p>
</div>
</section>

<!-- Update alert -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Save this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to update this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" id="btnYes" class="btn btn-success" data-dismiss="modal" onclick="UpdateIssue(1);"><span class="glyphicon glyphicon-ok-sign" ></span>Yes</button>
       <button type="button" id="btnNo" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
    <!-- /.modal-dialog --> 
    </div>

<!-- Delete alert -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" id="btnYes" class="btn btn-success" data-dismiss="modal" onclick="DeleteIssue(1);"><span class="glyphicon glyphicon-ok-sign" ></span>Yes</button>
       <button type="button" id="btnNo" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
    <!-- /.modal-dialog --> 
    </div>