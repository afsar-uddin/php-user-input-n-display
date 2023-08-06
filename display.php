<?php
    include_once('./connect.php');

    // print_r($_FILES['file']);

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $image = $_FILES['file']['name'];

        echo $name . '</br>';
        echo $phone . '</br>';
        echo $image;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Data</title>
</head>
<body>
    <div class="nwt-users">
        <h1>Users Data</h1>
    </div>
</body>
</html>