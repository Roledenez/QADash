<section class="content">
    <style type="text/css">
        .calendar{
        font-family: Arial; font-size: 6 px;
            }
        table.calendar{
            margin: auto; border-collapse: collape;
            }

       .calendar .days td{
            width: 80px; height: 80px; padding:4px;
            border: 1px solid #999;
            vertical-align: top;
            background-color: #DEF;
       }

       .calendar .days td:hover{
            background-color: #FFF;
       }

       .calendar .highlight{
            font-weight: bold;
            color :#00F;
       }
    </style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<?php echo $calendar; ?>

<script type="text/javascript">
    $(document).ready(function(){
        $('.calendar .day').click(function(){
        day_num = $(this).find('.day_num').html();
        day_data = prompt('Enter Event', $(this).find('.content').html());

        if (day_data != null)
            {
                $.ajax({
                url: window.location,
                type: 'POST',
                data: {
                   day: day_num,
                   event: day_data
                },
                success: function(msg)
                {
                location.reload();
                }
            });
            }
        });
    });

</script>
</section>