<?php

    //handle posting
	if(isset($_POST["addItem"])) {
		$anum = $_POST["anum"];
	    $snum = $_POST["snum"];
	    $date = $_POST["date"];
	    $typ = $_POST["typ"];
	    $expiry = $_POST["expiry"];
		$desc = $_POST["desc"];
		$make = $_POST["make"];
		$model = $_POST["model"];
		$dat2 = date("Y-m-d");
		$created = $_SESSION['username'];

	    $sql = 'INSERT INTO assets (date_acquired, expiry, description, make, model, serial_number, asset_number, created_by, date_added, status, type) VALUES ("'.$date.'","'.$expiry.'","'.$desc.'","'.$make.'","'.$model.'","'.$snum.'","'.$anum.'","'.$created.'","'.$dat2.'","active", "'.$typ.'")';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./items-list.php'; </script>";
	}

    //handle editing
	if(isset($_POST["editItem"])) {
		$ref = $_POST["ref"];
	    $anum = $_POST["anum"];
	    $snum = $_POST["snum"];
	    $date = $_POST["date"];
	    $expiry = $_POST["expiry"];
		$desc = $_POST["desc"];
		$make = $_POST["make"];
		$model = $_POST["model"];

	    $sql = '
            UPDATE assets SET
                date_acquired = "'.$date.'",
                expiry = "'.$expiry.'",
                description = "'.$desc.'",
                make = "'.$make.'",
                model = "'.$model.'",
                serial_number = "'.$snum.'",
                asset_number = "'.$anum.'"
            WHERE id = "'.$ref.'"
        ';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./items-list.php'; </script>";
	}

	//handle deleting
	if(isset($_POST["deleteItem"])) {
		$id = $_POST["id"];

	    $sql = "
			UPDATE assets SET 
			status = 'deleted' 
			WHERE id = '".$id."'
        ";
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./items-list.php'; </script>";
		// echo $id;
	}

	//handle asset assigning
	if(isset($_POST["assItem"])) {
		$asset = $_POST["asset"];
	    $date = date("Y-m-d");;
	    $location = $_POST["loc"];
	    $holder = $_POST["hold"];
		$office = $_POST["office"];

	    $sql = 'INSERT INTO holders (date_assigned, status, location, holder, office, asset) VALUES ("'.$date.'","active","'.$location.'","'.$holder.'","'.$office.'","'.$asset.'")';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./info-item.php?id=".$asset."'; </script>";
	}

	//handle asset assigning
	if(isset($_POST["unassItem"])) {
		$asset = $_POST["id"];
	    $date = date("Y-m-d");

	    $sql = '
			UPDATE holders SET 
			status = "disabled", date_unassigned = "'.$date.'"
			WHERE asset = "'.$asset.'" AND status = "active"
		';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./info-item.php?id=".$asset."'; </script>";
	}

	//handle asset maintanance
	if(isset($_POST["maintain"])) {
		$asset = $_POST["asset"];
	    $date = date("Y-m-d");;
	    $status = $_POST["stat"];
	    $done = $_POST["done"];
		$description = $_POST["desc"];

	    $sql = 'INSERT INTO maintanance (asset, status, date, done_by, description) VALUES ("'.$asset.'","'.$status.'","'.$date.'","'.$done.'","'.$description.'")';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./info-item.php?id=".$asset."'; </script>";
	}

 ?>