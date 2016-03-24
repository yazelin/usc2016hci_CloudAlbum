<html>
<head>
<title>PHP File Upload Example</title>
</head>
<body>
<form enctype="multipart/form-data" method="post" action="insertImage.php"><br />
<input type="text" name="timeid" value="<?php echo time();?>"/><br />
<input type="file" name="fileToUpload" /><br />
<input type="submit" value="Upload File" />
</form>
</body>
</html>