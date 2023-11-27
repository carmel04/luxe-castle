<?php
	if(filter_input(INPUT_GET, "id")){
		$id = filter_input(INPUT_GET, "id");

		include("../../scripts/database/connection.php");

		$stmt = $connection->prepare("DELETE FROM users WHERE id=:id");
		$stmt->execute(array(":id"=>$id));
	}
	header("Location: ../index.php?page=users");