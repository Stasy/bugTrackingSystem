<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <?php

        include 'init.php';
        include '../configurations/roboBugConfig.php';

        $createTableClass = new init();
        $createTableClass->CreateTables("Table13");
    ?>
</body>
</html>