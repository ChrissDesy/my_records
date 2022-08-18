<?php

    //handle posting
	if(isset($_POST["addRec"])) {
		$name = $_POST["name"];
	    $location = $_POST["location"];
	    $apst = $_POST["apstolace"];
	    $comm = $_POST["community"];
	    $priest = $_POST["priest"];

	    $sql = 'INSERT INTO congregations (name, location, community, priest, apstulace) VALUES ("'.$name.'","'.$location.'","'.$comm.'","'.$priest.'","'.$apst.'")';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./congregations.php'; </script>";
	}

    //handle editing
	if(isset($_POST["editRec"])) {
		
	    $ref = $_POST["id"];
	    $name = $_POST["name"];
	    $location = $_POST["location"];
	    $apst = $_POST["apstolace"];
	    $comm = $_POST["community"];
	    $priest = $_POST["priest"];

	    $sql = '
            UPDATE congregations SET
                name = "'.$name.'",
                location = "'.$location.'",
                community = "'.$comm.'",
                apstulace = "'.$apst.'",
                priest = "'.$priest.'"
            WHERE id = "'.$ref.'"
        ';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./congregations.php'; </script>";
	}

	//handle deleting
	if(isset($_POST["deleteRec"])) {
		$id = $_POST["id"];

	    $sql = "
			DELETE FROM congregations 
			WHERE id = '".$id."'
        ";
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./congregations.php'; </script>";
		// echo $id;
	}

 ?>