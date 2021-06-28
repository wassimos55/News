<?php

include_once "upload.php";

if (isset($_POST['new'])) {
    $file = $_FILES['test'];
    try {
        //code...
        $target = upload($file, "post_images/", true);
        echo $target;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="test" id="">
        <input type="submit" name="new" value="Upload">
    </form>
</body>

</html>