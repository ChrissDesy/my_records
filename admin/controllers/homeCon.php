<?php

    // sql queries
    $sql = "
        SELECT
            (SELECT COUNT(*) FROM congregations) AS congs,
            (SELECT COUNT(*) FROM priests) AS priests,
            (SELECT COUNT(*) FROM missions) AS missions,
            (SELECT COUNT(*) FROM projects) AS proj
    ";

    // sql statements
    $statement = $db->prepare($sql);

    // execute and get results
    $statement->execute();

    $stats = $statement->fetchAll();

?>