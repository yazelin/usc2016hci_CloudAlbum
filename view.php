<html>
	<head>
	</head>
	<body>
<?php

        /*** connect to the database ***/

        $dbh = new PDO("mysql:host=localhost;dbname=1116723", '1116723', '123456789');



        /*** set the PDO error mode to exception ***/

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



        /*** The sql statement ***/

        $sql = "SELECT  `time_id` FROM  `images` ORDER BY  `time_id` DESC LIMIT 10;";



        /*** prepare the sql ***/

        $stmt = $dbh->prepare($sql);



        /*** exceute the query ***/

        $stmt->execute(); 

        /*** set the fetch mode to associative array ***/

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
?>
		<?php
		while($array=$stmt->fetch()):?>
			
			<img src="http://a9634395.xp3.biz/display.php?time_id=<?php echo $array['time_id']; ?>" style="float:left;">
			
		<?php
		endwhile;?>
		
	</body>
</html>