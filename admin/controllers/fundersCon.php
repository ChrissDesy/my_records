<?php

    //handle posting
	if(isset($_POST["addRec"])) {
		$name = $_POST["name"];
		$term = $_POST["term"];
	    $location = $_POST["location"];
	    $project = $_POST["project"];

	    $sql = 'INSERT INTO funders (name, location, project, term) VALUES ("'.$name.'","'.$location.'","'.$project.'","'.$term.'")';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./funders.php'; </script>";
	}

    //handle editing
	if(isset($_POST["editRec"])) {
		
	    $ref = $_POST["id"];
	    $name = $_POST["name"];
	    $term = $_POST["term"];
	    $location = $_POST["location"];
	    $project = $_POST["project"];

	    $sql = '
            UPDATE funders SET
                name = "'.$name.'",
                term = "'.$term.'",
                location = "'.$location.'",
                project = "'.$project.'"
            WHERE id = "'.$ref.'"
        ';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./funders.php'; </script>";
	}

	//handle deleting
	if(isset($_POST["deleteRec"])) {
		$id = $_POST["id"];

	    $sql = "
			DELETE FROM funders 
			WHERE id = '".$id."'
        ";
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./funders.php'; </script>";
		// echo $id;
	}

 ?>