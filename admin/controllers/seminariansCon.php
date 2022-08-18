<?php

    //handle posting
	if(isset($_POST["addRec"])) {
		$name = $_POST["name"];
	    $sname = $_POST["sname"];
	    $educ = $_POST["education"];
	    $dob = $_POST["dob"];

	    $sql = 'INSERT INTO seminarians (name, surname, education, dob) VALUES ("'.$name.'","'.$sname.'","'.$educ.'","'.$dob.'")';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./seminarians.php'; </script>";
	}

    //handle editing
	if(isset($_POST["editRec"])) {
		
	    $ref = $_POST["id"];
	    $name = $_POST["name"];
	    $sname = $_POST["sname"];
	    $educ = $_POST["education"];
	    $dob = $_POST["dob"];

	    $sql = '
            UPDATE seminarians SET
                name = "'.$name.'",
                education = "'.$educ.'",
                dob = "'.$dob.'",
                surname = "'.$sname.'"
            WHERE id = "'.$ref.'"
        ';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./seminarians.php'; </script>";
	}

	//handle deleting
	if(isset($_POST["deleteRec"])) {
		$id = $_POST["id"];

	    $sql = "
			DELETE FROM seminarians 
			WHERE id = '".$id."'
        ";
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./seminarians.php'; </script>";
		// echo $id;
	}

 ?>