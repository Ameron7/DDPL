
<?php

$target_file = $target_dir . basename($_FILES["image"]["name"]);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}   
?>
