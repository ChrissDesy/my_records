<?php

    //handle posting
	if(isset($_POST["addRec"])) {
		$name = $_POST["name"];
	    $location = $_POST["location"];
	    $date = $_POST["date"];

	    $sql = 'INSERT INTO conferences (name, location, date) VALUES ("'.$name.'","'.$location.'","'.$date.'")';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./xconferences.php'; </script>";
	}

    //handle editing
	if(isset($_POST["editRec"])) {
		
	    $ref = $_POST["id"];
	    $name = $_POST["name"];
	    $location = $_POST["location"];
	    $date = $_POST["date"];

	    $sql = '
            UPDATE conferences SET
                name = "'.$name.'",
                date = "'.$date.'",
                location = "'.$location.'"
            WHERE id = "'.$ref.'"
        ';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./xconferences.php'; </script>";
	}

	//handle deleting
	if(isset($_POST["deleteRec"])) {
		$id = $_POST["id"];

	    $sql = "
			DELETE FROM conferences 
			WHERE id = '".$id."'
        ";
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./xconferences.php'; </script>";
		// echo $id;
	}

 ?>