<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />
</head>

<body>
    <?php include "html/header.html"; ?>
    <main>
        <?php
        include "php/search-bar.php";
        include "html/about-us.html";
        ?>
    </main>
    <?php include "html/footer.html"; ?>
</body>

</html>