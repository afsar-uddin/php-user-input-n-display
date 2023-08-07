<?php
    include_once('./connect.php');

    // print_r($_FILES['file']);

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $file = $_FILES['file'];
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];

        $file_name_separate = explode('.', $file_name);
        $file_name_extension = end($file_name_separate);

        $expected_extensios = array('jpeg', 'jpg', 'png');
        if(in_array($file_name_extension, $expected_extensios)) {
            $upload_img = 'images/'.$file_name;

            move_uploaded_file($file_tmp, $upload_img);
            
            $sql = "insert into `users` (name, phone, image) values ('$name', '$phone', '$upload_img')";
            $resuts = mysqli_query($con, $sql);
            if($resuts) {
                echo "Data inserted successfully";
            } else {
                die(mysqli_errno($con));
            }

        }

        print_r($file_name_extension);
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
                                <td><img src='.$image.' /></td>
                            </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>