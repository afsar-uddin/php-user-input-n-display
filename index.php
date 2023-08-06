<?php
    require_once('./functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User input and display</title>
</head>
<body>
    <div class="nwt-users-form">
        <form action="display.php" method="post" enctype="multipart/form-data">
            <?php
                singleInputField("Your name", "text", "name", "", "Type your name");
                singleInputField("Your phone number", "text", "phone", "", "Type your phone number");
                singleInputField("", "file", "file", "", "Upload your image");
                singleInputField("", "submit", "submit", "Submit", "");
            ?>
        </form>
    </div>
</body>
</html>