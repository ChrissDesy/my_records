<?php

    //handle posting
	if(isset($_POST["addRec"])) {
		$title = $_POST["title"];
	    $respon = $_POST["responsible"];

	    $sql = 'INSERT INTO projects (title, responsible) VALUES ("'.$title.'","'.$respon.'")';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./projects.php'; </script>";
	}

    //handle editing
	if(isset($_POST["editRec"])) {
		
	    $ref = $_POST["id"];
	    $title = $_POST["title"];
	    $respon = $_POST["responsible"];

	    $sql = '
            UPDATE projects SET
                title = "'.$title.'",
                responsible = "'.$respon.'"
            WHERE id = "'.$ref.'"
        ';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./projects.php'; </script>";
	}

	//handle deleting
	if(isset($_POST["deleteRec"])) {
		$id = $_POST["id"];

	    $sql = "
			DELETE FROM projects 
			WHERE id = '".$id."'
        ";
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./projects.php'; </script>";
		// echo $id;
	}

 ?>