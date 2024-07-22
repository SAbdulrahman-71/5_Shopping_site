<?php

function html_connect()
{
    require('connection.php');
}


function html_header($title = 'Website')
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body>
    <?php
}


function menus()
{
}

function html_footer()
{
    ?>
    </body>

    </html>
<?php
}
