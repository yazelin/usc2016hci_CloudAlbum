<?php

	try {
        /*** connect to the database ***/
        $dbh = new PDO("mysql:host=localhost;dbname=1116723", '1116723', '123456789');

        /*** set the PDO error mode to exception ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** The sql statement ***/
		//SELECT * FROM `users` WHERE `uid` = 'a9634395' AND `upwd` = '1234567890';
        $sql = "SELECT * FROM `users` WHERE `uid` = '".$_POST['uid']."' AND `upwd` = '".$_POST['upwd']."';";

        /*** prepare the sql ***/
        $stmt = $dbh->prepare($sql);

        /*** exceute the query ***/
        $stmt->execute(); 

        /*** set the fetch mode to associative array ***/
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

		if($stmt->fetch()){
			echo 'ok';
		}else{
			echo 'no ok';
		}	

	} catch(PDOException $e) {
		echo $e->getMessage();
	} catch(Exception $e) {
		echo $e->getMessage();
	}
?>