<?php

/*** some basic sanity checks ***/
if(filter_has_var(INPUT_GET, "time_id") !== false)
    {
    /*** assign the image id ***/
    $time_id = filter_input(INPUT_GET, "time_id", FILTER_SANITIZE_NUMBER_INT);
    try     {
        /*** connect to the database ***/
        $dbh = new PDO("mysql:host=localhost;dbname=1116723", '1116723', '123456789');

        /*** set the PDO error mode to exception ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** The sql statement ***/
        $sql = "SELECT `image` , `type` FROM `images` WHERE `time_id` = '".$time_id."';";

        /*** prepare the sql ***/
        $stmt = $dbh->prepare($sql);

        /*** exceute the query ***/
        $stmt->execute(); 

        /*** set the fetch mode to associative array ***/
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        /*** set the header for the image ***/
        $array = $stmt->fetch();

        /*** check we have a single image and type ***/
        if(sizeof($array) == 2)
            {
            /*** set the headers and display the image ***/
            header("Content-type: ".$array['type']);
			//header('Content-Type: application/force-download');
			//header('Content-Disposition: attachment; filename="'.date('Y-m-d_H-i-s', $image_id).'.png"');
            /*** output the image ***/
            echo $array['image'];
            }
        else
            {
            throw new Exception("Out of bounds Error");
            }
        }
    catch(PDOException $e)
        {
        echo $e->getMessage();
        }
    catch(Exception $e)
        {
        echo $e->getMessage();
        }
        }
  else
        {
        echo 'Please use a real id number';
        }
?>