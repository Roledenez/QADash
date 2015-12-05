<section class="content">
    <br> 
        <script src ="<?php echo site_url('js/cjs/jquery-1.11.1.min.js') ?>"></script>
        <script src ="<?php echo site_url('js/cjs/jquery.dataTables.min.js') ?>"></script>
        <script src ="<?php echo site_url('js/cjs/dataTables.jqueryui.js') ?>"></script>
        <script src ="<?php echo site_url('js/cjs/jquery-ui.js') ?>"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo site_url('js/themes/blitzer/jquery-ui.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('js/themes/blitzer/jquery-ui.min.css.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('js/themes/blitzer/theme.css') ?>">
        <html lang=en>
            <head>
                <meta charset="UTF-8">
                <title>To Do </title>
                <style type="text/css">
                    .list{
                        background-color:#FFF;
                        margin:20px auto;
                        width:100%;
                        max-width:500px;
                        padding:20px;
                        border-radius:2px;
                        box-shadow:3px 3px 0 rgba(0, 0, 0, .1);
                        box-sizing:boarder-box;
                     }

                    .items{
                        margin:0;
                        padding:0;
                        list-style-type:none;
                    }

                    .items li:hover .done-button{
                        opacity:1;
                    }

                    .items .item_done{
                        text-decoration:line-through;
                    }

                    .done-button{
                        display:inline-block;
                        font-size:0.8em;
                        background-color:#d9dfe1;
                        color:#363639;
                        padding:3px 6px;
                        boarder:0;
                        opacity:0.4;
                    }

                    .items li,
                    .item-add .input{
                        border:0;
                        border-bottom:1px dashed #ccc;
                        padding: 15px 0;
                    }

                    .input{
                        width:100%;
                    }

                    .input:focus {
                        outline:none;
                    }

                    .submit{
                        background-color:#fff;
                        padding:5px 10px;
                        boarder:1px solid #ddd;
                        width:100%;
                        margin-top:10px;
                        box-shadow:3px 3px 0 #ddd;
                    }
                </style>

             </head>
             <body>
                <div class="list">
                <h1 class="header">To Do</h1>
                <?php if(!empty($task)):?>
                
                <ul class="items">                   
                <?php for ($i = 0; $i < count($task); $i++) { ?>
                    <li>
                        <span class="item">
                            <?php
                                $viewTask=$task[$i]->task;
                                echo $viewTask;
                                //$memID = $mem[$i]->users_id;
                            ?>
                        </span>
                                                        
                <?php echo form_open("admin/todo_controller/deleteToDo/$viewTask");                                                      
                ?> 
                        
                <input type="submit" class="done-button" value="Mark As Done" /></td>
                    <?php echo form_close(); ?>
                    </li>
                    <?php } ?>                    
                </ul>
                
                <?php else: ?>
                    <p>You haven't added any items yet!!</p>
                <?php endif; ?>
                      
                <form class="item-add" action="addToDo" method="post">
                    <input type="text" name="name" placeholder="Type a new item here" class="input" autocomplete="off" required>            
                    <input type="submit" class="btn btn-block btn-primary" value="Add" name="Add">                   
                </form>                 
            </div>
        </body>
        <section>
