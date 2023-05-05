<?php 
$title = $description = $published = $user_id = $image = $thumbnail="";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $error = "This Field Is Required";
  !empty($title)? $_POST["title"] : $error;
  !empty($description)? $_POST["description"] : $error;
  !empty($published)? $_POST["published"] : $error;
  !empty($image)? $_POST["image"] : $error;
  !empty($thumbnail)? $_POST["thumbnail"] : $error;
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
  }
    $check_thumbnail = getimagesize($_FILES["thumbnail"]["tmp_name"]);
    if($check_thumbnail !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
  }
}


?>