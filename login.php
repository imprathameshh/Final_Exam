<?php
require_once("config.php");
$username=$password="";
$username_err=$password_err="";

if(isset($_POST["username"]) && isset($_POST["password"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    if($username!="" && $password!="") {
        $sql="SELECT * FROM users WHERE username='$username' OR email='$username'";
        
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);

        if($row == !null){
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['login'] = $row['username'];            
            if ($row['password'])
            {
                header('location:index.php');
            }
            else{
                echo"<script>alert('Invalid username or Password'); window.location:'login.php'</script>";
            }
        }else{
            echo"<script>alert('Invalid username or Password'); window.location:'login.php'</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include("link.php"); ?>
</head>
<body>
    <div class="header-wrap ">
    <div class="container d-flex">
        <div class="header_logo">
            <img src="images/logo.png" alt="logo KrishaWeb">
        </div>
        <div class="header-btn d-flex">
            <div class="add-blog-btn">
        <a class="btn btn-primary" href="blog-form.php" role="button">Add Blog</a>
        </div>
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
<div class="login-wrap">
    <div class="container">
        <div class="login-column">
            <div class="login-content">
            <h1>Login</h1>
            <form method="post">
            <div class="mb-3">
                <label for="label-input" class="lable-login">Email<span>*</span> </label>
                <input type="text" class="form-control" placeholder="Enter Your Email" name="username" required>
            </div>
            <div class="mb-3">
                <label for="label-input" class="lable-login">Password<span>*</span> </label>
                <input type="password" class="form-control" placeholder="Enter Password" maxlength="80" name="password" required>
            </div>
            <div class="form-btn">
                <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
            </div>
        </div>
    </div>
 </div>    
</body>
</html>