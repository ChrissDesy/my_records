<?php

    //handle posting
	if(isset($_POST["addRec"])) {
		$name = $_POST["name"];
	    $sname = $_POST["sname"];
	    $baptism = $_POST["baptism"];
	    $dob = $_POST["dob"];
	    $ordination = $_POST["ordination"];
	    $confirmation = $_POST["confirmation"];

	    $sql = 'INSERT INTO priests (name, surname, baptism, dob, confirmation, ordination) VALUES ("'.$name.'","'.$sname.'","'.$baptism.'","'.$dob.'","'.$confirmation.'","'.$ordination.'")';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./priests.php'; </script>";
	}

    //handle editing
	if(isset($_POST["editRec"])) {
		
	    $ref = $_POST["id"];
	    $name = $_POST["name"];
	    $sname = $_POST["sname"];
	    $baptism = $_POST["baptism"];
	    $dob = $_POST["dob"];
	    $ordination = $_POST["ordination"];
	    $confirmation = $_POST["confirmation"];

	    $sql = '
            UPDATE priests SET
                name = "'.$name.'",
                baptism = "'.$baptism.'",
                dob = "'.$dob.'",
                ordination = "'.$ordination.'",
                confirmation = "'.$confirmation.'",
                surname = "'.$sname.'"
            WHERE id = "'.$ref.'"
        ';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./priests.php'; </script>";
	}

	//handle deleting
	if(isset($_POST["deleteRec"])) {
		$id = $_POST["id"];

	    $sql = "
			DELETE FROM priests 
			WHERE id = '".$id."'
        ";
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./priests.php'; </script>";
		// echo $id;
	}

 ?>