<?php
    include_once('./connect.php');

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $file = $_FILES['file'];
        
        $uploadDirectory = 'images/';
        
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $uploadFileName = generateUniqueFileName($extension);
    
        $uploadFilePath = $uploadDirectory . $uploadFileName;

        // print_r($uploadFilePath);
    
        if(move_uploaded_file($file['tmp_name'], $uploadFilePath)) {
            $sql = "INSERT INTO `users` (name, phone, image) VALUES ('$name', '$phone', '$uploadFileName')";
            $results = mysqli_query($con, $sql);
            if($results) {
                echo "Data inserted successfully";
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "File upload failed";
        }
    }
    
    function generateUniqueFileName($extension) {
        $timestamp = time();
        $randomString = bin2hex(random_bytes(4));
        $fileName = $timestamp . '_' . $randomString . '.' . $extension;
        return $fileName;
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
        <table>
            <thead>
                <tr>
                    <th scope="col">SI Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "Select * from `users`";
                    $results = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($results)){                        
                        $id = $row['id'];
                        $name = $row['name'];
                        $phone = $row['phone'];
                        $image = $row['image'];

                        echo '
                            <tr>
                                <th scope="row">'.$id.'</th>
                                <td>'.$name.'</td>
                                <td>'.$phone.'</td>
                                <td><img src=images/'.$image.' /></td>
                            </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>