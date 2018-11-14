<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>


    </head>
    <body>
        <?php
        foreach($list_tj as $row)
        {
            if($row['poster'] == 1)
            {
                $bgc = '#fff';
                $ta = 'left';
            }
            else
            {
                $bgc = '#e4f4e3';
                $ta = 'right';
            }
        ?>
        <div style="border-style: solid;border-width: 1px; border-color:#b7e8b4;padding:4px; margin-bottom:6px; background-color:<?php echo $bgc;?>; text-align:<?php echo $ta;?>">
            <strong><?php echo $row['nama'];?> @<?php echo $row['waktu'];?></strong><br>
            <?php echo $row['konten'];?>
        </div>
        <?php } ?>

    </body>
</html>