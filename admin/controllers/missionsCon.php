<?php

    //handle posting
	if(isset($_POST["addRec"])) {
		$name = $_POST["name"];
	    $location = $_POST["location"];
	    $priest = $_POST["priest"];

	    $sql = 'INSERT INTO missions (name, location, priest) VALUES ("'.$name.'","'.$location.'","'.$priest.'")';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./missions.php'; </script>";
	}

    //handle editing
	if(isset($_POST["editRec"])) {
		
	    $ref = $_POST["id"];
	    $name = $_POST["name"];
	    $location = $_POST["location"];
	    $priest = $_POST["priest"];

	    $sql = '
            UPDATE missions SET
                name = "'.$name.'",
                location = "'.$location.'",
                priest = "'.$priest.'"
            WHERE id = "'.$ref.'"
        ';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./missions.php'; </script>";
	}

	//handle deleting
	if(isset($_POST["deleteRec"])) {
		$id = $_POST["id"];

	    $sql = "
			DELETE FROM missions 
			WHERE id = '".$id."'
        ";
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./missions.php'; </script>";
		// echo $id;
	}

 ?>