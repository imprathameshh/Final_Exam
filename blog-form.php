<?php
session_start();
if (!isset($_SESSION['login'])) {
    echo "<script>window.location='login.php'</script>";
}
include("validation.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("link.php"); ?>
</head>

<body>
    <div class="header-wrap ">
    <div class="container d-flex">
        <div class="header-logo">
            <img src="images/logo.png" alt="">
        </div>
        <div class="header-btn d-flex">
            <div class="add-blog-btn">
        <a class="btn btn-primary" href="blog-form.php" role="button">Add Blog</a>
        </div>

        <!-- Login and logout  -->
        <?php
        $link = $link_text ="";
        if($_SESSION['login']>0){
            $link = "logout.php";
            $link_text = "Logout";
        }
        else{
            $link = "login.php";
            $link_text = "Login";
        }
        ?>
        <a class="btn btn-primary" href="<?php echo $link?>" role="button"><?php echo $link_text?></a>

        </div>
    </div>
</div>
    <div class="blog-wrap">
        <div class="blog-column">
            <div class="blog-content">
                <h1>Add Blog</h1>
                <form class="blog-form" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Blog Title</label><span >*</span> <?php echo $error; ?></span>
                        <input type="text" class="form-control" name="title" value="<?php isset($title) ? $title : ''; ?>" placeholder="Enter Blog Title" name="title">
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <label class="form-label">Author Name</label><span >*</span> <?php echo $error; ?></span>
                            <input type="text" class="form-control" value="<?php echo $_SESSION['login']; ?>" readonly>
                        </div>
                        <div class="col-md">
                            <label class="form-label">Status</label><span >*</span> <?php echo $error; ?></span>
                            <select class="form-select" name="published">
                                <option value="0">Draft</option>
                                <option value="1">Publish</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Blog Image</label><span >*</span> <?php echo $error; ?></span>
                        <input type="file" class="form-control" name="image" value="<?php isset($image) ? $image : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Thumbnail</label><span >*</span>  <?php echo $error; ?></span>
                        <input type="file" class="form-control" name="thumbnail" value="<?php isset($thumbnail) ? $thumbnail : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Blog Description</label><span >*</span> <?php echo $error; ?></span>
                        <textarea class="form-control" name="description" placeholder="Enter Blog Description" value="<?php isset($description) ? $description : ''; ?>" style="height: 130px;"></textarea>
                    </div>
                    <div class="blog-form-btn">
                        <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Push  -->

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $published = $_POST['published'];
            $user_id = $_POST[$_SESSION['id']];
        
        move_uploaded_file($_FILES["image"]["tmp_name"], "images" . $_FILES["image"]["name"]);
        $image = $_FILES["image"]["name"];

        move_uploaded_file($_FILES["thumbnail"]["tmp_name"], "images/" . $_FILES["thumbnail"]["name"]);
        $thumbnail = $_FILES["thumbnail"]["name"];
        }
        if ($error) {
            echo "<script>alert('Enter required fields');</script>";
        } else {

            $sql = "INSERT INTO blogs (title, description, published, image, thumbnail, user_id) VALUES ('$title', '$description', '$published', '$image', '$thumbnail', '$user_id')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script>alert('Submit');</script>";
            } else {
                echo "Unsuccessfull";
            }
        }
    }

    ?>



</body>

</html>