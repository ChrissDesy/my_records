<?php

    // sql queries
    $sql = "
        SELECT
            (SELECT COUNT(*) FROM congregations) AS congs,
            (SELECT COUNT(*) FROM priests) AS priests,
            (SELECT COUNT(*) FROM missions) AS missions,
            (SELECT COUNT(*) FROM projects) AS proj
    ";
    $sql1 = "SELECT * FROM conferences LIMIT 0, 5";
    $sql2 = "SELECT * FROM letters LIMIT 0, 5";

    // sql statements
    $statement = $db->prepare($sql);
    $statement1 = $db->prepare($sql1);
    $statement2 = $db->prepare($sql2);

    // execute and get results
    $statement->execute();
    $statement1->execute();
    $statement2->execute();

    $stats = $statement->fetchAll();
    $confs = $statement1->fetchAll();
    $letters = $statement2->fetchAll();


?>