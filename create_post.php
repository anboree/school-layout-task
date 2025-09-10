<?php
    include("connection.php");

    $errors = [];

    if(isset($_POST['upload'])){
        $title = $_POST["title"];
        $content = $_POST["content"];
        $date_posted = date("Y:m:d H:i:s");

        if(empty($title)){
            $errors['title'] = " Enter a title! ";
        }
        if(empty($content)){
            $errors['content'] = " Enter content! ";
        }
        if(count($errors) > 0){
            foreach($errors as $error){
                echo "<span style='color: white'>" . $error . "</span>";
            }
        }

        $targetDir = "images/";
        $fileName = basename($_FILES["img"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        // Move uploaded file
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath) && count($errors) == 0) {
            // Save path into database
            $sql = "INSERT INTO posts (img, title, content, date_posted) VALUES ('$targetFilePath', '$title', '$content', '$date_posted')";
            mysqli_query($conn, $sql);
            echo "Image uploaded successfully!";
            header("location: index.php");
        } else {
            echo "<span style='color: white'>Error uploading image.</span>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="website-container-parent">
        <div class="website-container-child">
            <div class="form-container">
                <form action="create_post.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="title" class="input" placeholder="Enter title for your post">

                    <input type="text" name="content" class="input" placeholder="Enter content for your post">

                    <input type="file" name="img" class="input">

                    <input type="submit" name="upload" value="Upload">
                </form>
            </div>
        </div>
    </div>
</body>
</html>