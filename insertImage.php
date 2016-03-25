<?php
/*** check if a file was submitted ***/
if(!isset($_FILES['fileToUpload']))
    {
    echo '<p>Please select a file</p>';
    }
else
    {
    try    {
        upload();
        /*** give praise and thanks to the php gods ***/
        echo '<p>Thank you for submitting</p>';
        }
    catch(Exception $e)
        {
        echo '<h4>'.$e->getMessage().'</h4>';
        }
    }
echo '<a href="./uploadImage.php">back</a>';
?>
<?php
/**
 *
 * the upload function
 * 
 * @access public
 *
 * @return void
 *
 */
function upload(){
/*** check if a file was uploaded ***/echo $_FILES['fileToUpload']['tmp_name'];
	if(is_uploaded_file($_FILES['fileToUpload']['tmp_name']) && getimagesize($_FILES['fileToUpload']['tmp_name']) != false)
		{
		$timeid=$_POST['timeid'];
	//	echo 'http://jas-ar.noads.biz/display.php?image_id='.$imgid;
		/***  get the image info. ***/
		$size = getimagesize($_FILES['fileToUpload']['tmp_name']);
		/*** assign our variables ***/
		$type = $size['mime'];
		$imgfp = fopen($_FILES['fileToUpload']['tmp_name'], 'rb');
		$size = $size[3];
	//    $name = $_FILES['fileToUpload']['name'];
		$maxsize = 99999999;

		/***  check the file is less than the maximum file size ***/
		if($_FILES['fileToUpload']['size'] < $maxsize )
			{
			/*** connect to db ***/
			$dbh = new PDO("mysql:host=localhost;dbname=1116723", '1116723', '123456789');

					/*** set the error mode ***/
					$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				/*** our sql query ***/
			$stmt = $dbh->prepare("INSERT INTO `images` ( `_ai` , `time_id`, `user` ,`image` , `type` ) VALUES (null ,'".$timeid."', ? , ?, ?);");

			$user="a9634395";
			/*** bind the params ***/
			$stmt->bindParam(1, $user);
			$stmt->bindParam(2, $imgfp, PDO::PARAM_LOB);
			$stmt->bindParam(3, $type);

			/*** execute the query ***/
			$stmt->execute();
			
		}else{
			/*** throw an exception is image is not of type ***/
			throw new Exception("File Size Error");
		}
	}else{
		// if the file is not less than the maximum allowed, print an error
		throw new Exception("Unsupported Image Format!");
	}
}
?>