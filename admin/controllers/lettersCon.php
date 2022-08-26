<?php

    //handle posting
	if(isset($_POST["addRec"])) {
		$title = $_POST["title"];
	    $from = $_POST["from"];
	    $date = $_POST["date"];

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $theFile = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            
            $sql = 'INSERT INTO letters (title, letters.from, date, fname) VALUES ("'.$title.'","'.$from.'","'.$date.'","'.$target_file.'")';
	    
            $query = $db->prepare($sql);   
            $query->execute();

            echo "<script type='text/javascript'> document.location ='./letters.php'; </script>";
        } 
        else {
            echo "Sorry, there was an error uploading your file.";
        }

	}

    //handle editing
	if(isset($_POST["editRec"])) {
		
	    $ref = $_POST["id"];
	    $title = $_POST["title"];
	    $from = $_POST["from"];
	    $date = $_POST["date"];

	    $sql = '
            UPDATE letters SET
                title = "'.$title.'",
                date = "'.$date.'",
                letters.from = "'.$from.'"
            WHERE id = "'.$ref.'"
        ';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./letters.php'; </script>";
	}

	//handle deleting
	if(isset($_POST["deleteRec"])) {
		$id = $_POST["id"];

	    $sql = "
			DELETE FROM letters 
			WHERE id = '".$id."'
        ";
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./letters.php'; </script>";
		// echo $id;
	}

 ?>